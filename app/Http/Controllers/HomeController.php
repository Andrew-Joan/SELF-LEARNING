<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $allComics = Comic::has('chapter')->with('chapter.view', 'genre')->get();

        // $mostRecentChapterUpdated = Chapter::orderBy('updated_at', 'desc')
        //                                     ->groupBy('comic_id')
        //                                     ->pluck('comic_id')
        //                                     ->toArray();
                                            

        // $latestUpdates = $allComics->whereIn('id', $mostRecentChapterUpdated)
        //                             ->sortByDesc(function ($comic) use ($mostRecentChapterUpdated) {
        //                                 $chapter = Chapter::where('comic_id', $comic->id)
        //                                     ->orderBy('created_at', 'desc')
        //                                     ->first();
        //                                 return $chapter ? $chapter->created_at : null;
        //                             })->take(10);

        $latestUpdates = Comic::has('chapter')
                                ->with('chapter.view', 'genre')
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
                                ->take(10)
                                ->get();           
                                   
        $latestChapterInfo[] = null;                            
        foreach ($latestUpdates as $latestUpdate) {
            $latestChapter = $latestUpdate->chapter()
                                ->orderBy('created_at', 'desc')
                                ->take(2)
                                ->get();
            $latestChapterInfo[$latestUpdate->id] = $latestChapter;
        }

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
        
        $totalComics = $allComics->count();

        return view('home', [
            "latest_updates" => $latestUpdates,
            "latest_chapter_info" => $latestChapterInfo,
            "trending_comics" => $trendingComics,
            "total_comics" => $totalComics,
            "active" => 'home',
        ]);
    }

    public function loadMoreComics(Request $request)
    {
        $offset = $request->input('skipComic'); // Mengambil nilai offset dari permintaan Ajax

        $allComics = Comic::has('chapter')->with('chapter.view', 'genre')->get(['id', 'title', 'image']);

        // $mostRecentChapterUpdated = Chapter::orderBy('updated_at', 'desc')
        //     ->groupBy('comic_id')
        //     ->pluck('comic_id')
        //     ->skip($offset) // Menggunakan offset sebagai skip pada query
        //     ->toArray();

        //     $latestUpdates = $allComics->whereIn('id', $mostRecentChapterUpdated)
        //     ->sortByDesc(function ($comic) use ($mostRecentChapterUpdated) {
        //         $chapter = Chapter::where('comic_id', $comic->id)
        //             ->orderBy('updated_at', 'desc')
        //             ->first();
        //         return $chapter ? $chapter->updated_at : null;
        //     })->take(10);

            $latestUpdates = Comic::has('chapter')
                                    ->with('chapter.view', 'genre')
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
                                    ->skip($offset)
                                    ->take(10)
                                    ->get(); 

        $latestChapterInfo[] = null;                            
        foreach ($latestUpdates as $latestUpdate) {
            $latestChapter = $latestUpdate->chapter()
                                ->orderBy('created_at', 'desc')
                                ->take(2)
                                ->get();
            $latestChapterInfo[$latestUpdate->id] = $latestChapter;
        }

        return view('partials._more-comics', [
            "latest_updates" => $latestUpdates,
            "latest_chapter_info" => $latestChapterInfo,
        ]);
    }
}
