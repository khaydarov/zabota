<?php
include_once('system/C_Base.php');
// 
//

class C_AddFile extends C_Base
{
	 protected $active;
	 protected $id;
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
			
			if (isset($_POST['submit'])) {
				$name = $_FILES['file']['name'];
				$size = $_FILES['file']['size'];
				$id_cat = $_GET['id'];
				

				if (addfile($id_cat, $name, $size)) {
					move_uploaded_file($_FILES["file"]['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/social/uploads/files/".$_FILES["file"]["name"]);
					header("location: index.php?option=viewcat&id=$id_cat");
				}
			}
	}
	
	//
	// Ãâ€™ÃÂ¸Ã‘â‚¬Ã‘â€šÃ‘Æ’ÃÂ°ÃÂ»Ã‘Å’ÃÂ½Ã‘â€¹ÃÂ¹ ÃÂ³ÃÂµÃÂ½ÃÂµÃ‘â‚¬ÃÂ°Ã‘â€šÃÂ¾Ã‘â‚¬ HTML.
	//	
	protected function OnOutput()
	{
            $vars = array('contacts' => $this->allcontacts);
            $this->content = $this->Template('application/views/files/addfile.php', $vars);
            parent::OnOutput();
	}	
}
