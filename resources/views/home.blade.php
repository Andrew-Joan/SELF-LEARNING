@extends('layouts.main')

@section('content')
    @if(session()->has('forbidGuest'))
        <div class="alert alert-danger alert-dismissible fade show col-lg-8 text-center w-100" role ="alert">
            {{ session('forbidGuest') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session()->has('forbidUser'))
        <div class="alert alert-danger alert-dismissible fade show col-lg-8 text-center w-100" role ="alert">
            {{ session('forbidUser') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="slider-container">
        <div id="slider">
            <figure>
                <img src="{{ asset('assets/SliderImage/slider-img-1.png') }}" alt="Gambar Slider 1">
                <img src="{{ asset('assets/SliderImage/slider-img-2.png') }}" alt="Gambar Slider 2">
                <img src="{{ asset('assets/SliderImage/slider-img-3.png') }}" alt="Gambar Slider 3">
                <img src="{{ asset('assets/SliderImage/slider-img-4.png') }}" alt="Gambar Slider 4">
                <img src="{{ asset('assets/SliderImage/slider-img-5.png') }}" alt="Gambar Slider 5">
            </figure>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        @include('component.__latest-comics-component')
        
        <div class="right-container">
            <div class="support-us-section">
                @include('component.__support-us-component')
            </div>

            <div class="trending-comics-section">
                @include('component.__trending-comics-component')
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        let totalComics = {{ $total_comics }}

        var offset = 10; // kaerna sudah 20 comic yang tampil diawal sebelum dipencet tombol load more

        function loadMoreComics() {
            $.ajax({
                url: 'load-more-comics',
                type: 'GET',
                data: { skipComic: offset },
                success: function(response) {
                    $('#comicsContainer').append(response).slideDown('slow'); // Menambahkan komik-komik baru ke dalam kontainer
                    offset += 10; // Menambahkan offset untuk komik-komik berikutnya

                    if (offset > totalComics) {
                        $('.latest-load-more').addClass('d-none');
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error); // Menampilkan pesan error (jika ada)
                }
            });
        }

        // Menangani klik tombol "Load More"
        $('#loadMoreComicsButton').on('click', function(e) {
            loadMoreComics();
        });
    });
    </script>
@endsection