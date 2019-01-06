<?php
require_once('../../config.php');
require_once("{$CFG->libdir}/formslib.php");

class initialize_form extends moodleform {
 
    function definition() {
 
		global $DB; // declare this if within a function
        $mform =& $this->_form;
		$users = $DB->get_fieldset_select('user', 'username', null);
		
		$myselect = $mform->addElement('select', 'selectedIndex', 'Select UserName/s : ', $users);
		$myselect->setMultiple(true);

		$this->add_action_buttons(true, 'Initialize');
	}
}