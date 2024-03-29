@foreach($latest_updates as $latest_update)
    <div class="col mb-4">
        <a href="{{ route('comics.comic.single', ['comic' => $latest_update->id]) }}"><img src="{{ asset('assets/ComicImage/Nano machine.jpg') }}" alt="Gambar Slider 1"></a> 
        <a href="{{ route('comics.comic.single', ['comic' => $latest_update->id]) }}">
            <div class="comic-name">{{ Str::limit($latest_update->title, 15) }}</div>
        </a> 
        <div class="chapter-stats-container">
            @foreach ($latest_chapter_info[$latest_update->id] as $chapter)
                @php
                    $timeWithAgo = $chapter->updated_at->diffForHumans();
                    $timeWithoutAgo = str_replace(' ago', '', $timeWithAgo);

                    $chapterReleasedTime = null;
                    if ($chapter->created_at->diffInDays() < 7)
                        $chapterReleasedTime =  $timeWithoutAgo;
                    else if ($chapter->created_at->diffInYears() < 1)
                        $chapterReleasedTime = $chapter->updated_at->format('d M');
                    else
                        $chapterReleasedTime = $chapter->updated_at->format('d M Y');
                @endphp

                <a href="{{ route('comics.comic.read', ['comic' => $latest_update->id, 'chapter' => $chapter->id]) }}">
                    <div class="chapter-stats mb-2">
                        <div class="chapter-number">{{ $chapter->number }}</div>
                        <div class="released-time">{{ $chapterReleasedTime }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endforeach