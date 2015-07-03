<?php
include_once('system/C_Base.php');
// 
//

class C_Editpersonal extends C_Base
{
	 protected $active;
	 protected $id;
	 protected $personal;
	 protected $schedule;
	
	//Procudere 
	protected $procedure;
	protected $place;

	//Patients
	protected $patietns;


	function __construct()
	{		
	}
	
	//
	//
	protected function OnInput()
	{            
            parent::OnInput();
            $this->title = 'Информация о персонале'; 

            $this->personal = getPersonalInfoById($_GET['id']);   
            $this->schedule = getScheduleOfDoctor($_GET['id']);

            //Getting patients
            $this->patients = getAllPatients();

            //Getting procedute and place
            $this->procedure = getAllProcedures();
            $this->place = getAllPlaces();
			
	}
	
	//
	// Ãâ€™ÃÂ¸Ã‘â‚¬Ã‘â€šÃ‘Æ’ÃÂ°ÃÂ»Ã‘Å’ÃÂ½Ã‘â€¹ÃÂ¹ ÃÂ³ÃÂµÃÂ½ÃÂµÃ‘â‚¬ÃÂ°Ã‘â€šÃÂ¾Ã‘â‚¬ HTML.
	//	
	protected function OnOutput()
	{
            $vars = array('personal' => $this->personal, 
            				'schedule' => $this->schedule,
            				'patients' => $this->patients,
            				'procedure' => $this->procedure,
            				'place' => $this->place);

            $this->content = $this->Template('application/views/personal/editpersonal.php', $vars);
            parent::OnOutput();
	}	
}
