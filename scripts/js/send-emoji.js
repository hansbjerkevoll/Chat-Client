$('.emoji').click(function () {

    var receiver = document.getElementById('messageLogo').getElementsByClassName('username')[0].innerHTML;
    var message = "!image " + this.src;

    $.ajax({
        url: 'scripts/php/send.php',
        data: { receiver : receiver, message: message },
        success: function(data) {
            $('#message').val('');
            if(data.trim() === "False"){
                alert("ERROR: Message not sent...");
            }
        }
    });

    //Close the modal after sending emoji
    document.getElementById('sendEmoji_page').style.display = "none";

    return false;
});

