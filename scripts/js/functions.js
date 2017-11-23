//Highlight the clicked user
function highlight(item){
    var classList = document.getElementsByClassName('highlight');
    for(i = 0; i < classList.length; i++){
        classList[i].classList.remove('highlight');
    }
    item.classList.add('highlight');
}

// Script to change color to active element
function messageLogoChange(item) {
    document.getElementById('messageLogo').innerHTML = item.getElementsByClassName('user-details')[0].innerHTML;
}

//Script to send message when enter is clicked
$(document).ready(function(){
    $('#message').keypress(function(e){
        if(e.which === 13 && !e.shiftKey){
            // submit via ajax
            $('#message-form').submit();
        }
    });
});

//Toggle settings menu
$(document).click(function(event) {
    if(event.target.id === "settings-img") {
        $('#settings-content').slideToggle("medium");
    }
    else{
        if($('#settings-content').is(":visible")) {
            $('#settings-content').slideToggle("medium");
        }
    }
});

//Toggle chat-options menu
$(document).click(function(event) {
    if(event.target.id === "chat-options-img") {
        $('#chat-options-content').slideToggle("medium");
    }
    else{
        if($('#chat-options-content').is(":visible")) {
            $('#chat-options-content').slideToggle("medium");
        }
    }
});