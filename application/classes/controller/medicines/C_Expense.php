<?php
include_once('system/C_Base.php');
// 
//

class C_Expense extends C_Base
{
	protected $med_id;
	protected $medicine_name;
	protected $expences;
	protected $patients;
	//
	function __construct()
	{		
	}
	
	//
	//
	protected function OnInput()
	{            
            parent::OnInput();
            $this->med_id = $_GET['id'];
            $this->medicine_name = getMedicineNameById($this->med_id);
            $this->expences = Expences($this->med_id);
            $this->patients = getAllpatients();

	}
	
	//
	// Ãâ€™ÃÂ¸Ã‘â‚¬Ã‘â€šÃ‘Æ’ÃÂ°ÃÂ»Ã‘Å’ÃÂ½Ã‘â€¹ÃÂ¹ ÃÂ³ÃÂµÃÂ½ÃÂµÃ‘â‚¬ÃÂ°Ã‘â€šÃÂ¾Ã‘â‚¬ HTML.
	//	
	protected function OnOutput()
	{
            $vars = array('medicine' => $this->medicine_name, 'expences' => $this->expences, 'patients'=>$this->patients);
            $this->content = $this->Template('application/views/medicines/expences.php', $vars);
            parent::OnOutput();
	}	
}
