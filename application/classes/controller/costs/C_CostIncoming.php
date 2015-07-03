<?php
include_once('system/C_Base.php');
// 
//

class C_CostIncoming extends C_Base
{
	public $cost_name;
	public $costs_id;
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
            $this->costs_id = $_GET['id'];
            $this->cost_name = getCostNameById($this->costs_id);
            $this->incomings = CIncomings($this->costs_id);

	}
	
	//
	// Ãâ€™ÃÂ¸Ã‘â‚¬Ã‘â€šÃ‘Æ’ÃÂ°ÃÂ»Ã‘Å’ÃÂ½Ã‘â€¹ÃÂ¹ ÃÂ³ÃÂµÃÂ½ÃÂµÃ‘â‚¬ÃÂ°Ã‘â€šÃÂ¾Ã‘â‚¬ HTML.
	//	
	protected function OnOutput()
	{
            $vars = array('costs' => $this->cost_name, 'incomings' => $this->incomings);
            $this->content = $this->Template('application/views/costs/incomings.php', $vars);
            parent::OnOutput();
	}	
}
