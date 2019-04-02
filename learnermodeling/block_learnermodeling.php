<?php
class block_learnermodeling extends block_base {
    public function init() {
        $this->title = get_string('learnermodeling', 'block_learnermodeling');
    }
    // The PHP tag and the curly bracket for the class definition 
    // will only be closed after there is another function added in the next section.
	
	public function get_content() {
        global $COURSE;
        if ($this->content) {
            return $this->content;
        }

        $this->content = new stdClass();
		$this->content->footer = '';
        $this->content->text   = '';
		
		$text = html_writer::start_tag('ul');
       
			$text .= html_writer::start_tag('li');
			$url = new moodle_url('/blocks/learnermodeling/view_Q.php', array('blockid' => $this->instance->id, 'courseid' => $COURSE->id));
			$text .= html_writer::link($url, "VARK Questionnaire");
			$text .= html_writer::end_tag('li') . ' ';
			
			$text .= html_writer::start_tag('li');
			$url = new moodle_url('/blocks/learnermodeling/view_automatic.php', array('blockid' => $this->instance->id, 'courseid' => $COURSE->id));
			$text .= html_writer::link($url, "Build Model- Automatic LM");
			$text .= html_writer::end_tag('li') . ' ';
		
			$text .= html_writer::start_tag('li');
			$url = new moodle_url('/blocks/learnermodeling/view_Classify.php', array('blockid' => $this->instance->id, 'courseid' => $COURSE->id));
			$text .= html_writer::link($url, "Classify Students");
			$text .= html_writer::end_tag('li') . ' ';
		
		$text .= html_writer::end_tag('ul');
	
		$this->content->text = $text;
        return $this->content;
    }
}
