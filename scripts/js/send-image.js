// Get the modal
var sendImg_modal = document.getElementById('sendImg_page');
// Get the button that opens the modal
var sendImg_btn = document.getElementById("sendImg-link");
// Get the <span> element that closes the modal
var sendImg_span = document.getElementById("close-sendImg_page");

// When the user clicks the button, open the modal
sendImg_btn.onclick = function() {
    sendImg_modal.style.display = "block";
};

// When the user clicks on <span> (x), close the modal
sendImg_span.onclick = function() {
    sendImg_modal.style.display = "none";
};