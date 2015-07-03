<?php
include_once('system/C_Base1.php');
// 
//

class C_Enter extends C_Base1
{
	 protected $active;
	 protected $id;
	 protected $bemorInfo;
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
            $this->title = '�������� �����';    
			
	}
	
	//
	// Ð’Ð¸Ñ€Ñ‚ÑƒÐ°Ð»ÑŒÐ½Ñ‹Ð¹ Ð³ÐµÐ½ÐµÑ€Ð°Ñ‚Ð¾Ñ€ HTML.
	//	
	protected function OnOutput()
	{
            $vars = array();
            $this->content = $this->Template('application/views/welcome.php', $vars);
            parent::OnOutput();
	}	
}
