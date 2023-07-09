<div id="flashMessage" class="alert alert-success alert-dismissible fade text-center d-none" role="alert">
    <div id="flashMessageText"></div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
</div>

<div id="commentSection">
  @include('component.comic.__comments-component')
</div>

<script src="/js/dashboard.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    var comicId = {{ $comic->id }};
    var totalComments = {{ $total_comments }};
    var offset = 3;

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