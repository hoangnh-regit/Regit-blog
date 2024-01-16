import './bootstrap';
import './config';
$(document).ready(function() {
    $('#error').toggle();
    $('.update-error').toggle();
    $('.toggle-btn').click(function() {
        $('.create-form').toggle();
    });

    $('#categoryCreateForm').submit(function(e) {
        e.preventDefault();
        let categoryName = $('#categoryName').val().replace(/</g, "&lt;").replace(/>/g, "&gt;");
        const url = $('#data').attr('category-create-route');
        $.ajax({
            url: url,
            type: 'POST',
            data: { name: categoryName },
            success: function(response) {
                const data = response.data;
                const route = response.route;
                appendCategoryRow(data, route);
                $('#categoryName').val('');
                $('.create-form').toggle();
            },
            error: function(xhr) {
                const errorMessage = JSON.parse(xhr.responseText).message;
                $('#error').html(errorMessage).toggle();
            }
        });
    });

    function appendCategoryRow(data, route) {
        const newItemHTML = `
            <tr>
                <td>${data.id }</td>
                <td class="category-name"
                    data-category-id="${ data.id }">
                    <a class="title btn-toggle"
                        href="#">${ data.name }</a>
                    <input type="text"
                        class="form-control edit-input hide-btn">
                </td>
                <td>
                    <button class="btn btn-primary btn-edit">
                        <i class="bi bi-pen"></i>
                    </button>
                    <button type="submit" id="submitButton"
                        category-update-url="${ route }"
                        class="btn btn-success hide-btn btn-submit btn-toggle">
                        <i class="bi bi-send-fill"></i>
                    </button>
                    <button type="button" id="cancelButton"
                        class="btn btn-secondary hide-btn btn-cancel btn-toggle">
                        <i class="bi bi-x-circle-fill"></i>
                    </button>
                    <button class="btn btn-danger btn-delete"
                        category-delete-url="${ route }"
                        data-category-id="${ data.id }">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
            </tr>
        `;
        $('table tbody').prepend(newItemHTML);
    }

    $(document).on("click", '.btn-edit', function(e) {
        e.preventDefault();
        const row = $(this).closest('tr');
        const toggleBtn = row.find('.btn-toggle');
        const editBtn = row.find('.btn-edit');
        const categoryCell = row.find('.category-name');
        const categoryNameLink = categoryCell.find('.title');
        const categoryNameInput = categoryCell.find('.edit-input');
        categoryNameInput.val(categoryNameLink.text()).show().focus();
        editBtn.toggle();
        toggleBtn.toggle();
    });

    $(document).on("click", '.btn-submit', function(e) {
        e.preventDefault();
        const row = $(this).closest('tr');
        const updatedCategoryName = row.find('.edit-input').val();
        const urlUpdate = $(this).attr('category-update-url');
        $.ajax({
            url: urlUpdate,
            method: 'PUT',
            data: {name: updatedCategoryName},
            success: function(response) {
                const categoryCell = row.find('.category-name');
                const categoryNameLink = categoryCell.find('.title');
                categoryNameLink.text(updatedCategoryName);
                const editBtn = row.find('.btn-edit');
                const toggleBtn = row.find('.btn-toggle');
                const categoryNameInput = categoryCell.find('.edit-input');
                categoryNameInput.toggle();
                toggleBtn.toggle();
                editBtn.toggle();
            },
            error: function(xhr) {
                const errorMessage = JSON.parse(xhr.responseText).message;
                row.find('.update-error').html(errorMessage).show();
            }
        });
    });
    
    $(document).on("click", '.btn-cancel', function(e) {
        e.preventDefault();
        const row = $(this).closest('tr');
        const editBtn = row.find('.btn-edit');
        const toggleBtn = row.find('.btn-toggle');
        const categoryCell = row.find('.category-name');
        const error = row.find('.update-error')
        const categoryNameInput = categoryCell.find('.edit-input');
        categoryNameInput.toggle();
        error.hide();
        editBtn.toggle();
        toggleBtn.toggle();
    });
    
    $(document).on("click", '.btn-delete', function(e) {
        e.preventDefault();
    
        const deleteUrl = $(this).attr('category-delete-url');
        const row = $(this).closest('tr');
    
        const userConfirmed = confirm('Are you sure you want to delete this category?');
    
        if (userConfirmed) {
            $.ajax({
                url: deleteUrl,
                type: 'DELETE',
                success: function() {
                    row.remove();
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }  
            });
        }
    });
});
