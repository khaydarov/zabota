<?php
include_once('system/C_Base.php');
// 
//
class C_Change extends C_Base
{
	 protected $active;
	 protected $id;
	 protected $userinfo;
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
            $this->title = 'Редактировать профиль';    

            $this->userinfo = getUserInfo($_SESSION['uid']);
            $id_user = $_SESSION['uid'];
	}
	
	//
	// Ãâ€™ÃÂ¸Ã‘â‚¬Ã‘â€šÃ‘Æ’ÃÂ°ÃÂ»Ã‘Å’ÃÂ½Ã‘â€¹ÃÂ¹ ÃÂ³ÃÂµÃÂ½ÃÂµÃ‘â‚¬ÃÂ°Ã‘â€šÃÂ¾Ã‘â‚¬ HTML.
	//	
	protected function OnOutput()
	{
            $vars = array('user' => $this->userinfo);
            $this->content = $this->Template('application/views/change.php', $vars);
            parent::OnOutput();
	}	
}
