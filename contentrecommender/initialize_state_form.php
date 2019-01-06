<?php
require_once('../../config.php');
require_once("{$CFG->libdir}/formslib.php");

class initialize_state_form extends moodleform {
 
    function definition() {
 
		global $DB; // declare this if within a function
		$userIds = $_SESSION['userIds'];
        $mform =& $this->_form;
		
		 foreach($userIds as $userId) 
		 {
			 $result = $DB->get_records_sql('select * from mdl_user where id ='.$userId.'');
			 $dimension = $DB->get_records_sql('select d.dimension_id,d.dimension_text from mdl_vark_preference AS p inner join mdl_vark_dimension AS d ON p.pref_dimension = d.dimension_id where user_id ='.$userId.'');
			 foreach($result as $user) 
			 {
				$id = $user->id;
				$first = $user->firstname;
				$last = $user->lastname;
			
				$mform->addElement('html', '<h3>User ID: <strong>'.$id.'</strong></br>');
				$mform->addElement('html', 'Student Name: <strong>'.$first.' '.$last.'</strong></br></h3>'); 
				
				foreach($dimension as $rec) 
				{
					$dimension = $rec->dimension_text;
					$dimensionId = $rec->dimension_id;
					$mform->addElement('html', '<strong>Prefered Learning Model: '.$dimension.'</strong>');
				
					$module = $DB->get_records_sql('select * from mdl_vark_module_instance WHERE dimension='.$dimensionId.'');
					//print_object($module);
					 foreach($module as $mod)
					 {	$c = $mod->courseid;
						$s = $mod->sectionid;
						$m = $mod->moduleid;
						$i =$mod->instance;
						
						if($s ==1)
						{$sec1 = 'CourseId: '.$c.' SectionId: '.$s.' ModuleID: '.$m.' Instance: '.$i.'<br>';}
						else if($s ==2)
						{$sec2 = 'CourseId: '.$c.' SectionId: '.$s.' ModuleID: '.$m.' Instance: '.$i.'<br>';}
						else if($s ==3)
						{$sec3 = 'CourseId: '.$c.' SectionId: '.$s.' ModuleID: '.$m.' Instance: '.$i.'<br>';}
						else if($s ==4)
						{$sec4 = 'CourseId: '.$c.' SectionId: '.$s.' ModuleID: '.$m.' Instance: '.$i.'<br>';}					
					} 
					$mform->addElement('html', '<br><strong>Section: 1</strong></br>'.$sec1);
					$mform->addElement('html', '<strong>Section: 2</strong></br>'.$sec2);
					$mform->addElement('html', '<strong>Section: 3</strong></br>'.$sec3);
					$mform->addElement('html', '<strong>Section: 4</strong></br>'.$sec4);
				}
			}							 
		}	
		$mform->addElement('html', '<br><h5>succesfully assigned course modules to new learners!!!!</h5>');
		$this->add_action_buttons(false, 'OK');
	} 
}
