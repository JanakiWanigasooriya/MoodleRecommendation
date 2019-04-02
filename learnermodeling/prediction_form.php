<?php
require_once('../../config.php');
require_once("{$CFG->libdir}/formslib.php");

class prediction_form extends moodleform {
 
    function definition() {
 
		global $DB; // declare this if within a function
		$userId = $_SESSION['userId'];
        $mform =& $this->_form;
		
		$result = $DB->get_records_sql('select * from mdl_user where id ='.$userId.'');
		$pref_result = $DB->get_records_sql('select * from mdl_vark_preference where user_id ='.$userId.'');
		//print_object($record);
		
		//mean,SD
		$pdfParamsV = $DB->get_records_sql('SELECT * FROM `mdl_vark_pdf-params` WHERE `parameter`=1 AND `dimension`=1 ');
	 	$pdfParamsA = $DB->get_records_sql('SELECT * FROM `mdl_vark_pdf-params` WHERE `parameter`=1 AND `dimension`=2 ');
		$pdfParamsR = $DB->get_records_sql('SELECT * FROM `mdl_vark_pdf-params` WHERE `parameter`=1 AND `dimension`=3 ');
		$pdfParamsK = $DB->get_records_sql('SELECT * FROM `mdl_vark_pdf-params` WHERE `parameter`=1 AND `dimension`=4 ');
		
		$pdfParamsVf2 = $DB->get_records_sql('SELECT * FROM `mdl_vark_pdf-params` WHERE `parameter`=2 AND `dimension`=1 ');
		$pdfParamsAf2 = $DB->get_records_sql('SELECT * FROM `mdl_vark_pdf-params` WHERE `parameter`=2 AND `dimension`=2 ');
		$pdfParamsRf2 = $DB->get_records_sql('SELECT * FROM `mdl_vark_pdf-params` WHERE `parameter`=2 AND `dimension`=3 ');
		$pdfParamsKf2 = $DB->get_records_sql('SELECT * FROM `mdl_vark_pdf-params` WHERE `parameter`=2 AND `dimension`=4 '); 
		
		foreach($pdfParamsV as $v) {
			$meanf1v = $v->mean;
			$SDf1v = $v->standard_d;
		}
	 	foreach($pdfParamsA as $a) {
			$meanf1a = $a->mean;
			$SDf1a = $a->standard_d;
		}
		foreach($pdfParamsR as $r) {
			$meanf1r = $r->mean;
			$SDf1r = $r->standard_d;
		}
		foreach($pdfParamsK as $k) {
			$meanf1k = $k->mean;
			$SDf1k = $k->standard_d;
		}
		///
		foreach($pdfParamsVf2 as $vf2) {
			$meanf2v = $vf2->mean;
			$SDf2v = $vf2->standard_d;
		}
		foreach($pdfParamsAf2 as $af2) {
			$meanf2a = $af2->mean;
			$SDf2a = $af2->standard_d;
		}
		foreach($pdfParamsRf2 as $rf2) {
			$meanf2r = $rf2->mean;
			$SDf2r = $rf2->standard_d;
		}
		foreach($pdfParamsKf2 as $kf2) {
			$meanf2k = $kf2->mean;
			$SDf2k = $kf2->standard_d;
		}
			 
		//////
		foreach($result as $record) {
			$id = $record->id;
			$first = $record->firstname;
			$last = $record->lastname;
			
			$mform->addElement('html', 'User ID: <strong>'.$userId.'</strong></br>');
			$mform->addElement('html', 'Student Name: <strong>'.$first.' '.$last.'</strong></br>');
		}
		
		//F1
		//get new learners visits
		$visualVisits = $DB->get_records_sql('SELECT count(*) as visualCount FROM mdl_vark_visits WHERE sectionId=1 AND userId ='.$userId.'');
		$AuditoryVisits = $DB->get_records_sql('SELECT count(*) as auditorycount FROM mdl_vark_visits WHERE sectionId=2 AND userId ='.$userId.'');
		$ReadingVisits = $DB->get_records_sql('SELECT count(*) as readingcount FROM mdl_vark_visits WHERE sectionId=3 AND userId ='.$userId.'');
		$KinestheticVisits = $DB->get_records_sql('SELECT count(*) as kenescount FROM mdl_vark_visits WHERE sectionId=4 AND userId ='.$userId.'');

		foreach($visualVisits as $record) {
			$XiVisualVisits = $record->visualcount;
			$mform->addElement('html', '<strong>F1-Visual = '.$XiVisualVisits.'</strong></br>'); 
		}
		foreach($AuditoryVisits as $arecord) {
			$XiAuditoryVisits = $arecord->auditorycount;
			$mform->addElement('html', '<strong>F1-Auditory = '.$XiAuditoryVisits.'</strong></br>'); 
		}
		foreach($ReadingVisits as $rrecord) {
			$XiReadingVisits = $rrecord->readingcount;
			$mform->addElement('html', '<strong>F1-Reading/writing = '.$XiReadingVisits.'</strong></br>'); 
		}
		foreach($KinestheticVisits as $krecord) {
			$XiKinesVisits = $krecord->kenescount;
			$mform->addElement('html', '<strong>F1-Kinesthetic = '.$XiKinesVisits.'</strong></br></br>'); 
		}
		
		//F2
		//get new learners completes
		$visualcompletes = $DB->get_records_sql('SELECT count(*) as visualCount FROM mdl_vark_completes WHERE  userId ='.$userId.'');
		$Auditorycompletes = $DB->get_records_sql('SELECT count(*) as auditorycount FROM mdl_vark_completes WHERE userId ='.$userId.'');
		$Readingcompletes = $DB->get_records_sql('SELECT count(*) as readingcount FROM mdl_vark_completes WHERE userId ='.$userId.'');
		$Kinestheticcompletes = $DB->get_records_sql('SELECT count(*) as kenescount FROM mdl_vark_completes WHERE userId ='.$userId.'');

		foreach($visualcompletes as $record) {
			$XiVisualcompletes = $record->visualcount;
			$mform->addElement('html', '<strong>F2-Visual = '.$XiVisualcompletes.'</strong></br>'); 
		}
		foreach($Auditorycompletes as $arecord) {
			$XiAuditorycompletes = $arecord->auditorycount;
			$mform->addElement('html', '<strong>F2-Auditory = '.$XiAuditorycompletes.'</strong></br>'); 
		}
		foreach($Readingcompletes as $rrecord) {
			$XiReadingcompletes = $rrecord->readingcount;
			$mform->addElement('html', '<strong>F2-Reading/writing = '.$XiReadingcompletes.'</strong></br>'); 
		}
		foreach($Kinestheticcompletes as $krecord) {
			$XiKinescompletes = $krecord->kenescount;
			$mform->addElement('html', '<strong>F2-Kinesthetic = '.$XiKinescompletes.'</strong></br></br>'); 
		}
		
		//find P(F1|dimension)
		$PF1Visual = ((1 / (sqrt(2 * 3.14159) * $SDf1v * $SDf1v)) * exp(-1*($XiVisualVisits-$meanf1v)*($XiVisualVisits-$meanf1v))/(2*$SDf1v*$SDf1v));
		$PF1Auditory = ((1 / (sqrt(2 * 3.14159) * $SDf1a * $SDf1a)) * exp(-1*($XiAuditoryVisits-$meanf1a)*($XiAuditoryVisits-$meanf1a))/(2*$SDf1a*$SDf1a));
		$PF1Reading = ((1 / (sqrt(2 * 3.14159) * $SDf1r * $SDf1r)) * exp(-1*($XiReadingVisits-$meanf1r)*($XiReadingVisits-$meanf1r))/(2*$SDf1r*$SDf1r));
		$PF1Kines = ((1 / (sqrt(2 * 3.14159) * $SDf1k * $SDf1k)) * exp(-1*($XiKinesVisits-$meanf1k)*($XiKinesVisits-$meanf1k))/(2*$SDf1k*$SDf1k));

		////find P(F2|dimension)
		$PF2Visual = ((1 / (sqrt(2 * 3.14159) * $SDf2v * $SDf2v)) * exp(-1*($XiVisualcompletes-$meanf1v)*($XiVisualcompletes-$meanf2v))/(2*$SDf2v*$SDf2v));
		$PF2Auditory = ((1 / (sqrt(2 * 3.14159) * $SDf2a * $SDf2a)) * exp(-1*($XiAuditorycompletes-$meanf2a)*($XiAuditorycompletes-$meanf2a))/(2*$SDf2a*$SDf2a));
		$PF2Reading = ((1 / (sqrt(2 * 3.14159) * $SDf2r * $SDf2r)) * exp(-1*($XiReadingcompletes-$meanf2r)*($XiReadingcompletes-$meanf2r))/(2*$SDf2r*$SDf2r));
		$PF2Kines = ((1 / (sqrt(2 * 3.14159) * $SDf2k * $SDf2k)) * exp(-1*($XiKinescompletes-$meanf2k)*($XiKinescompletes-$meanf2k))/(2*$SDf2k*$SDf2k));

		$vProb = 0.25* $PF1Visual * $PF2Visual + 0.0000;
		$aProb = 0.25 * $PF1Auditory * $PF2Auditory;
		$rProb = 0.25 * $PF1Reading * $PF2Reading;
		$kProb = 0.25* $PF1Kines * $PF2Kines;


		$mform->addElement('html', '</br>');
		$mform->addElement('html', '<table style="width:100%">');
		$mform->addElement('html', '<tr><th>VARK Modal</th><th>Probability</th></tr>');
		$mform->addElement('html', '<tr><td>Visual</td><td>'.$vProb.'</td></tr>');
		$mform->addElement('html', '<tr><td>Auditory</td><td>'.$aProb.'</td></tr>');
		$mform->addElement('html', '<tr><td>Reading/Writing</td><td>'.$rProb.'</td></tr>');
		$mform->addElement('html', '<tr><td>Kinesthetic</td><td>'.$kProb.'</td></tr>');
		$mform->addElement('html', '</table>');
		
		$max = max($vProb,$aProb,$rProb,$kProb);
		if($max == $vProb){
			$dimension = "Visual";
		}
		else if($max == $aProb){
			$dimension = "Auditory";
		}
		else if($max == $rProb){
			$dimension = "Reading/Writing";
		}
		else if($max == $kProb){
			$dimension = "Kinesthetic";
		}
		$mform->addElement('html', '<br>Argmax P(ci)*P(x|ci) = '.$max.'</br>');
		$mform->addElement('html', '<strong>Prefered Learning Model: <h1>'.$dimension.'</h1></strong>');
		//write code to save to database
		
		//following part is reading from the db
		/* foreach($pref_result as $record) {
			$v = $record->v_prob;
			$a = $record->a_prob;
			$r = $record->r_prob;
			$k = $record->k_prob;

			$dimID = $record->pref_dimension;
			$pref_dim = $DB->get_records_sql('select * from mdl_vark_dimension where dimension_id ='.$dimID.'');
			//print_object($pref_dim); 
			
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
			$mform->addElement('html', '</br>');
			$mform->addElement('html', '<strong>Prefered Learning Model: <h1>'.$dimension.'</h1></strong>');
		}
		} */
	}
}