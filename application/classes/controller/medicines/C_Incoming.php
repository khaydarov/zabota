<?php
include_once('system/C_Base.php');
// 
//

class C_Incoming extends C_Base
{
	public $medicine_name;
	public $med_id;
	public $incomings;
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
            $this->med_id = $_GET['id'];
            $this->medicine_name = getMedicineNameById($this->med_id);
            $this->incomings = Incomings($this->med_id);

	}
	
	//
	// Ãâ€™ÃÂ¸Ã‘â‚¬Ã‘â€šÃ‘Æ’ÃÂ°ÃÂ»Ã‘Å’ÃÂ½Ã‘â€¹ÃÂ¹ ÃÂ³ÃÂµÃÂ½ÃÂµÃ‘â‚¬ÃÂ°Ã‘â€šÃÂ¾Ã‘â‚¬ HTML.
	//	
	protected function OnOutput()
	{
            $vars = array('medicine' => $this->medicine_name, 'incomings' => $this->incomings);
            $this->content = $this->Template('application/views/medicines/incoming.php', $vars);
            parent::OnOutput();
	}	
}
