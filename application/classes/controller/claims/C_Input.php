<?php
include_once('system/C_Base.php');
// 
//

class C_Input extends C_Base
{
	 protected $active;
	 protected $id;
	 protected $claims;
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
            $this->title = 'Входящие';    
			
			$this->claims = getInputClaim($_SESSION['uid']);
	}
	
	//	
	//	
	protected function OnOutput()
	{
            $vars = array('claim' => $this->claims);
            $this->content = $this->Template('application/views/claims/input.php', $vars);
            parent::OnOutput();
	}	
}
