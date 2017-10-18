$('#message-form').submit(function () {

    var sender = $('#sender').val();
    var message = $('#message').val();


    $.ajax({
        url: 'scripts/php/send.php',
        data: { sender: sender, message: message },
        success: function(data) {
            $('#message').val('');
        }
    });

    return false;
});

