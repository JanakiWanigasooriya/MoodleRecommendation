<?php
require_once('../../config.php');
require_once("{$CFG->libdir}/formslib.php");

class prediction_form extends moodleform {
 
    function definition() {
 
		global $DB; // declare this if within a function
		$userId = $_SESSION['userId'];
        $mform =& $this->_form;
		
		echo $userId;
		$result = $DB->get_records_sql('select * from mdl_user where id ='.$userId.'');
		$pref_result = $DB->get_records_sql('select * from mdl_vark_preference where user_id ='.$userId.'');
		//print_object($record);
		foreach($result as $record) {
			$id = $record->id;
			$first = $record->firstname;
			$last = $record->lastname;
			
			$mform->addElement('html', 'User ID: <strong>'.$userId.'</strong></br>');
			$mform->addElement('html', 'Student Name: <strong>'.$first.' '.$last.'</strong></br>');
		}
		
		foreach($pref_result as $record) {
			$v = $record->v_prob;
			$a = $record->a_prob;
			$r = $record->r_prob;
			$k = $record->k_prob;
			$dimID = $record->pref_dimension;
			
			$pref_dim = $DB->get_records_sql('select * from mdl_vark_dimension where dimension_id ='.$dimID.'');
			
			$mform->addElement('html', '</br>');
			$mform->addElement('html', '<table style="width:100%">');
			$mform->addElement('html', '<tr><th>VARK Modal</th><th>Probability</th></tr>');
			$mform->addElement('html', '<tr><td>Visual</td><td>'.$v.'</td></tr>');
			$mform->addElement('html', '<tr><td>Auditory</td><td>'.$a.'</td></tr>');
			$mform->addElement('html', '<tr><td>Reading/Writing</td><td>'.$r.'</td></tr>');
			$mform->addElement('html', '<tr><td>Kinesthetic</td><td>'.$k.'</td></tr>');
		    $mform->addElement('html', '</table>');
		
		foreach($pref_dim as $rec) {
			$dimension = $rec->dimension_text;
			echo $dimension;
			$mform->addElement('html', '</br>');
			$mform->addElement('html', 'Prefered Learning Model: '.$dimension);
		}
		}
	}
}