<div class="modal" id="about">
    <div class="modal-content" id="about-content">
        <div class="modal-content-header" id="about-header">
            <span class="modal-content-header-text" id="about-header-text"><b>About</b></span>
            <span class="close-modal-content" id="close-about">&times;</span>
        </div>
        <div id="about-text">
            <p><b>Created by: </b>Hans Bjerkevoll (Oct 2017)</p>
            <p><b>Contact: </b> <a href="mailto:hansbjerkevoll@gmail.com" class="info-link" target="_blank">hansbjerkevoll@gmail.com</a></p>
            <p><b>Git-Hub Repository: </b><a href="https://github.com/hansbjerkevoll/chat-client" target="_blank" class="info-link">https://github.com/hansbjerkevoll/chat-client</a></p>
            <p><b>Description: </b><br> This is a basic chat-client written in PHP and MySQL. It is still in pre-alpha and should be treated as such. I will try to update as often as I have time and feel like it.
                All criticism is greatly appreciated. Feel free to take contact. </b></p>

        </div>


    </div>
</div>

<script>
    // Get the modal
    var about_modal = document.getElementById('about');
    // Get the button that opens the modal
    var about_btn = document.getElementById("about-link");
    // Get the <span> element that closes the modal
    var about_span = document.getElementById("close-about");

    // When the user clicks the button, open the modal
    about_btn.onclick = function() {
        about_modal.style.display = "block";
    };

    // When the user clicks outside the box, close the modal
    about_modal.onclick = function() {
        about_modal.style.display = "none";
    };

    // When the user clicks on <span> (x), close the modal
    about_span.onclick = function() {
        about_modal.style.display = "none";
    };

</script>