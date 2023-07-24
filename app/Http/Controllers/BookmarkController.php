<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comic;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookmarkController extends Controller
{
    public function index()
    {
        $allComics = Comic::with('chapter.view', 'genre')->get(['id', 'title', 'image']);
        $bookmarkedComics = auth()->user()->comic()
                            ->with(['chapter' => function ($query) {
                                $query->latest('created_at');
                            }])
                            ->leftJoin('chapters', function ($join) {
                                $join->on('comics.id', '=', 'chapters.comic_id')
                                    ->where('chapters.id', '=', function ($query) {
                                        $query->select('id')
                                            ->from('chapters')
                                            ->whereColumn('comics.id', 'chapters.comic_id')
                                            ->orderByDesc('created_at')
                                            ->limit(1);
                                    });
                            })
                            ->select('comics.*', 'chapters.id as chapter_id', 'chapters.created_at AS chapter_created_at', 'chapters.number')
                            ->orderByDesc('chapters.created_at')
                            ->get()
                            ->map(function ($comic) {
                                $comic->chapter_created_at = \Carbon\Carbon::parse($comic->chapter_created_at);
                                return $comic;
                            }); // chapter_created_at berbentuk string, maka harus diubah dulu jadi date time 
                            

        $comicViews = [];

        foreach ($allComics as $comic) {
            $totalView = 0;
            foreach ($comic->chapter as $chapter) {
                if ($chapter->view) {
                    $totalView += $chapter->view->view_count;
                }
            }
            $comicViews[$comic->id] = $totalView;
        }

        arsort($comicViews); //sort descending
        $topComicIds = array_slice(array_keys($comicViews), 0, 10); // array keys itu ngambil key arraynya (A[n] -> ambil n)

        $trendingComics = collect($topComicIds)->map(function ($comicId) use ($allComics) {
            return $allComics->firstWhere('id', $comicId);
        });

        return view('bookmark', [
            "trending_comics" => $trendingComics,
            'bookmarked_comics' => $bookmarkedComics,
            'active' => 'bookmark',
        ]);
    }

    public function attach(Comic $comic)
    {
        $user = auth()->user();
        $user->comic()->attach($comic->id);

        return back();
    }

    public function detach(Comic $comic)
    {
        $user = auth()->user();
        $user->comic()->detach($comic->id);

        return back();
    }

    public function removeFromBookmark(Request $request)
    {
        $bookmarkedComicId = $request->input('bookmarkedComicId');
        $user = auth()->user();
        $user->comic()->detach($bookmarkedComicId);

        $bookmarkedComics = auth()->user()->comic()
                            ->select('comics.*')
                            ->leftJoin('chapters', function ($join) {
                                $join->on('comics.id', '=', 'chapters.comic_id')
                                    ->where('chapters.id', '=', function ($query) {
                                        $query->select('id')
                                            ->from('chapters')
                                            ->whereColumn('comics.id', 'chapters.comic_id')
                                            ->orderByDesc('updated_at')
                                            ->limit(1);
                                    });
                            })
                            ->orderByDesc('chapters.updated_at')
                            ->get(); 

        return view('partials._delete-bookmarked-comic', [
            'bookmarked_comics' => $bookmarkedComics,
            'active' => 'bookmark',
        ]);
    }
}
