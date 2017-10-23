$('#message-form').submit(function () {

    var message = $('#message').val();


    $.ajax({
        url: 'scripts/php/send.php',
        data: { message: message },
        success: function(data) {
            $('#message').val('');
        }
    });

    return false;
});

