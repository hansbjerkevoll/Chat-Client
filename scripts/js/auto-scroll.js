$(document).ready(function () {
    var interval = setInterval(function () {

        //Get number of messages currently displayed
        var oldMsgNum = document.getElementsByClassName('message').length;

        //Get number of messages on the server
        $.ajax({
            url: 'scripts/php/getMsgNum.php',
            success: function (data) {
                var newMsgNum = data.trim();
                if(newMsgNum > oldMsgNum){
                    var messages = document.getElementById('messages');
                    messages.scrollTop = messages.scrollHeight;
                }
            }
        });
    }, 100)
});
