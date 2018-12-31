<?php
require_once('../../config.php');
require_once("{$CFG->libdir}/formslib.php");


class questionnaire_form extends moodleform {
 
    function definition() {
 
		global $DB; // declare this if within a function
 
        $mform =& $this->_form;
		$ans = array();
		$i = 0;
		$result = $DB->get_records('vark_question', array()); // get all records in mdl_vark_question table
		
		
		 foreach($result as $record){
			 $qText = $record->question_text;
			 $ansA = $record->ans_a;
			 $ansB = $record->ans_b;
			 $ansC = $record->ans_c;
			 $ansD = $record->ans_d;
			 $qNo = $i + 1;
			 $mform->addElement('html', '<strong>('.$qNo.') '.$qText.'</strong>');
			
			 $attributes = array();
			 $radioarray=array();
			 $radioarray[] = $mform->createElement('radio', 'yesno'.$i, '', $ansA, 0, $attributes);
			 $radioarray[] = $mform->createElement('radio', 'yesno'.$i, '', $ansB, 0, $attributes);
			 $radioarray[] = $mform->createElement('radio', 'yesno'.$i, '', $ansC, 0, $attributes);
			 $radioarray[] = $mform->createElement('radio', 'yesno'.$i, '', $ansD, 0, $attributes);
			 $mform->addGroup($radioarray, 'radioar'.$i, '', array(' '), false);
			
			 $i = $i + 1;
		}  
		
		$this->add_action_buttons(true, 'submit');
    }
}