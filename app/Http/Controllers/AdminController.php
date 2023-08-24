<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use App\Models\Genre;
use App\Models\Author;
use App\Models\Status;
use App\Models\Chapter;
use App\Models\Release;
use App\Models\Category;
use App\Exports\ComicsExport;
use App\Http\Requests\Comic\StoreUpdateComicRequest;
use App\Models\View;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel; // udah ga kepake karena pake exportable di file Exportnya

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function allComics()
    {
        $comics = Comic::with('author', 'category')->orderBy('title', 'asc')->get();

        return view('admin.comics.index', [
            "comics" => $comics,
            "statuses" => Status::all(),
            'categories' => Category::all()
        ]);
    }

    // download data comic menjadi excel
    public function comicsExport(Request $request)
    {
        $statusId = $request->input('status_id');
        $categoryId = $request->input('category_id');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        return (new ComicsExport($statusId, $categoryId, $dateFrom, $dateTo))->download('comics.xlsx');
    }

    // Menampilkan tampilan tambah komik dan kirim data yang dibutuhkan
    public function create()
    {
        return view('admin.comics.create', [
            "statuses" => Status::all(),
            "releases" => Release::all(),
            "categories" => Category::all(),
            "genres" => Genre::all(),
        ]);
    }

    // Validasi dan aksi nambahin komik
    public function store(StoreUpdateComicRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['author_id'] = $request->getAuthorId();
        $validatedData['image'] = $request->storeImage();

        $comic = Comic::create(
            Arr::except($validatedData, 'genres') // Exclude 'genres' from the creation data
        );
    
        $addGenres = $request->input('genres');
        $comic->genre()->sync($addGenres); // Attach the selected genres to the newly created comic

        return redirect(route('admin.comics.index'))->with('success', 'New Comic has been added!');
    }

    // Menampilkan tampilan tambah chapter dan kirim data yang dibutuhkan
    public function createChapter(Comic $comic)
    {
        $lastChapter = $comic->chapter()
                             ->orderBy('created_at', 'desc')
                             ->first();
        $getChapterNumber = 0;
        if ($lastChapter) {
            $splitChapterString = explode(' ', $lastChapter->number);
            $getChapterNumber = (int)$splitChapterString[1];
        }

        return view('admin.comics.createChapter', [
            "last_chapter" => $lastChapter,
            "chapter_number" => $getChapterNumber,
            "comic" => $comic,
        ]);
    }

    // Validasi dan aksi nambahin chapter
    public function storeChapter(Request $request)
    {
        $comicId = $request->input('comic_id');
        $validatedData = $request->validate([
            'number' => 'required|unique:chapters,number,NULL,id,comic_id,' . $comicId,
            'comic_id' => 'required'
        ]);

        $newChapter = Chapter::create($validatedData);

        $newChapter->view()->create([
            'weekly_view_count' => 0,
            'monthly_view_count' => 0,
            'all_time_view_count' => 0,
        ]);

        return redirect(route('admin.comics.index'))->with('success', 'New Chapter has been added!');
    }

    // Menampilkan tampilan update komik dan kirim data yang dibutuhkan
    public function edit(Comic $comic)
    {
        return view('admin.comics.edit', [
            "comic" => $comic,
            "statuses" => Status::all(),
            "releases" => Release::all(),
            "categories" => Category::all(),
            "genres" => Genre::all(),
        ]);
    }
    
    // Validasi dan aksi update komik
    public function update(Comic $comic, StoreUpdateComicRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['author_id'] = $request->getAuthorId();
        $validatedData['image'] = $request->storeImage();

        // ga bisa kayak begini karena update itu akan mereturn angka(int), valuenya adalah jumlah row yang keupdate, jadi ga bisa dilakuin manipulasi data.
        // $comic = Comic::where('id', $comic->id)
        //                 ->update( Arr::except($validatedData, 'genres'));

        $comic = Comic::find($comic->id);
        $comic->update(Arr::except($validatedData, 'genres'));
    
        $addGenres = $request->input('genres');
        $comic->genre()->sync($addGenres); // Attach the selected genres to the updated comic

        return redirect(route('admin.comics.index'))->with('success', 'Comic has been updated!');
    }

    public function delete(Comic $comic)
    {
        if($comic->image) Storage::delete($comic->image);

        Comic::destroy($comic->id);

        return redirect(route('admin.comics.index'))->with('success', 'Comic has been deleted!');
    }

    // reset weekly view for all comics
    public function resetWeeklyComicsView()
    {
        View::query()->update(['weekly_view_count' => 0]);

        return back()->with('success', 'Weekly View For All Comics Has Been Reseted To 0.');
    }

    // reset monthly view for all comics
    public function resetMonthlyComicsView()
    {
        View::query()->update(['monthly_view_count' => 0]);

        return back()->with('success', 'Monthly View For All Comics Has Been Reseted To 0.');
    }
}