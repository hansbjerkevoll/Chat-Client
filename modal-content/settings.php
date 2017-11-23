<?php
//Get current profile pic
$userID = $_SESSION['UserID'];
$sql = "SELECT * FROM Users WHERE UserID ='$userID'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$imgsrc = $row['ProfilePic'];

if($imgsrc == null){
    if($row['Gender'] == "Male"){
        $imgsrc= 'img/male-usericon.png';
    }
    else{
        $imgsrc = 'img/female-usericon.png';
    }
}
?>

<div class="modal" id="modal-settings">
    <div class="modal-content" id="modal-settings-content">
        <div class="modal-content-header" id="modal-settings-header">
            <span class="modal-content-header-text" id="modal-settings-header-text"><b>Settings</b></span>
            <span class="close-modal-content" id="close-modal-settings">&times;</span>
        </div>
        <form action="includes/settings.inc.php" method="post" onsubmit="return confirm('Do you want to save these settings?')" id="settings-form">
            <div id="profile-pic-change">
                <div style="font-size: 140%; font-family: Tohoma, serif; padding: 12px 20px 0 20px;">Change profile picture: </div>
                <img  style="height: 82px; padding-left: 20px" src= "<?php echo $imgsrc?>" id="signup-profile-pic">
                <input type="hidden" id="hidden-profile-pic-input" name="profile-pic" value="<?php echo $imgsrc?>">
            </div>
            <div class="horizontal-line"></div>

            <div class="modal-content-button">
                <button class="modal-content-send" type="submit" name="submit">Save</button>
                <button class="modal-content-cancel" id="modal-settings-cancel" type="button">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!--- PROFILE PICTURES! -->
<?php include 'modal-content/profile-pic.php'?>

<script>
    // Get the modal
    var modal_settings_modal = document.getElementById('modal-settings');
    // Get the button that opens the modal
    var modal_settings_btn = document.getElementById("modal-settings-link");
    // Get the <span> element that closes the modal
    var modal_settings_span = document.getElementById("close-modal-settings");
    //Cancel button
    var modal_settings_cancel = document.getElementById("modal-settings-cancel");

    // When the user clicks the button, open the modal
    modal_settings_btn.onclick = function() {
        modal_settings_modal.style.display = "block";
    };

    // When the user clicks on <span> (x), close the modal
    modal_settings_span.onclick = function() {
        modal_settings_modal.style.display = "none";
    };
    modal_settings_cancel.onclick = function() {
        modal_settings_modal.style.display = "none";
    };
</script>