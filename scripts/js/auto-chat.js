$(document).ready(function () {

    setInterval(function () {

        //Get number of message currently displayed
        var oldMsgNum = document.getElementsByClassName('message').length;

        //Chatpartner to use when loading messages
        var chatPartner = document.getElementById('messageLogo').getElementsByClassName('username')[0].innerHTML;

        //Fetch messages
        $.ajax({
            url: 'scripts/php/chat.php',
            async: false,
            data: { chatPartner : chatPartner },
            success: function (data) {
                $('#messages').html(data);
            }
        });

        //Get number of message to display
        $.ajax({
            url: 'scripts/php/getMsgNum.php',
            async: false,
            data: { chatPartner : chatPartner },
            success: function (data) {
                var newMsgNum = data.trim();
                //If there are new messages => scroll down
                if(newMsgNum > oldMsgNum){
                    var messages = document.getElementById('messages');
                    messages.scrollTop = messages.scrollHeight;
                }
            }
        });

    }, 250)
});

function notification(message) {
    // Let's check if the browser supports notifications
    if (!("Notification" in window)) {
        alert("This browser does not support desktop notification");
    }

    // Let's check whether notification permissions have already been granted
    else if (Notification.permission === "granted") {
        // If it's okay let's create a notification
        var notification = new Notification(message);
    }

    // Otherwise, we need to ask the user for permission
    else if (Notification.permission !== "denied") {
        Notification.requestPermission(function (permission) {
            // If the user accepts, let's create a notification
            if (permission === "granted") {
                var notification = new Notification(message, {
                    icon : "img/chat-icon.png",
                    tag : "Alpha Chat Message Alert"
                });
            }
        });
    }

    // At last, if the user has denied notifications, and you
    // want to be respectful there is no need to bother them any more.
}



