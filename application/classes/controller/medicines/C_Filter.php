<?php
include_once('system/C_Base.php');
// 
//

class C_Filter extends C_Base
{
	public $month;
	public $med_id;
	public $year;
	public $incomings;
	public $expences;
	public $medicine;
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
            $this->med_id = $_GET['id_med'];
            $this->medicine = getMedicineNameById($this->med_id);
            
            $this->month = $_GET['month'];
            $this->year = $_GET['year'];
            $this->incomings = getIncomingsFromDate($this->med_id, $this->month, $this->year);
            $this->expences = getExpencesFromDate($this->med_id, $this->month, $this->year);

	}
	
	//
	// Ãâ€™ÃÂ¸Ã‘â‚¬Ã‘â€šÃ‘Æ’ÃÂ°ÃÂ»Ã‘Å’ÃÂ½Ã‘â€¹ÃÂ¹ ÃÂ³ÃÂµÃÂ½ÃÂµÃ‘â‚¬ÃÂ°Ã‘â€šÃÂ¾Ã‘â‚¬ HTML.
	//	
	protected function OnOutput()
	{
            $vars = array('medicine' => $this->medicine, 'month' => $this->month, 
            				'year' => $this->year, 'incomings' => $this->incomings,
            				'expences' => $this->expences);

            $this->content = $this->Template('application/views/medicines/filter.php', $vars);
            parent::OnOutput();
	}	
}
