$(document).ready(function () {
    var interval = setInterval(function () {

        var chatPartner = document.getElementById('messageLogo').getElementsByClassName('username')[0].innerHTML;

        //Fetch messages
        $.ajax({
            url: 'scripts/php/chat.php',
            data: { chatPartner : chatPartner },
            success: function (data) {
                $('#messages').html(data);
            }
        });

    }, 250)
});




