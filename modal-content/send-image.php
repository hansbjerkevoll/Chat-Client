<div class="modal" id="sendImg_page">
    <div class="modal-content" id="sendImg_page-content">
        <div class="modal-content-header" id="sendImg_page-header">
            <span class="modal-content-header-text" id="sendImg_page-text"><b>Send image (NOT WORKING...)</b></span>
            <span class="close-modal-content" id="close-sendImg_page">&times;</span>
        </div>
        <form action="includes/upload.php" method="post" id="sendImg_form" enctype="multipart/form-data">
            Choose image to upload: <br>
            <input type="file" onchange="display_image(this)" name="img-file" id="img-file" required>

            <div id="display-image">
                <img id="image" src="#">
            </div>
            <div class="modal-content-button">
                <button class="modal-content-send" type="submit" name="submit">Send image</button>
                <button class="modal-content-cancel" id="sendImg-cancel" type="button">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>

    // Get the modal
    var sendImg_modal = document.getElementById('sendImg_page');
    // Get the button that opens the modal
    var sendImg_btn = document.getElementById("sendImg-link");
    // Get the iage that opens the modal
    var sendImg_img = document.getElementById("sendImg-image");
    // Get the <span> element that closes the modal
    var sendImg_span = document.getElementById("close-sendImg_page");
    //Cancel button
    var sendImg_cancel = document.getElementById("sendImg-cancel");


    // When the user clicks the button, open the modal
    sendImg_btn.onclick = function() {
        sendImg_modal.style.display = "block";
    };

    // When the user clicks the image, open the modal
    sendImg_img.onclick = function() {
        sendImg_modal.style.display = "block";
    };

    // When the user clicks outside the box, close the modal
    sendImg_modal.onclick = function() {
        sendImg_modal.style.display = "none";
    };

    // When the user clicks on <span> (x), close the modal
    sendImg_span.onclick = function() {
        sendImg_modal.style.display = "none";
    };
    sendImg_cancel.onclick = function() {
        sendImg_modal.style.display = "none";
    };

    function display_image(input) {
        //Change the image src to input
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image')
                    .attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }

        //CSS for image
        var image = document.getElementById('image');
        image.style.border = 'solid 1px #c7c7c7';
        image.style.maxWidth = '480px';
        image.style.maxHeight = '340px';
    }
</script>