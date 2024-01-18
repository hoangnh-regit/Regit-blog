import './bootstrap';
import './config';

$(document).ready(function() {
    $('#error').hide();
    $('.update-error').hide();
    $('.toggle-btn').click(function() {
        $('.create-form').toggle();
    });

    $('#commentForm').on('click', function(ev) {
            ev.preventDefault();
            const contentComment = $('#contentComment').val().replace(/</g, "&lt;").replace(/>/g, "&gt;");
            const commentUrl = data.getAttribute('comment-create-route');
        
            $.ajax({
                url: commentUrl,
                type: 'POST',
                data: { content: contentComment },
                success: function(response) {
                    $('#contentComment').val('');
                    $('#error').hide();
                    $('#commentSection').empty();
                    $('#commentSection').html(response.tableView);
                
                    console.log('Before attaching events');
                    $('#commentSection').find('.list').each(function() {
                        attachEditEventToElement($(this));
                    });
                    console.log('After attaching events');
                },
                
                error: function(xhr) {
                    const errorMessage = JSON.parse(xhr.responseText).message;
                    $('#error').html(errorMessage).show();
                }
            });
        });

    $(document).on("click", '.edit-comment-btn', function(e) {
        e.preventDefault();
        const comment = $(this).closest('.list');
        const editInput = comment.find('.edit-input');
        const commentText = comment.find('.comment-text');
        const submitBtn = comment.find('.submit-comment-btn');
        const editBtn = $(this);
        const deleteBtn = comment.find('.delete-comment-btn');
        const cancelBtn = comment.find('.cancel-edit-btn');

        editInput.val(commentText.text()).toggle();
        commentText.toggle();
        editBtn.toggle();
        submitBtn.toggle();
        cancelBtn.toggle(editInput.is(':visible'));
        deleteBtn.toggle();

        cancelBtn.off('click').on('click', function() {
            editInput.toggle();
            commentText.toggle();
            editBtn.toggle();
            submitBtn.toggle();
            cancelBtn.toggle();
            deleteBtn.toggle();
        });
    });

    $(document).on("click", '.submit-comment-btn', function(e) {
        e.preventDefault();
        const comment = $(this).closest('.list');
        const editInput = comment.find('.edit-input');
        const editedText = editInput.val().replace(/</g, "&lt;").replace(/>/g, "&gt;");
        const updateUrl = comment.data('update-route');

        $.ajax({
            url: updateUrl,
            type: 'PUT',
            data: { content: editedText },
            success: function() {
                comment.find('.comment-text').html(editedText).toggle();
                comment.find('.edit-input, .submit-comment-btn').toggle();
                comment.find('.edit-comment-btn, .delete-comment-btn, .cancel-edit-btn').toggle();
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });

    $(document).on("click", '.delete-comment-btn', function(e) {
        e.preventDefault();
        const comment = $(this).closest('.list');
        const commentId = comment.data('comment-id');
        const deleteUrl = `/comments/delete/${commentId}`;

        $.ajax({
            url: deleteUrl,
            type: 'DELETE',
            success: function() {
                comment.remove();
            },
            error: function(xhr) {
                console.error(xhr);
            }
        });
    });
});
