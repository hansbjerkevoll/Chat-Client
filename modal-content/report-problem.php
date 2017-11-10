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
            <div id="report_problem-button">
                <button id="report_problem-cancel" type="button">Cancel</button>
                <button id="report_problem-send" type="submit" name="submit">Report problem</button>
            </div>
        </form>
    </div>
</div>