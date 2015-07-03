<?php
include_once('system/C_Base.php');
// 
//

class C_Closed extends C_Base
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
			
			$this->claims = getClosedClaim($_SESSION['id_dep']);
	}
	
	//	
	//	
	protected function OnOutput()
	{
            $vars = array('claim' => $this->claims);
            $this->content = $this->Template('application/views/claims/closed.php', $vars);
            parent::OnOutput();
	}	
}
