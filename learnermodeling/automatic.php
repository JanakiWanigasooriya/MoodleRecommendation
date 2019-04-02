<?php
require_once('../../config.php');
require_once("{$CFG->libdir}/formslib.php");

class automatic extends moodleform {
 
    function definition() {
 
		global $DB; // declare this if within a function
		//$userId = $_SESSION['userId'];
        $mform =& $this->_form;
		
		$mform->addElement('html', 'Learner Model building calculations started..</br></br>'); 
		$mform->addElement('html', 'Preparing Feature 1: view/visits</br>'); 
		
		$visualVisits = $DB->get_records_sql('SELECT count(*) as visualCount FROM mdl_vark_visits WHERE sectionId=1');
		$AuditoryVisits = $DB->get_records_sql('SELECT count(*) as auditorycount FROM mdl_vark_visits WHERE sectionId=2');
		$ReadingVisits = $DB->get_records_sql('SELECT count(*) as readingcount FROM mdl_vark_visits WHERE sectionId=3');
		$KinestheticVisits = $DB->get_records_sql('SELECT count(*) as kenescount FROM mdl_vark_visits WHERE sectionId=4') ;
		
		
		foreach($visualVisits as $record) {
			$vcount = $record->visualcount;
			$mform->addElement('html', '<strong>Total-F1-Visual = '.$vcount.'</strong></br>'); 
		}
		foreach($AuditoryVisits as $arecord) {
			$acount = $arecord->auditorycount;
			$mform->addElement('html', '<strong>Total-F1-Auditory = '.$acount.'</strong></br>'); 
		}
		foreach($ReadingVisits as $rrecord) {
			$rcount = $rrecord->readingcount;
			$mform->addElement('html', '<strong>Total-F1-Reading/writing = '.$rcount.'</strong></br>'); 
		}
		foreach($KinestheticVisits as $krecord) {
			$kcount = $krecord->kenescount;
			$mform->addElement('html', '<strong>Total-F1-Kinesthetic = '.$kcount.'</strong></br></br>'); 
		}
		//Mean
		$meanF1V =$vcount/20;
		$meanF1A=$acount/20;
		$meanF1R=$rcount/20;
		$meanF1K =$kcount/20;
		
		$mform->addElement('html', '<strong>Mean-F1-Visual = '.$meanF1V.'</strong></br>'); 
		$mform->addElement('html', '<strong>Mean-F1-Auditory = '.$meanF1A.'</strong></br>'); 
		$mform->addElement('html', '<strong>Mean-F1-Reading/writing = '.$meanF1R.'</strong></br>'); 
		$mform->addElement('html', '<strong>Mean-F1-Kinesthetic = '.$meanF1K.'</strong></br></br>'); 
		
		//SD
		$visualVisitsByLearner = $DB->get_records_sql('SELECT userId,count(*) as f1visual FROM mdl_vark_visits WHERE sectionId=1 GROUP BY userId');
		//print_object($visualVisitsByLearner); 
		$mform->addElement('html','user visits/views-visual :'); 
		$totv = 0;
		foreach($visualVisitsByLearner as $record) {
			$x = $record->f1visual;
			$mform->addElement('html', '<strong>'.$x.',</strong>'); 
			$totv = $totv + ($x-$meanF1V) * ($x-$meanF1V); 
		} 
		$visualSDF1 = sqrt($totv/20);
		$mform->addElement('html','</br>'); 
		
		$auditoryVisitsByLearner = $DB->get_records_sql('SELECT userId,count(*) as f1auditory FROM mdl_vark_visits WHERE sectionId=2 GROUP BY userId');
		//print_object($auditoryVisitsByLearner); 
		$mform->addElement('html','user visits/views-auditory :'); 
		$tota = 0;
		foreach($auditoryVisitsByLearner as $record) {
			$x = $record->f1auditory;
			$mform->addElement('html', '<strong>'.$x.',</strong>'); 
			$tota = $tota + ($x-$meanF1A) * ($x-$meanF1A); 
		} 
		$auditorySDF1 = sqrt($tota/20);
		$mform->addElement('html','</br>'); 
		
		$ReadingVisitsByLearner = $DB->get_records_sql('SELECT userId,count(*) as f1reading FROM mdl_vark_visits WHERE sectionId=3 GROUP BY userId');
		//print_object($auditoryVisitsByLearner); 
		$mform->addElement('html','user visits/views-Reading/writing :');
		$totr = 0;		
		foreach($ReadingVisitsByLearner as $record) {
			$x = $record->f1reading;
			$mform->addElement('html', '<strong>'.$x.',</strong>'); 
			$totr = $totr + ($x-$meanF1R) * ($x-$meanF1R); 
		} 
		$readingSDF1 = sqrt($totr/20);
		$mform->addElement('html','</br>'); 
		
		$kinestheticVisitsByLearner = $DB->get_records_sql('SELECT userId,count(*) as f1kines FROM mdl_vark_visits WHERE sectionId=4 GROUP BY userId');
		//print_object($auditoryVisitsByLearner); 
		$mform->addElement('html','user visits/views-Kinesthetic :'); 
		$totk = 0;
		foreach($kinestheticVisitsByLearner as $record) {
			$x = $record->f1kines;
			$mform->addElement('html', '<strong>'.$x.',</strong>'); 
			$totk = $totk + ($x-$meanF1K) * ($x-$meanF1K); 
		} 
		$kinesSDF1 = sqrt($totk/20);
		$mform->addElement('html','</br></br>'); 
		
		$mform->addElement('html','Visual-F1-SD ='.$visualSDF1.'</br>'); 
		$mform->addElement('html','Auditory-F1-SD ='.$auditorySDF1.'</br>'); 
		$mform->addElement('html','Reading/Wring-F1-SD ='.$readingSDF1.'</br>'); 
		$mform->addElement('html','Kinesthetic-F1-SD ='.$kinesSDF1.'</br></br>'); 
		
		////////////////////////////////////////////////////
		$mform->addElement('html', 'preparing Feature 2: module completes</br>'); 
		$completes = $DB->get_records_sql('SELECT SUM(visual) as visualcomplete, SUM(auditory) as auditorycomplete, SUM(reading) as readingcomplete, SUM(kinesthetic) as kinestheticcomplete FROM mdl_vark_completes');
		foreach($completes as $record) {
			$vcountf2 = $record->visualcomplete;
			$acountf2= $record->auditorycomplete;
			$rcountf2 = $record->readingcomplete;
			$kcountf2 = $record->kinestheticcomplete;
			$mform->addElement('html', '<strong>Total-F2-Visual = '.$vcountf2.'</strong></br>'); 
			$mform->addElement('html', '<strong>Total-F2-auditory = '.$acountf2.'</strong></br>'); 
			$mform->addElement('html', '<strong>Total-F2-Reading/writing = '.$rcountf2.'</strong></br>'); 
			$mform->addElement('html', '<strong>Total-F2-kinesthetic = '.$kcountf2.'</strong></br></br>'); 
		}
		
		//Mean
		$meanF2V =$vcountf2/20;
		$meanF2A=$acountf2/20;
		$meanF2R=$rcountf2/20;
		$meanF2K =$kcountf2/20;
		
		$mform->addElement('html', '<strong>Mean-F2-Visual = '.$meanF2V.'</strong></br>'); 
		$mform->addElement('html', '<strong>Mean-F2-Auditory = '.$meanF2A.'</strong></br>'); 
		$mform->addElement('html', '<strong>Mean-F2-Reading/writing = '.$meanF2R.'</strong></br>'); 
		$mform->addElement('html', '<strong>Mean-F2-Kinesthetic = '.$meanF2K.'</strong></br></br>'); 
		
		//SD
		$visualcompletesByLearner = $DB->get_records_sql('SELECT userId,visual FROM mdl_vark_completes');
		$mform->addElement('html','user completes-visual :'); 
		$totvc = 0;
		foreach($visualcompletesByLearner as $record) {
			$x = $record->visual;
			$mform->addElement('html', '<strong>'.$x.',</strong>'); 
			$totvc = $totvc + ($x-$meanF2V) * ($x-$meanF2V); 
		} 
		$visualSDF2 = sqrt($totvc/20);
		$mform->addElement('html','</br>'); 
		
		$auditorycompletesByLearner = $DB->get_records_sql('SELECT userId,auditory FROM mdl_vark_completes');
		$mform->addElement('html','user completes-auditory :'); 
		$totac = 0;
		foreach($auditorycompletesByLearner as $record) {
			$x = $record->auditory;
			$mform->addElement('html', '<strong>'.$x.',</strong>'); 
			$totac = $totac + ($x-$meanF2A) * ($x-$meanF2A); 
		} 
		$auditorySDF2 = sqrt($totac/20);
		$mform->addElement('html','</br>'); 
		
		$ReadingcompletesByLearner = $DB->get_records_sql('SELECT userId,reading FROM mdl_vark_completes');
		$mform->addElement('html','user completes-Reading/writing :'); 
		$totrc = 0;
		foreach($ReadingcompletesByLearner as $record) {
			$x = $record->reading;
			$mform->addElement('html', '<strong>'.$x.',</strong>'); 
			$totrc = $totrc + ($x-$meanF2R) * ($x-$meanF2R); 
		} 
		$readingSDF2 = sqrt($totrc/20);
		$mform->addElement('html','</br>'); 
		
		$KinescompletesByLearner = $DB->get_records_sql('SELECT userId,kinesthetic FROM mdl_vark_completes');
		$mform->addElement('html','user completes-Kinesthetic :'); 
		$totkc = 0;
		foreach($KinescompletesByLearner as $record) {
			$x = $record->kinesthetic;
			$mform->addElement('html', '<strong>'.$x.',</strong>'); 
			$totkc = $totkc + ($x-$meanF2K) * ($x-$meanF2K); 
		} 
		$kinesSDF2 = sqrt($totkc/20);
		$mform->addElement('html','</br></br>'); 
		
		$mform->addElement('html','Visual-F2-SD ='.$visualSDF2.'</br>'); 
		$mform->addElement('html','Auditory-F2-SD ='.$auditorySDF2.'</br>'); 
		$mform->addElement('html','Reading/Wring-F2-SD ='.$readingSDF2.'</br>'); 
		$mform->addElement('html','Kinesthetic-F2-SD ='.$kinesSDF2.'</br></br>'); 
		
		//insert mean, sd values to database
		$record1 = new stdClass();
		$record1->id = 1;
		$record1->parameter = "f1";
		$record1->dimension = 1 + 0;
		$record1->mean =$meanF1V +0.0;
		$record1->standard_d =$visualSDF1 + 0.0;
		$record1->total = $vcount + 0;

		$record2 = new stdClass();
		$record2->id = 2;
		$record2->parameter = 'f1';
		$record2->dimension = 2;
		$record2->mean =$meanF1A;
		$record2->standard_d =$auditorySDF1;
		$record2->total = $acount;

		$record3 = new stdClass();
		$record3->id = 3;
		$record3->parameter = 'f1';
		$record3->dimension = 3;
		$record3->mean =$meanF1R;
		$record3->standard_d =$readingSDF2;
		$record3->total = $rcount;

		$record4 = new stdClass();
		$record4->id = 4;
		$record4->parameter = 'f1';
		$record4->dimension = 4;
		$record4->mean =$meanF1K;
		$record4->standard_d =$kinesSDF1;
		$record4->total = $kcount;

		// Insert one record at a time.
		//$lastinsertid1 = $DB->insert_record('vark_pdf-params', $record1);
		//$lastinsertid2 = $DB->insert_record('vark_pdf-params', $record2);
		//$lastinsertid3 = $DB->insert_record('vark_pdf-params', $record3);
		//$lastinsertid4 = $DB->insert_record('vark_pdf-params', $record4);

		$mform->addElement('html', 'class conditional mean , standard deviation calculations done! <br> Learner Model building Results saved to db.</br></br>'); 


		
	}	
}
?>