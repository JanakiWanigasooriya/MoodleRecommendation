<?php
 
require_once('../../config.php');
require_once('questionnaire_form.php');
 
global $DB, $OUTPUT, $PAGE;
 
// Check for all required variables.
//$courseid = required_param('courseid', PARAM_INT);
//$blockid = required_param('blockid', PARAM_INT);
 
// Next look for optional variables.
$id = optional_param('id', 0, PARAM_INT);
 
//if (!$course = $DB->get_record('course', array('id' => $courseid))) {
//    print_error('invalidcourse', 'block_learnermodeling', $courseid);
//}
 
//require_login($course);
$PAGE->set_url('/blocks/learnermodeling/view_Q.php');
$PAGE->set_pagelayout('standard');
$PAGE->set_heading("VARK Learner Modeling questionnaire");

$questionnaire = new questionnaire_form();
 
if($questionnaire->is_cancelled()) {
    // Cancelled forms redirect to the course main page.
    $homeurl = new moodle_url('http://localhost:8080/moodle/?redirect=0');
    redirect($homeurl);
} else if ($questionnaire->get_data()) {
    // We need to add code to appropriately act on and store the submitted data
    // but for now we will just redirect back to the course main page.
    $courseurl = new moodle_url('/course/view.php', array('id' => $courseid));
    redirect($courseurl);
} else {
    // form didn't validate or this is the first display
    $site = get_site();
    echo $OUTPUT->header();
    $questionnaire->display();
    echo $OUTPUT->footer();
}


?>