@extends('layouts.single-comic')

@section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <div class="comic-head">
    <div class="comic-info">
      <div class="single-comic-name">{{ $comic->title }}</div>
      <div class="single-comic-container">
        <div class="single-comic-img-container">
            <img src="{{ asset('assets/ComicImage/Nano machine.jpg') }}" alt="Thumbnail Comic">
        </div>
        @php
          $bgColor = '';
          $marginRight = '';
          $bookmarkText = 'Bookmark';
          $bookmarkRoute = route('bookmark.add', ['comic' => $comic->id]);
          $bookmarkMethod = 'post';
          if ($bookmarked_or_not) {
            $bgColor = 'bg-danger';
            $bookmarkText = 'Bookmarked';
            $marginRight = 'me-2';
            $bookmarkRoute = route('bookmark.remove', ['comic' => $comic->id]);
            $bookmarkMethod = 'delete';
          }
        @endphp
        <div class="single-comic-stat">
          <div class="star-and-bookmark mb-2 mt-1 d-flex justify-content-between">
            <div class="d-flex gap-1 align-items-center">
              <img class= "stars" src="https://assets.codepen.io/13090/filled_1.svg">
              <img class= "stars" src="https://assets.codepen.io/13090/filled_1.svg">
              <img class= "stars" src="https://assets.codepen.io/13090/filled_1.svg">
              <img class= "stars" src="https://assets.codepen.io/13090/filled_1.svg">
              <img class= "stars" src="https://assets.codepen.io/13090/filled_1.svg">
              <div class="star-value ms-1">5</div>
            </div>

            <form method="post" action="{{ $bookmarkRoute }}">
              @method($bookmarkMethod)
              @csrf
              <button type="submit" class="d-flex align-items-center gap-1 border-0 {{ $marginRight }} text-light {{ $bgColor }} bookmark-button"><span data-feather="bookmark" style="width: 20px; height: 20px;"></span> {{ $bookmarkText }}</button>
            </form>
          </div>
          <div class="indicator-comic-head-container">
              <div class="indicator-comic-head-1">
                <div class="indicator">Rating</div>
                <div class="indicator">Rank</div>
                <div class="indicator">Alternative</div>
                <div class="indicator">Author(s)</div>
                <div class="indicator">Genre(s)</div>
                <div class="indicator">Type</div>
              </div>
    
              <div class="indicator-comic-head-2">
                @php
                  if ($comic_rank == 1) $suffixes = 'st';
                  else if ($comic_rank == 2) $suffixes = 'nd';
                  else if ($comic_rank == 3) $suffixes = 'rd';
                  else $suffixes = 'th';
                @endphp
                <div class="indicator-2">5 / 5 out of 158</div>
                <div class="indicator-2">{{ $comic_rank }}{{ $suffixes }}, it has {{ $total_view }} views</div>
                <div class="indicator-2">{{ $comic->title }}</div>
                <div class="indicator-2">{{ $comic->author->name }}</div>
                <div class="indicator-2">
                  @foreach ($comic->genre as $genre)
                    {{ $genre->name }},
                  @endforeach
                </div>
                <div class="indicator-2">{{ $comic->category->name }}</div>
              </div>
  
              <div class="indicator-34">
                <div class="indicator-34-flex-1">
                  <div class="d-flex gap-3">
                    <div class="single-comic-release">
                      Released
                    </div>
                    <div class="single-comic-status">
                      {{ $comic->release->year }}
                    </div>
                  </div>
        
                  <div class="d-flex gap-4">
                    <div class="single-comic-release-year">
                      Status
                    </div>
                    <div class="single-comic-status-rn">
                      {{ $comic->status->name }}
                    </div>
                  </div>
                </div>

                <div class="indicator-34-flex-2">
                  <div class="d-flex gap-2">
                    <div class="comic-info-comment">
                      <span data-feather="message-circle" class="mb-2"></span>
                      <div class="small text-center">{{ $total_comments }} comments</div>
                    </div>
                    <div class="comic-info-bookmark">
                      <span data-feather="bookmark" class="mb-2"></span>
                      <div class="small text-center">{{ $comic->user()->count() }} users bookmarked this!</div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-4">
    <div class="synopsis-chapter-container">
      <div class="latest-synopsis">
        # Synopsis
      </div>
      <div class="synopsis-text">
        {!! $comic->synopsis !!}
      </div>
      <div class="synopsis-show-more">
        <button class="synopsis-button-show-more">Show More &#x25BE;</button>
      </div>

      <div class="chapter-list">
        @include('component.comic.__chapter-list-component')
      </div>

      <div class="discussion-headline">
        # Discussion
      </div>

      <div class="discussion-instruction">
        Leave a Reply
      </div>

      <div class="user-log mb-2 d-flex align-items-center">
        <span>
          @auth
            <img class="user-img" src="../../Comic Website/logo/Kraken logo">
            Logged in as {{ auth()->user()->name }}.
            <span class="user-log-span-container">
              <form action="/logout" method="post">
                @csrf
                <button class="dropdown-item user-log-span" type="submit">
                   Log out?
                </button>
              </form>  
            </span> 
          @else
            Logged in as Guest. <b>You must <a href="/login" class="text-decoration-none user-log-span">Login</a> first to comment</b>. 
          @endauth
        </span>
      </div>

      <form method="post" action="{{ route('comics.comic.comment.storeComment', ['comic' => $comic->id]) }}" id="newCommentForm">
        @csrf
        <input id="commentText" type="hidden" name="commentText" value="{{ old('commentText') }}">
        <trix-editor input="commentText" id="trixInput"></trix-editor>

        @error('commentText')
          <p class="text-danger mb-0">{{ $message }}</p>
        @enderror

        <div class="d-flex justify-content-end">
          <button type="submit" class="post-comment-button my-3">
            Post Comment
          </button>
        </div>
      </form>

      <div id="flashMessage" class="alert alert-success alert-dismissible fade text-center d-none" role="alert">
        <div id="flashMessageText"></div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      </div>

      <div id="commentSection">
        @include('component.comic.__comments-component')
      </div>
    </div>

    <div class="trending-comics-section ms-4">
      @include('component.__trending-comics-component')
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      var comicId = {{ $comic->id }};
      var totalComments = {{ $total_comments }};
      var offset = 3;

      $('.synopsis-button-show-more').click(function() {
        if ($('.synopsis-text').hasClass('expand')) {
          $('.synopsis-text').removeClass('expand');
          $('.synopsis-button-show-more').html('Show More &#x25BE;');
          $('.synopsis-text').animate({ maxHeight: '8em' }, 500);
        } else {
          $('.synopsis-text').addClass('expand');
          $('.synopsis-button-show-more').text('Show Less \u25B4');
          $('.synopsis-text').animate({ maxHeight: $('.synopsis-text')[0].scrollHeight }, 500);
        }
      });

      $('#newCommentForm').on('submit', function(e) {
        e.preventDefault();

        let commentText = $('#commentText').val(); // Get the value of the commentText input field

        $.ajax({
          url: $(this).attr('action'),
          type: 'POST',
          data: { 
            commentText: commentText,
            comicId: comicId,
            _token: $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response) {
            $('#commentSection').html(response);
            $('#commentText').val('');
            $('#trixInput').val('');
            $('#flashMessage').removeClass('d-none').addClass('show');
            $('#flashMessageText').text('Your comment has been successfully posted');
            offset = 3;
          },
          error: function(xhr, status, error) {
            console.log(error);
            $('#flashMessage').removeClass('d-none alert-success').addClass('show alert-danger');
            if (!commentText) $('#flashMessageText').text('Comment field cannot be empty!');
            else $('#flashMessageText').text('You must log-in first to comment!');
          }
        });
      });

      $('.edit-comment-btn').click(function() {
        let commentId = $(this).data('comment-id');
        $('#edit-form-' + commentId).removeClass('d-none');

        $('#edit-form-' + commentId).on('submit', function(e) {
        e.preventDefault();

        let commentEditText = $('#commentEditText-' + commentId).val(); // Get the value of the commentText input field

        $.ajax({
          url: $(this).attr('action'),
          type: 'put',
          data: { 
            commentEditText: commentEditText,
            commentId: commentId,
            _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
              $('#' + commentId + '-text').html(response);
              $('#commentText').val('');
              $('#trixInput').val('');
              $('#edit-form-' + commentId).addClass('d-none');
            },
            error: function(xhr, status, error) {
              console.log(error);
            }
          });
        });
      });

      $('.cancel-edit-btn').click(function() {
        let commentId = $(this).data('comment-id');
        $('#edit-form-' + commentId).addClass('d-none');
      });
      
      $('.delete-comment-button').on('click', function() {
        let commentId = $(this).closest('.delete-comment-form').data('comment-id');
        let confirmMessage = $(this).data('confirm-message');

        $('#confirmDeleteCommentButton').on('click', function() {
          $.ajax({
            url: '{{ route("comics.comic.comment.deleteComment", ["comic" => "' + comicId + '"]) }}',
            type: 'delete',
            data: {
              commentId: commentId,
              comicId: comicId,
              _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(response) {
              $('#commentSection').html(response);
              $('#flashMessage').removeClass('d-none').addClass('show');
              $('#flashMessageText').text('Your comment has been successfully deleted');
              offset = 3;
            },
            error: function(xhr, status, error) {
              console.log(error);
            }
          });
        });
      });

      function loadMoreComments() {
         $.ajax({
          url: '{{ route("load-more-comments") }}',
          type: 'GET',
          data: { 
            skipComment: offset,
            comicId: comicId
          },
          success: function(response) {
            $('#userCommentContainer').append(response).slideDown('slow');
            offset += 3;

            if (offset > totalComments) {
              $('#loadMoreButtonContainer').addClass('d-none');
            }
          },
          error: function(xhr, status, error) {
            console.log(error); // Menampilkan pesan error (jika ada)
          }
        });
      }

      $('#loadMoreCommentsButton').on('click', function(e) {
          loadMoreComments();
      });

    });
  </script>
@endsection