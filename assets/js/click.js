$(function() {
    // Get the form.
    var form = $('#contact');

    // Get the messages div.
    var formMessages = $('#form-messages');

    var formData = $(form).serialize();

    $.ajax({
    type: 'POST',
    url: $(form).attr('action'),
    data: formData
	})

});