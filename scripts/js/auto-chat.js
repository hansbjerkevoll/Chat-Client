$(document).ready(function () {
    var interval = setInterval(function () {
        $.ajax({
            url: 'scripts/php/chat.php',
            success: function (data) {
                $('#messages').html(data);
                var messages = document.getElementById('messages');
                messages.scrollTop = messages.scrollHeight;
            }
        });
    }, 250)
});




