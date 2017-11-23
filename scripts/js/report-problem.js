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
};

// When the user clicks on <span> (x), close the modal
report_problem_span.onclick = function() {
    report_problem_modal.style.display = "none";
};
report_problem_cancel.onclick = function() {
    report_problem_modal.style.display = "none";
};