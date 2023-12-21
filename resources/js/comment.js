import './bootstrap';
import './config';

const data = document.getElementById('data');

$(document).ready(function() {
    $('#error').hide();
    $('#commentForm').click(function(ev) {
        ev.preventDefault();
        let contentComment = $('#contentComment').val();
        let commentUrl = data.getAttribute('comment-create-route');
        $.ajax({
            url: commentUrl,
            type: 'POST',
            data: {
                content: contentComment,
            },
            success: function(response) {
                const newItemHTML = `
                    <div class="list">
                      <div class="avatar">
                          <img src="${data.getAttribute('image-user')}" alt="">
                      </div>
                      <div class="name">
                          <h5>${response.user.name}</h5>
                          <div class="comment-content">
                            <p class="comment-text">${response.data.content}</p>
                            <input type="text" class="edit-input">
                            <button class="edit-comment-btn">Edit</button>
                            </div>
                          <p class="time">${response.data.time_elapsed}</p>
                      </div>
                    </div>
                `;
                $('#commentSection').prepend(newItemHTML);
                $('#contentComment').val('');
                $('#error').hide();
            },
            error: function(xhr) {
                const errorMessage = JSON.parse(xhr.responseText).message;
                $('#error').html(errorMessage).show();
            }
        });
    });    
});
