<div class="user-comment d-block" id="userCommentContainer">
    @foreach($comments as $comment)
      <div class="mb-3">
        <div class="d-flex gap-2 align-items-center">
          @if ($comment->user->image)
            <img src="{{ asset('storage/' . $comment->user->image) }}" class="user-img">
          @else
            <img src="{{ asset('assets/UserImage/sad-cat.jpg') }}" class="user-img">
          @endif
          <div class="user-name-comment">
            <div class="user-name">
              {{ $comment->user->name }}
            </div>
            <div class="text-secondary small">{{ $comment->created_at->format('d M Y') }}</div>
          </div>
          {{-- disini saya tambahin @auth karena kalau guest masuk nanti error pas ngecek comment->user->id sama dengan auth()->user()->id atau bukan --}}
          @auth
            @if($comment->user->id == auth()->user()->id)
              <div class="d-flex align-items-center gap-2">
                <span data-feather="edit-3" style="cursor: pointer" class="edit-comment-btn" data-comment-id="{{ $comment->id }}"></span>
                <form method="post" action="{{ route('comics.comic.comment.deleteComment', ['comic' => $comic->id]) }}" class="delete-comment-form" data-comment-id="{{ $comment->id }}">
                  @method('delete')
                  @csrf
                  <button class="border-0 text-danger bg-transparent delete-comment-button" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-feather="trash-2"></button>
                </form>
              </div>

              {{-- Delete Alert Modal --}}
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title text-danger" id="staticBackdropLabel">Delete Comment Alert</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-secondary">
                      Are you sure you want to delete this comment?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-primary" id="confirmDeleteCommentButton" data-bs-dismiss="modal">Confirm</button>
                    </div>
                  </div>
                </div>
              </div>
              {{-- End Delete Alert Modal --}}
            @endif
          @endauth
        </div>
        
        <div class="user-comment-text" id="{{ $comment->id }}-text">
          {!! $comment->commentText !!}
        </div>  
      </div>

      <form method="post" action="{{ route('comics.comic.comment.editComment', ['comic' => $comic->id]) }}" class="d-none" id="edit-form-{{ $comment->id }}">
        @method('put')
        @csrf

        <input id="commentEditText-{{ $comment->id }}" type="hidden" name="commentEditText-{{ $comment->id }}" value="">
        <trix-editor input="commentEditText-{{ $comment->id }}"></trix-editor>
        @error('commentEditText-' . $comment->id)
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <div class="d-flex justify-content-end align-items-center gap-3 my-3">
          <div class="post-comment-button bg-danger cancel-edit-btn" data-comment-id="{{ $comment->id }}">
            Cancel
          </div>
          <button type="submit" class="post-comment-button">
            Edit Comment
          </button>
        </div>
      </form>
    @endforeach
</div>

<script src="https://unpkg.com/feather-icons"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    feather.replace();
    $(document).ready(function() {
        var comicId = {{ $comic->id }};

        $('.edit-comment-btn').click(function() {
            var commentId = $(this).data('comment-id');
            $('#edit-form-' + commentId).removeClass('d-none');

            $('#edit-form-' + commentId).on('submit', function(e) {
                e.preventDefault();

                var commentEditText = $('#commentEditText-' + commentId).val(); // Get the value of the commentText input field

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
            var commentId = $(this).data('comment-id');
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
                        $('#commentSection').replaceWith(response);
                        $('#flashMessage').removeClass('d-none').addClass('show');
                        $('#flashMessageText').text('Your comment has been successfully deleted');
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    });
</script>
