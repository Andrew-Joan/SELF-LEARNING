@extends('layouts.main')

@section('container')
    <div class="all-comic-container">
        <div class="row">
            @foreach($comics as $comic)
                <div class="col-md-3 mb-4">
                    <div class="card text-white bg-dark" style="width: 18rem;">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $comic->title }}</h5>
                            <p class="card-text">By. {{ $comic->author->username }}.</p>
                            <a href="#" class="btn btn-light">View Comic</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection