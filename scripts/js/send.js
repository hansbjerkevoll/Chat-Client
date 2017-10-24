$('#message-form').submit(function () {

    var receiver = document.getElementById('messageLogo').getElementsByClassName('username')[0].innerHTML;
    var message = $('#message').val();



    $.ajax({
        url: 'scripts/php/send.php',
        data: { receiver : receiver, message: message },
        success: function(data) {
            $('#message').val('');
        }
    });

    return false;
});

