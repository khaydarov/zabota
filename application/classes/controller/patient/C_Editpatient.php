<?php
include_once('system/C_Base.php');
// 
//

class C_Editpatient extends C_Base
{
	protected $active;
	protected $id;
	protected $patient;
	protected $medicines;
	protected $costs;

	//Procedure
	protected $procedure;
	protected $place;
	protected $doctor;

	//Schedule
	protected $schedule;
	

	//
	function __construct()
	{		
	}
	
	//
	//
	protected function OnInput()
	{            
            parent::OnInput();
            $this->title = 'Информация о персонале'; 

            $this->patient = getPatientInfoById($_GET['id']);  
            $this->medicines = getAllMedicines(); 
            $this->costs = getAllCosts();

            $this->procedure = getAllProcedures();
            $this->place = getAllPlaces();
            $this->doctor = getAllPersonals();

            $this->schedule = getScheduleOfPatient($_GET['id']);

			
	}
	
	//
	// Ãâ€™ÃÂ¸Ã‘â‚¬Ã‘â€šÃ‘Æ’ÃÂ°ÃÂ»Ã‘Å’ÃÂ½Ã‘â€¹ÃÂ¹ ÃÂ³ÃÂµÃÂ½ÃÂµÃ‘â‚¬ÃÂ°Ã‘â€šÃÂ¾Ã‘â‚¬ HTML.
	//	
	protected function OnOutput()
	{
            $vars = array('patient' => $this->patient,
            				'medicines' => $this->medicines,
            				'costs' => $this->costs,
            				'procedure' => $this->procedure,
            				'place' => $this->place,
            				'doctor' => $this->doctor,
            				'schedule' => $this->schedule,
            );

            $this->content = $this->Template('application/views/patients/editpatient.php', $vars);
            parent::OnOutput();
	}	
}
