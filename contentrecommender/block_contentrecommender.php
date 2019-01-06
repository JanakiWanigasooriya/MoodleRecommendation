<?php
class block_contentrecommender extends block_base {
    public function init() {
        $this->title = get_string('contentrecommender', 'block_contentrecommender');
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
			$url = new moodle_url('/blocks/contentrecommender/initialize.php', array('blockid' => $this->instance->id, 'courseid' => $COURSE->id));
			$text .= html_writer::link($url, "Initialize Learning Path");
			$text .= html_writer::end_tag('li') . ' ';
			
			$text .= html_writer::start_tag('li');
			$url = new moodle_url('/blocks/contentrecommender/similarityCalc.php', array('blockid' => $this->instance->id, 'courseid' => $COURSE->id));
			$text .= html_writer::link($url, "Calculate Similarities");
			$text .= html_writer::end_tag('li') . ' ';
		
			$text .= html_writer::start_tag('li');
			$url = new moodle_url('/blocks/contentrecommender/predict.php', array('blockid' => $this->instance->id, 'courseid' => $COURSE->id));
			$text .= html_writer::link($url, "predict Recommended Learning Path");
			$text .= html_writer::end_tag('li') . ' ';
		
		$text .= html_writer::end_tag('ul');
	
		$this->content->text = $text;
        return $this->content;
    }
}
