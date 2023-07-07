<div class="total-comment mb-3">
    {{ $total_comments }} Comments
  </div>
  <div class="user-comment d-block" id="userCommentContainer">
    @foreach($comments as $comment)
      <div class="mb-3">
        <div class="d-flex gap-2 align-items-center">
          <img class="user-img" src="../../Channel-profile/exercise 10e.jpg">
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
                <button class="border-0 text-danger bg-transparent delete-comment-button" type="button" data-confirm-message="Are you sure?" data-feather="trash-2"></button>
              </form>
            </div>
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

@if ($total_comments > 3)
  <div class="comment-show-more my-4" id="loadMoreButtonContainer">
    <button class="comment-button-show-more" id="loadMoreCommentsButton">Older Comments &#x25BE;</button>
  </div>
@endif