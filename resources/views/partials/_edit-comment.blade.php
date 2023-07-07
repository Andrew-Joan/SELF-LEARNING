<div class="user-comment-text" id="{{ $comment->id }}-text">
    {!! $comment->commentText !!}
</div>

<div id="editFlashMessage-{{ $comment->id }}" class="alert alert-success alert-dismissible fade show text-center" role="alert">
    <div id="editFlashMessageText">Your comment has been successfully edited!</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
</div>
