$(document).ready(function () {

    var interval = setInterval(function () {

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

    }, 100)
});




