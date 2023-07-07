<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comic;
use App\Models\Genre;
use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComicController extends Controller
{
    public function index()
    {
        return view('comics', [
            "comics" => Comic::all(), 
            "active" => 'comics'
        ]);
    }

    public function show(Comic $comic)
    {
        $allComics = Comic::all();

        $comicViews = [];

        foreach ($allComics as $singleComic) {
            $totalView = 0;
            foreach ($singleComic->chapter as $chapter) {
                if ($chapter->view) {
                    $totalView += $chapter->view->view_count;
                }
            }
            $comicViews[$singleComic->id] = $totalView;
        }

        arsort($comicViews); //sort descending

        // ini untuk trending comic section
        $topComicIds = array_slice(array_keys($comicViews), 0, 10); // array keys itu ngambil key arraynya (A[n] -> ambil n)

        $trendingComics = collect($topComicIds)->map(function ($comicId) use ($allComics) {
            return $allComics->firstWhere('id', $comicId);
        });

        // ini untuk dapetin ranking semua comic berdasarkan jumlah viewnya
        $comicRankings = [];
        $rank = 1;
        foreach ($comicViews as $comicId => $views) {
            $comicRankings[$comicId] = $rank;
            $rank++;
        }

        $comicRank = $comicRankings[$comic->id];
       

        // $totalView = 0;
        // foreach ($comic->chapter as $singleChapter) {
        //     if($singleChapter->view) 
        //         $totalView += $singleChapter->view->view_count;
        // }
        // ga usah kita cari lagi karena tinggal ambil dari query yg dibuat untuk trending container
        $totalView = $comicViews[$comic->id];

        $user = auth()->user();
        $bookmarkedOrNot = null;
        if ($user) $bookmarkedOrNot = $user->comic->find($comic->id);
        // dd($user->comic);
        // dd($bookmarkedOrNot);
        // nanti chapter ini pake created_at, sementara pake id karena seeder created_atnya sama semua
        $firstChapter = $comic->chapter()->orderBy('id', 'asc')->first(); 
        $lastChapter = $comic->chapter()->orderBy('id', 'desc')->first();

        $allChapters = $comic->chapter()->orderBy('id', 'desc')->get();
        
        $totalComments = Comment::where([
            ['comic_id', $comic->id],
        ])->count();
        
        $comments = Comment::where([
            ['comic_id', $comic->id],
        ])->orderBy('created_at', 'desc')
          ->take(3)
          ->get();

        return view('comic', [
            "comic" => $comic,
            "first_chapter" => $firstChapter->number,
            "last_chapter" => $lastChapter->number,
            "all_chapters" => $allChapters,
            "total_view" => $totalView,
            "comic_rank" => $comicRank,
            "trending_comics" => $trendingComics,
            "comments" => $comments,
            "total_comments" => $totalComments,
            "bookmarked_or_not" => $bookmarkedOrNot,
            "active" => 'comics'
        ]);
    }

    public function read(Comic $comic, Chapter $chapter)
    {
        $chapter->view->increment('view_count'); //nambahin value kolom view_count di chapter yang di click
        
        return back();
    }


    public function storeComment(Request $request)
    {
        $commentText = $request->input('commentText');
        $comicId = $request->input('comicId');
        $comic = Comic::find($comicId);

        // $validatedData = $request->validate([
        //     $commentText => 'required'
        // ]);

        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['comic_id'] = $comic->id;
        $validatedData = [
            'commentText' => $commentText,
            'user_id' => auth()->user()->id,
            'comic_id' => $comicId,
        ];

        Comment::create($validatedData);

        $comments = Comment::where([
            ['comic_id', $comic->id],
        ])->orderBy('created_at', 'desc')
          ->take(3)
          ->get();

        $totalComments = Comment::where([
            ['comic_id', $comic->id],
        ])->count();

        return view('partials._post-and-delete-comment', [
            'comments' => $comments,
            'comic' => $comic,
            'total_comments' => $totalComments,
        ]);        
    }

    public function editComment(Request $request)
    {
        // $validatedData = $request->validate([
        //     'commentEditText-' . $comment->id => 'required'
        // ]);

        $commentEditText = $request->input('commentEditText');
        // $comicId = $request->input('comicId');
        // $comic = Comic::find($comicId);
        $commentId = $request->input('commentId');
        $comment = Comment::find($commentId);
        
        $comment->update([
            'commentText' => $commentEditText
        ]);

        // $comments = Comment::where([
        //     ['comic_id', $comic->id],
        // ])->orderBy('created_at', 'desc')
        //   ->take(3)
        //   ->get();

        // $totalComments = Comment::where([
        //     ['comic_id', $comic->id],
        // ])->count();

        return view('partials._edit-comment', [
            // 'comments' => $comments,
            // 'comic' => $comic,
            // 'total_comments' => $totalComments,
            "comment" => $comment,
        ]);  
    }

    public function deleteComment(Request $request)
    {
        $commentId = $request->input('commentId');
        $comicId = $request->input('comicId');
        $comic = Comic::find($comicId);
        Comment::destroy($commentId);

        $comments = Comment::where([
            ['comic_id', $comicId],
        ])->orderBy('created_at', 'desc')
          ->take(3)
          ->get();

        $totalComments = Comment::where([
            ['comic_id', $comicId],
        ])->count();

        return view('partials._post-and-delete-comment', [
            'comments' => $comments,
            'comic' => $comic,
            'total_comments' => $totalComments,
        ]);
    }

    public function loadMoreComments(Request $request)
    {
        $offset = $request->input('skipComment');
        $comicId = $request->input('comicId');

        $comic = Comic::find($comicId);

        $comments = Comment::where([
            ['comic_id', $comicId],
        ])->orderBy('created_at', 'desc')
          ->skip($offset)
          ->take(3)
          ->get();

        return view('partials._more-comments', [
            "comments" => $comments,
            "comic" => $comic,
        ]);
    }
}
