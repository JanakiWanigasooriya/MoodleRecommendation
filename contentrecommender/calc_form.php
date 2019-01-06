<?php
require_once('../../config.php');
require_once("{$CFG->libdir}/formslib.php");

class calc_form extends moodleform {
 
    function definition() {
 
		global $DB; // declare this if within a function
        $mform =& $this->_form;
		$users = $DB->get_fieldset_select('user', 'id', null);
		
		$myselect = $mform->addElement('select', 'selectedIndex', 'Select new UserId to calculate similarity : ', $users);
		//$myselect->setMultiple(true);

		$this->add_action_buttons(true, 'find similar users');
	}
}