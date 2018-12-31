<?php
 
require_once('../../config.php');
require_once('classifier_form.php');
require_once('prediction_form.php');
 
global $DB, $OUTPUT, $PAGE;

// Check for all required variables.
//$courseid = required_param('courseid', PARAM_INT);
//$blockid = required_param('blockid', PARAM_INT);
 
// Next look for optional variables.
$id = optional_param('id', 0, PARAM_INT);
 
//if (!$course = $DB->get_record('course', array('id' => $courseid))) {
//    print_error('invalidcourse', 'block_learnermodeling', $courseid);
//}
 
//require_login();
$PAGE->set_url('/blocks/learnermodeling/view_Classify.php');
$PAGE->set_pagelayout('standard');
$PAGE->set_heading("Learner Preference Predictor");
//$PAGE->set_context(context_system::instance());

$classifier = new classifier_form();
 
 if($classifier->is_cancelled()) {
    // Cancelled forms redirect to the course main page.
    $homeurl = new moodle_url('http://localhost:8080/moodle/?redirect=0');
    redirect($homeurl);
} else if ($fromform = $classifier->get_data()) {
		
	$id = $fromform->selectedIndex; //this is selected index in alphebetical order. So wrong
	$_SESSION['userId'] = $id;
	$predictor = new prediction_form();
	$site = get_site();
	echo $OUTPUT->header();
	$predictor->display();
	echo $OUTPUT->footer();
	
	//echo $name;
	//print_object($fromform);
	
} else {
  // form didn't validate or this is the first display
	$site = get_site();
	echo $OUTPUT->header();
	$classifier->display();
	echo $OUTPUT->footer();
}

?>