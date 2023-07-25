<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="latest-comic-container">
    <div class="latest-headline">
        <div># Searched Comics ({{ $browsed_comics->count() }})</div>
    </div>

    <div class="row" id="comicsContainer">
        @if ($browsed_comics->count() === 0)
            <h3 class="text-center mb-2">No Comic Found.</h3>
        @else
            @foreach($browsed_comics as $browsedComic)
                <div class="col mb-4">
                    <div class="position-relative">
                        @if ($browsedComic->image)
                            <a href="{{ route('comics.comic.single', ['comic' => $browsedComic->id]) }}"><img src="{{ asset('storage/' . $browsedComic->image) }}" alt="{{ $browsedComic->title }}">
                        @else
                            <a href="{{ route('comics.comic.single', ['comic' => $browsedComic->id]) }}"><img src="{{ asset('assets/ComicImage/Nano machine.jpg') }}" alt="Gambar Sementara"></a> 
                        @endif
                    </div>
                    {{-- Str::limit($yangDiambil, jumlahLimit, kasihApaDibelakangTeksnya) parameter ke 3 nilai defaultnya '...' --}}
                    <a href="{{ route('comics.comic.single', ['comic' => $browsedComic->id]) }}">
                        <div class="comic-name">{{ Str::limit($browsedComic->title, 15) }}</div>
                    </a> 
                    <div class="chapter-stats-container">
                        @php
                            $browsedComicInfo =$browsedComic->chapter()->latest('created_at')->value('created_at');
                            $timeWithAgo = $browsedComicInfo->diffForHumans();
                            $timeWithoutAgo = str_replace(' ago', '', $timeWithAgo);

                            $chapterReleasedTime = null;
                            if ($browsedComicInfo->diffInDays() < 7)
                                $chapterReleasedTime =  $timeWithoutAgo;
                            else if ($browsedComicInfo->diffInYears() < 1)
                                $chapterReleasedTime = $browsedComicInfo->format('d M');
                            else
                                $chapterReleasedTime = $browsedComicInfo->format('d M Y');
                        @endphp
                        <a href="{{ route('comics.comic.read', ['comic' => $browsedComic->id, 'chapter' => $browsedComic->chapter()->latest('created_at')->value('id')]) }}">
                            <div class="chapter-stats mb-2">
                                <div class="chapter-number">{{  $browsedComic->chapter()->latest('created_at')->value('number') }}</div>
                                <div class="released-time">{{ $chapterReleasedTime }}</div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>