<?php
include_once('system/C_Base.php');
// 
//

class C_EditContact extends C_Base
{
	 protected $active;
	 protected $id;
	 protected $contact;
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

            $this->contact = getContact($_GET['id']);   
			
	}
	
	//
	// Ãâ€™ÃÂ¸Ã‘â‚¬Ã‘â€šÃ‘Æ’ÃÂ°ÃÂ»Ã‘Å’ÃÂ½Ã‘â€¹ÃÂ¹ ÃÂ³ÃÂµÃÂ½ÃÂµÃ‘â‚¬ÃÂ°Ã‘â€šÃÂ¾Ã‘â‚¬ HTML.
	//	
	protected function OnOutput()
	{
            $vars = array('contact' => $this->contact);
            $this->content = $this->Template('application/views/contacts/editcontact.php', $vars);
            parent::OnOutput();
	}	
}
