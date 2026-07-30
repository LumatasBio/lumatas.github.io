$(document).ready(function() {
    $('#form').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#form-messages').html('<p style="color: green; font-weight: bold;">Thank you! Your message has been sent.</p>');
                    $('#form')[0].reset();
                } else {
                    $('#form-messages').html('<p style="color: red; font-weight: bold;">Something went wrong. Please try again.</p>');
                }
            },
            error: function() {
                $('#form-messages').html('<p style="color: red; font-weight: bold;">An error occurred while sending your message.</p>');
            }
        });
    });
});