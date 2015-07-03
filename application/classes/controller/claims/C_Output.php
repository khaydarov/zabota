<?php
include_once('system/C_Base.php');
// 
//

class C_Output extends C_Base
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
            $this->title = 'Исходящие';    
			
			$this->claims = getOutputClaim($_SESSION['uid']);
	}
	
	//	
	//	
	protected function OnOutput()
	{
            $vars = array('claim' => $this->claims);
            $this->content = $this->Template('application/views/claims/output.php', $vars);
            parent::OnOutput();
	}	
}
