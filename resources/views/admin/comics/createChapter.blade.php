@extends('admin.layouts.main')

@section('container')
<style>
    .select2-results, .select2-selection__rendered{ 
        color: black;
    }
</style>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add New {{ $comic->title }} Chapter</h1>
</div>

<div class="col-lg-8">
    <h3>Lastest Chapter: {{ $last_chapter == null ? 'None' : $last_chapter->number}}</h3>
    <form method="post" action="{{ route('admin.comics.storeChapter') }}" class="mb-5" enctype="multipart/form-data"> 
        @csrf
        {{-- Sempet pake untuk deteksi error --}}
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <input type="hidden" name="comic_id" value="{{ $comic->id }}">
        <div class="mb-3">
            <label for="number" class="form-label">Chapter</label>
            <input type="text" class="form-control @error('number') is-invalid @enderror" id="number" name="number" value="Chapter {{ $chapter_number + 1 }}">
            @error('number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
       
        <button type="submit" class="btn btn-primary">Add Chapter</button>
    </form>
</div>

<script> 

</script>
@endsection