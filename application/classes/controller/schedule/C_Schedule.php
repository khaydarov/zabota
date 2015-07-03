<?php
include_once('system/C_Base.php');
// 
//

class C_Schedule extends C_Base
{
	
	protected $id;
	protected $schedule;
	protected $date;

	//
	//
	function __construct($date = '')
	{		
		$this->date = $date;
	}
	
	//
	//
	protected function OnInput()
	{            
            parent::OnInput();
            $this->title = 'Распорядок дня';    

            $this->schedule = getSchedule($this->date);
			
	}
	
	//
	// Ãâ€™ÃÂ¸Ã‘â‚¬Ã‘â€šÃ‘Æ’ÃÂ°ÃÂ»Ã‘Å’ÃÂ½Ã‘â€¹ÃÂ¹ ÃÂ³ÃÂµÃÂ½ÃÂµÃ‘â‚¬ÃÂ°Ã‘â€šÃÂ¾Ã‘â‚¬ HTML.
	//	
	protected function OnOutput()
	{
            $vars = array('schedule' => $this->schedule);
            $this->content = $this->Template('application/views/schedule/schedule.php', $vars);
            parent::OnOutput();
	}	
}
