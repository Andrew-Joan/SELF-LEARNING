<?php

namespace App\Http\Requests\comic;

use App\Models\Author;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateComicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $titleRules = 'required|max:255|unique:comics';
        
        $comic = $this->route('comic');
        if ($this->getMethod() == 'PUT') $titleRules = 'required|max:255|unique:comics,title,' . $comic->id; // kalo dikasesnya put berarti ini mau update data, karena semuanya sama kecuali rules title, maka file Requestnya digabung aja

        return [
            'title' => $titleRules,
            'author_id' => 'required', // ini awal isinya text
            'category_id' => 'required',
            'status_id' => 'required',
            'release_id' => 'required',
            'image' => 'image|file|max:1024', //|file|max:... ini ngasih constraint maksimum ukuran file yang bs dimasukkan. //image| artinya input ini hanya menerima image, tidak bisa dimasukkan file lain seperti pdf dll
            'synopsis' => 'required',
            'genres' => 'required|array|min:1',
        ];
    }

    public function getAuthorId()
    {
        $authorName = $this->input('author_id');
        $author = Author::firstOrCreate(['name' => $authorName]);
        return $author->id;
    }

    public function storeImage()
    {
        if ($this->file('image')) {
            return $this->file('image')->store('comic-images');
        }

        return null;
    }

    public function attributes()
    {
        return [
            'title' => 'Comic Title',
            'author_id' => 'Author Name',
            'category_id' => 'Comic Category',
            'status_id' => 'Comic Status',
            'release_id' => 'Release Year',
            'synopsis' => 'Comic Synopsis',
            'genres' => 'Comic Genres',
        ];
    }
}
