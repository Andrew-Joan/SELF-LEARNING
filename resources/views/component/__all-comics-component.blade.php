<style>

</style>

<div class="all-comic-container">
    <div class="comics-headline mb-1">
        <div># Comic Lists ({{ $comics->total() }})</div>
    </div>
    <div class="filter mb-2">
        <div>
            <form action="{{ route('comics.filter') }}" method="GET" id="filter-form" class="d-flex gap-4 justify-content-center">
                <div>
                    <select multiple id="selectGenres" name="genres[]" placeholder="Select Genres" data-search="false" data-silent-initial-value-set="true">
                        @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach 
                    </select>
                    {{-- <select class="select2-multiple form-control rounded" name="genres[]" multiple="multiple"
                        id="select2Multiple">
                        <option value="allGenre">Genres All</option>
                        @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach 
                    </select> --}}
                </div>

                <div>
                    <select class="form-select" name="status_id">
                        <option value="all">Status All</option>
                        @foreach($statuses as $status)
                            <option value="{{ $status->id }}">Status {{ $status->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <select class="form-select" name="category_id">
                        <option value="all">Category All</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">Category {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <select class="form-select" name="order_by">
                        <option value="0">Order By Update</option>
                        <option value="1">Order By A - Z</option>
                        <option value="2">Order By Z - A</option>
                        <option value="3">Order By Popular</option>
                    </select>
                </div>

                <button type="submit" class="px-3 d-flex align-items-center justify-content-center text-light gap-1 rounded border-0" style="background-color: rgb(134, 7, 96);">
                    <span data-feather="filter" style="width: 20px; height: 20px;"></span>
                     Filter
                </button>
            </form>
        </div>
    </div>

    <div class="row" id="comicsContainer">
        @foreach($comics as $comic)
            <div class="col mb-4">
                @if ($comic->image)
                    <a href="{{ route('comics.comic.single', ['comic' => $comic->id]) }}"><img src="{{ asset('storage/' . $comic->image) }}" alt="{{ $comic->title }}">
                @else
                    <a href="{{ route('comics.comic.single', ['comic' => $comic->id]) }}"><img src="{{ asset('assets/ComicImage/Nano machine.jpg') }}" alt="Gambar Sementara"></a> 
                @endif
                {{-- Str::limit($yangDiambil, jumlahLimit, kasihApaDibelakangTeksnya) parameter ke 3 nilai defaultnya '...' --}}
                <a href="{{ route('comics.comic.single', ['comic' => $comic->id]) }}">
                    <div class="comic-name">{{ Str::limit($comic->title, 15) }}</div>
                </a> 
                <div class="chapter-stats-container">
                    <a href="{{ route('comics.comic.read', ['comic' => $comic->id, 'chapter' => $comic->chapter_id]) }}">
                        <div class="chapter-stats mb-2">
                            <div class="chapter-number">{{ $comic->number }}</div>
                            <div class="released-time">{{ $comic->chapter_created_at }}</div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex align-items-center justify-content-between pb-2">
        @if ($comics->total() > 15) 
            Showing {{ $comics->firstItem() }} to {{ $comics->lastItem() }} of {{ $comics->total() }} results.
        @endif
        {{ $comics->links() }}
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="/js/virtual-select.min.js"></script>
<script>
    $(document).ready(function() {
        // $('#select2Multiple').select2();
        // $('#select2Multiple').select2({
        //     placeholder: 'Select genres'
        // });

        VirtualSelect.init({ 
            ele: '#selectGenres',
        });
    });
</script>