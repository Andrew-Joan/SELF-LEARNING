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
      <div class="d-flex justify-content-between">
        <a href="{{ route('admin.comics.create') }}" class="btn btn-primary mb-3">Add New Comics</a>
        <div class="btn btn-success mb-3 d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Download as Excel <span data-feather="download"></span></div>
      </div>

      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-secondary" id="staticBackdropLabel">Download Comics Data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-secondary">
              <form action="{{ route('admin.comics.comicsExport') }}" method="GET" id="filter-form" class="row gap-3">
                <div>
                  <label for="status_id" class="text-dark ms-1">Comic Status</label>
                  <select class="form-select" name="status_id" id="status_id">
                    <option value="all">Status All</option>
                    @foreach($statuses as $status)
                    <option value="{{ $status->id }}">Status {{ $status->name }}</option>
                    @endforeach
                  </select>
                </div>
      
                <div>
                  <label for="category_id" class="text-dark ms-1">Comic Category</label>
                  <select class="form-select" name="category_id" id="category_id">
                    <option value="all">Category All</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">Category {{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
      
                <div class="row">
                  <div class="col">
                    <div class="d-flex align-items-center"><i class="fa-solid fa-calendar-days mx-1"></i><label for="dateFrom" class="text-dark">From</label></div>
                    <input type="text" class="form-control" id="dateFrom" name="date_from" placeholder="Date From Interval" required autocomplete="off"> 
                  </div>
                  <div class="col">
                    <div class="d-flex align-items-center"><i class="fa-solid fa-calendar-days mx-1"></i><label for="dateTo" class="text-dark">To</label></div>
                    <input type="text" class="form-control" id="dateTo" name="date_to" placeholder="Date Until Interval" required autocomplete="off">
                  </div>
                </div>
                
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Cancel</button>
                  <button type="submit" class="btn btn-success" id="confirmDeleteCommentButton"><i class="fa-regular fa-file-excel"></i> Export to Excel</button>
                </div>
              </form>
            </div>
          </div>
        </div> 
      </div>
        
      <div>
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
      
  {{-- gatau kenapa script ini ga bisa ditaro dibawah sectionnya aja --}}
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
  $(document).ready(function() {
    $('#dateFrom').datepicker();
    $('#dateTo').datepicker();
  });
</script>