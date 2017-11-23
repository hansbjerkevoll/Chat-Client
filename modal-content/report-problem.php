<div class="modal" id="report_problem">
    <div class="modal-content" id="report_problem-content">
        <div class="modal-content-header" id="report_problem-header">
            <span class="modal-content-header-text" id="report_problem-header-text"><b>Report a problem</b></span>
            <span class="close-modal-content" id="close-report_problem">&times;</span>
        </div>
        <form action="includes/report-problem-mail.inc.php" method="post" onsubmit="return confirm('Are you sure you want to report the problem?')" id="report_problem-form">
            <p>Where is the problem?</p>
            <select id="report_problem-select" name="problem-area">
                <option>Messages or Chat</option>
                <option>Login</option>
                <option>Signup</option>
                <option>Settings</option>
                <option>Problem reporting</option>
                <option>Other... (please specify)</option>
            </select>
            <p>What happened?</p>
            <textarea name="problem" id="problem" placeholder="Explain shortly (140 characters) what happened, and how to recreate the problem..." maxlength="140" required></textarea>
            <div class="modal-content-button">
                <button class="modal-content-send" type="submit" name="submit">Report problem</button>
                <button class="modal-content-cancel" id="report_problem-cancel" type="button">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Get the modal
    var report_problem_modal = document.getElementById('report_problem');
    // Get the button that opens the modal
    var report_problem_btn = document.getElementById("report_problem-link");
    // Get the <span> element that closes the modal
    var report_problem_span = document.getElementById("close-report_problem");
    //Cancel button
    var report_problem_cancel = document.getElementById("report_problem-cancel");

    // When the user clicks the button, open the modal
    report_problem_btn.onclick = function() {
        report_problem_modal.style.display = "block";
        console.log("ashdhasjkd");
    };

    // When the user clicks on <span> (x), close the modal
    report_problem_span.onclick = function() {
        report_problem_modal.style.display = "none";
    };
    report_problem_cancel.onclick = function() {
        report_problem_modal.style.display = "none";
    };
</script>