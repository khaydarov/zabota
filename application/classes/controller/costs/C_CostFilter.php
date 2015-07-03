<?php
include_once('system/C_Base.php');
// 
//

class C_CostFilter extends C_Base
{
	public $month;
	public $id_cost;
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
            $this->id_cost = $_GET['id_med'];
            $this->cost = getCostNameById($this->id_cost);
            
            $this->month = $_GET['month'];
            $this->year = $_GET['year'];
            $this->incomings = getCostIncomingsFromDate($this->id_cost, $this->month, $this->year);
            $this->expences = getCostExpencesFromDate($this->id_cost, $this->month, $this->year);

	}
	
	//
	// Ãâ€™ÃÂ¸Ã‘â‚¬Ã‘â€šÃ‘Æ’ÃÂ°ÃÂ»Ã‘Å’ÃÂ½Ã‘â€¹ÃÂ¹ ÃÂ³ÃÂµÃÂ½ÃÂµÃ‘â‚¬ÃÂ°Ã‘â€šÃÂ¾Ã‘â‚¬ HTML.
	//	
	protected function OnOutput()
	{
            $vars = array('cost' => $this->cost, 'month' => $this->month, 
            				'year' => $this->year, 'incomings' => $this->incomings,
            				'expences' => $this->expences);

            $this->content = $this->Template('application/views/costs/filter.php', $vars);
            parent::OnOutput();
	}	
}
