@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Comics</h1>
    </div>

    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show col-lg-8" role ="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="table-responsive col-lg-8 mb-5">
      <a href="{{ route('admin.comics.create') }}" class="btn btn-primary mb-3">Add New Comics</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr class="text-info">
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Author</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($comics as $comic)
            <tr>
              <td class="text-light">{{ $loop->iteration }}</td>
              <td class="text-light">{{ $comic->title }}</td>
              <td class="text-light">{{ $comic->author->name }}</td>
              <td class="text-light">{{ $comic->category->name }}</td>
              <td>
                <a href="{{ route('comics.comic.single', ['comic' => $comic->id]) }}"}} class="badge bg-primary"><span data-feather="eye"></span></a>
                <a href="{{ route('admin.comics.createChapter', ['comic' => $comic->id]) }}" class="badge bg-success"><span data-feather="plus-square"></span></a>
                <a href="/admin/comics/{{ $comic->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action ="{{ route('admin.comics.delete', ['comic' => $comic->id]) }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection