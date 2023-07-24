<div class="trending-container">
    <div class="trending-headline">
        # Trending
    </div>
    <div class="trending-duration-container">
        <div class="trending-duration">
            <div class="trending-weekly">
            Weekly
            </div>
            <div class="trending-monthly">
            Monthly
            </div>
            <div class="trending-alltime">
            All Time
            </div>
        </div>
    </div>

    <div class="all-10-trending-comic-container">
        @foreach($trending_comics as $trending_comic)
            <div class="trending-comic-container">
                <div class="trending-comic-number">
                    {{ $loop->iteration }}
                </div>

                <div class="trending-comic-cover-container">
                    @if ($trending_comic->image)
                        <a href="{{ route('comics.comic.single', ['comic' => $trending_comic->id]) }}"><img src="{{ asset('storage/' . $trending_comic->image) }}" class="trending-comic-cover" alt="{{ $trending_comic->title }}"></a>
                    @else
                        <a href="{{ route('comics.comic.single', ['comic' => $trending_comic->id]) }}"><img src="{{ asset('assets/ComicImage/Nano machine.jpg') }}" class="trending-comic-cover" alt="Gambar Sementara"></a> 
                    @endif
                </div>

                <div class="trending-comic-stats">
                <a href="{{ route('comics.comic.single', ['comic' => $trending_comic->id]) }}">
                    <div class="trending-comic-name">
                        {{  Str::limit($trending_comic->title, 20) }}
                    </div>
                </a>
                <div class="star-rating-container">
                    <div class="star-wrapper">
                    <img class= "star-1" src="https://assets.codepen.io/13090/filled_1.svg">
                    <img class= "star-2" src="https://assets.codepen.io/13090/filled_1.svg">
                    <img class= "star-3" src="https://assets.codepen.io/13090/filled_1.svg">
                    <img class= "star-4" src="https://assets.codepen.io/13090/filled_1.svg">
                    <img class= "star-5" src="https://assets.codepen.io/13090/filled_1.svg">
                    </div>
                    <div class="rating-number">
                    4.9
                    </div>
                </div>
                <div class="trending-genres">
                    Genres:
                    <span class="trending-comic-genres">
                        @foreach($trending_comic->genre as $genre)
                            {{ $genre->name }}
                        @endforeach
                    </span>
                </div>
                </div>
            </div>
        @endforeach
    </div>
</div>




