<?php
include_once('system/C_Base.php');
// 
//

class C_MyFiles extends C_Base
{
	 protected $active;
	 protected $id;
	 protected $allfiles;
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
            $this->title = 'Список контактов';    

            $this->allfiles = getFilesFromCat($_GET['id']);
			
	}
	
	//
	// Ãâ€™ÃÂ¸Ã‘â‚¬Ã‘â€šÃ‘Æ’ÃÂ°ÃÂ»Ã‘Å’ÃÂ½Ã‘â€¹ÃÂ¹ ÃÂ³ÃÂµÃÂ½ÃÂµÃ‘â‚¬ÃÂ°Ã‘â€šÃÂ¾Ã‘â‚¬ HTML.
	//	
	protected function OnOutput()
	{
            $vars = array('files' => $this->allfiles);
            $this->content = $this->Template('application/views/files/viewcat.php', $vars);
            parent::OnOutput();
	}	
}
