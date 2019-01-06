<?php
 
require_once('../../config.php');
require_once('calc_form.php');
require_once('calc_result_form.php');

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
$PAGE->set_url('/blocks/learnermodeling/similarityCalc.php');
$PAGE->set_pagelayout('standard');
$PAGE->set_heading("Finding Nearest neighbours");

$result = new calc_form();
 
if($result->is_cancelled()) 
{
    // Cancelled forms redirect to the course main page.
    $homeurl = new moodle_url('http://localhost:8080/moodle/?redirect=0');
    redirect($homeurl);
} 
else if ($fromform = $result->get_data()) 
{
    $id = $fromform->selectedIndex; //this is selected index in alphebetical order. So wrong
	$_SESSION['userId'] = $id+1;
	$simCalculator = new calc_result_form();
	$site = get_site();
	echo $OUTPUT->header();
	$simCalculator->display();
	echo $OUTPUT->footer();
} 
else 
{
    // form didn't validate or this is the first display
    $site = get_site();
    echo $OUTPUT->header();
    $result->display();
    echo $OUTPUT->footer();
}


?>