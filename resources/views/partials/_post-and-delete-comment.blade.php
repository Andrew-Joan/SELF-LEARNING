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

        if (confirm(confirmMessage)) {
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
        }
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