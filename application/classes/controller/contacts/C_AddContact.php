<?php
include_once('system/C_Base.php');
// 
//

class C_AddContact extends C_Base
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
            $this->content = $this->Template('application/views/contacts/addcontact.php', $vars);
            parent::OnOutput();
	}	
}
