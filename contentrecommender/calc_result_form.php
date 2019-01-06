<?php
require_once('../../config.php');
require_once("{$CFG->libdir}/formslib.php");

class calc_result_form extends moodleform {
 
    function definition() {
 
		global $DB; // declare this if within a function
		$userId = $_SESSION['userId'];
        $mform =& $this->_form;
		
		$result = $DB->get_records_sql('SELECT * FROM mdl_vark_lo_rating where not (userId='.$userId.')');
		$userResult = $DB->get_records_sql('SELECT * FROM mdl_vark_lo_rating where sectionId = 1 and userId='.$userId);
		//new user ratings
		foreach($userResult as $userRating) {
			//new user rating for section1
			$lo1 = $userRating->module1;
			$lo2 = $userRating->module2;
			$lo3 = $userRating->module3;
			$lo4 = $userRating->module4;
		}
		
		//calculate euclidian distance between all users
		foreach($result as $record) {
			//find similar user
			$uid = $record->userid;
			$sid = $record->sectionid;
			$m1 = $record->module1;
			$m2 = $record->module2;
			$m3 = $record->module3;
			$m4 = $record->module4;
			
			$score = sqrt(pow($m1-$lo1,2)+ pow($m2-$lo2,2) + pow($m3-$lo3,2) + pow($m4-$lo4,2));
			$similarity[$uid][$sid] = $score;
		}
		//print all similarity values
		for($sec = 1; $sec < 5; $sec++)	
		{
			$mform->addElement('html', '</br>Section'.$sec.'');
			$mform->addElement('html', '</br>');
			$mform->addElement('html', '<table style="width:100%">');
			$mform->addElement('html', '<tr><th>User ID </th><th>similarity</th></tr>');
			$minval = 0;
			for($u = 1; $u<=10; $u++)
			{ 	
				$arr[$u-1] = $similarity[$u][$sec];
				$mform->addElement('html', '<tr><td>'.$u.'</td><td>'.$similarity[$u][$sec].'</td></tr>');
			}
			$mform->addElement('html', '</table>');
			print_object($arr);
			echo array_keys($arr, min($arr));
		}  
		
	}
}
	