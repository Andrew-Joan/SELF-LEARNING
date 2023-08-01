@extends('admin.layouts.main')

@section('container')
<style>
    .select2-results, .select2-selection__rendered{ 
        color: black;
    }
</style>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Update Comic</h1>
</div>

<div class="col-lg-8">
    {{-- dengan methodnya post, dan actionnya adalah ke routes yang jenisnya resources, maka otomatis akan masuk ke method controller yang store, kalau methodnya get akan langsung masuk ke index, kalau methodnya put, akan diarahkan ke method update, kalau methodnya delete, akan diarahkan ke method destroy--}}
    {{-- harus ditmbhin enctype="multipart/form-data" jika input fieldny terdapat input file--}}
    <form method="post" action="{{ route('admin.comics.update', ['comic' => $comic->id]) }}" class="mb-5" enctype="multipart/form-data"> 
        @method('put')
        @csrf
        {{-- Sempet pake untuk deteksi error --}}
        {{-- @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif --}}

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" autofocus value="{{ old('title', $comic->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="author_id" class="form-label">Author</label>
            <input type="text" class="form-control @error('author_id') is-invalid @enderror" id="author_id" name="author_id" value="{{ old('author_id', $comic->author->name) }}">
            @error('author_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                @foreach($categories as $category)
                    @if(old('category_id', $comic->category_id) == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="genres" class="form-label">Genre</label>
            <select class="select2-multiple form-control @error('genres') is-invalid @enderror" name="genres[]" multiple="multiple"
                id="select2Multiple">
                @foreach($genres as $genre)
                <option value="{{ $genre->id }}" {{ (collect(old('genres', $comic->genre->pluck('id')))->contains($genre->id)) ? 'selected' : '' }}>
                    {{ $genre->name }}
                </option>
                @endforeach           
            </select>
            @error('genres')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="release" class="form-label">Released Year</label>
            <select class="form-select" name="release_id">
                @foreach($releases as $release)
                    @if(old('release_id', $comic->release_id) == $release->id)
                        <option value="{{ $release->id }}" selected>{{ $release->year }}</option>
                    @else
                        <option value="{{ $release->id }}">{{ $release->year }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status_id">
                @foreach($statuses as $status)
                    @if(old('status_id', $comic->status_id) == $status->id)
                        <option value="{{ $status->id }}" selected>{{ $status->name }}</option>
                    @else
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Comic Thumbnail</label>
            <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="synopsis" class="form-label">Synopsis</label>
            @error('synopsis')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="synopsis" type="hidden" name="synopsis" value="{{ old('synopsis', $comic->synopsis) }}">
            <trix-editor input="synopsis"></trix-editor>
        </div>
       
        <button type="submit" class="btn btn-primary">Update Comic</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        // Select2 Multiple
        $('.select2-multiple').select2({
            placeholder: "Select Genres",
            allowClear: true
        });

    });
</script>
@endsection