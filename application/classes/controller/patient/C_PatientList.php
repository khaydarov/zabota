<?php
include_once('system/C_Base.php');
// 
//

class C_PatientList extends C_Base
{
	 protected $active;
	 protected $id;
	 protected $allpatients;
	//
	//
	function __construct()
	{		
	}
	
	//
	//
	protected function OnInput()
	{            
            parent::OnInput();
            $this->title = 'Список контактов';    

            $this->allpatients = getAllpatients();
			
	}
	
	//
	// Ãâ€™ÃÂ¸Ã‘â‚¬Ã‘â€šÃ‘Æ’ÃÂ°ÃÂ»Ã‘Å’ÃÂ½Ã‘â€¹ÃÂ¹ ÃÂ³ÃÂµÃÂ½ÃÂµÃ‘â‚¬ÃÂ°Ã‘â€šÃÂ¾Ã‘â‚¬ HTML.
	//	
	protected function OnOutput()
	{
            $vars = array('patients' => $this->allpatients, 'role' => $_SESSION['role']);
            $this->content = $this->Template('application/views/patients/allpatients.php', $vars);
            parent::OnOutput();
	}	
}
