<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="latest-comic-container">
    <div class="latest-headline d-flex justify-content-between">
        <div># Bookmarks ({{ auth()->user()->comic->count() }})</div>
        <div id="showDeleteBookmark" class="px-1 me-2 bg-danger rounded d-flex align-items-center gap-1" style="cursor: pointer">
            <span data-feather="trash-2" id="trashIcon"></span>
            <span data-feather="x-circle" id="cancelIcon" class="d-none"></span>
            <div id="actionText">Delete</div>
        </div>
    </div>

    <div class="row" id="comicsContainer">
        @if ($bookmarked_comics->count() === 0)
            <h3 class="text-center mb-2">You Have No Bookmarked Comics.</h3>
        @else
            @foreach($bookmarked_comics as $bookmarkedComic)
                <div class="col mb-4">
                    <div class="position-relative">
                        <a href="{{ route('comics.comic.single', ['comic' => $bookmarkedComic->id]) }}"><img src="{{ asset('assets/ComicImage/Nano machine.jpg') }}" alt="Gambar Slider 1"></a> 
                        <div class="position-absolute top-0 end-0 bg-danger rounded d-none deleteBookmarkedComic">
                            <form method="post" action="{{ route('bookmark.ajax-remove') }}" class="delete-bookmarked-comic-form" data-bookmarked-comic-id="{{ $bookmarkedComic->id }}">
                                @method('delete')
                                @csrf
                                <button class="border-0 delete-bookmarked-comic-button" type="button" data-feather="trash-2" style="width: 27px; height: 27px; padding-bottom: 2px"></button>
                            </form>
                        </div>
                    </div>
                    {{-- Str::limit($yangDiambil, jumlahLimit, kasihApaDibelakangTeksnya) parameter ke 3 nilai defaultnya '...' --}}
                    <a href="{{ route('comics.comic.single', ['comic' => $bookmarkedComic->id]) }}">
                        <div class="comic-name">{{ Str::limit($bookmarkedComic->title, 15) }}</div>
                    </a> 
                    <div class="chapter-stats-container">
                        @php
                            $bookmarkedComicInfo = $bookmarkedComic->chapter_created_at;

                            $timeWithAgo = $bookmarkedComic->chapter_created_at->diffForHumans();
                            $timeWithoutAgo = str_replace(' ago', '', $timeWithAgo);

                            $chapterReleasedTime = null;
                            if ($bookmarkedComicInfo->diffInDays() < 7)
                                $chapterReleasedTime =  $timeWithoutAgo;
                            else if ($bookmarkedComicInfo->diffInYears() < 1)
                                $chapterReleasedTime = $bookmarkedComicInfo->format('d M');
                            else
                                $chapterReleasedTime = $bookmarkedComicInfo->format('d M Y');
                        @endphp
                        <a href="{{ route('comics.comic.read', ['comic' => $bookmarkedComic->id, 'chapter' => $bookmarkedComic->chapter_id]) }}">
                            <div class="chapter-stats mb-2">
                                <div class="chapter-number">{{ $bookmarkedComic->number }}</div>
                                <div class="released-time">{{ $chapterReleasedTime }}</div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#showDeleteBookmark').click(function(){
            if ($('#actionText').text() === 'Delete') {
                $('#actionText').text('Cancel');
                $('#cancelIcon').removeClass('d-none');
                $('#trashIcon').addClass('d-none');
                $('.deleteBookmarkedComic').removeClass('d-none');
            } else if ($('#actionText').text() === 'Cancel') {
                $('#actionText').text('Delete');
                $('#cancelIcon').addClass('d-none');
                $('#trashIcon').removeClass('d-none');
                $('.deleteBookmarkedComic').addClass('d-none');
            }
        });

        $('.delete-bookmarked-comic-button').on('click', function() {
            let bookmarkedComicId = $(this).closest('.delete-bookmarked-comic-form').data('bookmarked-comic-id');
            $.ajax({
                url: '{{ route("bookmark.ajax-remove") }}',
                type: 'delete',
                data: {
                    bookmarkedComicId: bookmarkedComicId,
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                success: function(response) {
                    $('.latest-comic-container').replaceWith(response);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    });
</script>