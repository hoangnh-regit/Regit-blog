import './bootstrap';
import './config';

$(document).ready(function() {
    $('.checkbox').on('change', function() {
        const checkbox = $(this);
        const blockRoute = checkbox.attr('block-route');
        const isChecked = checkbox.prop('checked');
        $.ajax({    
            url: blockRoute,
            method: 'PUT',
            success: function(response) {
            },
            error: function(error) {
                checkbox.prop('checked', !isChecked);
            }
        });
    });
});
