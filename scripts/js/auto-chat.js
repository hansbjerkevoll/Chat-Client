$(document).ready(function () {
    var interval = setInterval(function () {



        //Fetch messages
        $.ajax({
            url: 'scripts/php/chat.php',
            success: function (data) {
                $('#messages').html(data);
            }
        });

    }, 250)
});




