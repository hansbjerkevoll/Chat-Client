<div class="modal" id="reset-password">
    <div class="modal-content" id="reset-password-content">
        <div class="modal-content-header" id="reset-password-header">
            <span class="modal-content-header-text" id="reset-password-header-text"><b>Reset password</b></span>
            <span class="close-modal-content" id="close-reset-password">&times;</span>
        </div>
        <form action="includes/reset-password.inc.php" id="reset-password-form" onsubmit="return confirm('Are you sure you want to reset your password?')" method="post">
            <p>Enter e-mail address to reset password</p>
            <input type="email" style="width: 100%; font-family: Tohoma, serif; font-size: 120%; padding: 2px" placeholder="E-mail" name="email" required>
            <div class="modal-content-button">
                <button class="modal-content-send" type="submit" name="submit">Reset password</button>
                <button class="modal-content-cancel" id="reset-password-cancel" type="button">Cancel</button>
            </div>
        </form>

    </div>
</div>

<script>
    // Get the modal
    var reset_password_modal = document.getElementById('reset-password');
    // Get the button that opens the modal
    var reset_password_btn = document.getElementById("password-link");
    // Get the <span> element that closes the modal
    var reset_password_span = document.getElementById("close-reset-password");
    //Cancel button
    var reset_password_cancel = document.getElementById("reset-password-cancel");

    // When the user clicks the button, open the modal
    reset_password_btn.onclick = function() {
        reset_password_modal.style.display = "block";
    };

    // When the user clicks on <span> (x), close the modal
    reset_password_span.onclick = function() {
        reset_password_modal.style.display = "none";
    };
    reset_password_cancel.onclick = function() {
        reset_password_modal.style.display = "none";
    };
</script>