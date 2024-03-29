@extends('layouts.comics')

@section('content')
    <div class="d-flex gap-3 justify-content-center mt-4">
        <div class="bookmarked-comics-section">
            @include('component.__all-comics-component')
        </div>
        
        <div class="trending-comics-section">
            @include('component.__trending-comics-component')
        </div>
    </div>
@endsection

