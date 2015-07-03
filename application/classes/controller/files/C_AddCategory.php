<?php
include_once('system/C_Base.php');
// 
//

class C_AddCategory extends C_Base
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
            $this->title = 'Добавление папки';
			
			if (isset($_POST['submit'])) {
				$id_user = $_SESSION['uid'];
				$name = $_POST['name'];
				
				if (addcategory($id_user, $name)) 
					header('location: index.php?option=files');
			}		
	}
	
	//
	// ГђвЂ™ГђВёГ‘в‚¬Г‘вЂљГ‘Ж’ГђВ°ГђВ»Г‘Е’ГђВЅГ‘вЂ№ГђВ№ ГђВіГђВµГђВЅГђВµГ‘в‚¬ГђВ°Г‘вЂљГђВѕГ‘в‚¬ HTML.
	//	
	protected function OnOutput()
	{
            $vars = array('types' => $this->types, 'departments' => $this->departments);
            $this->content = $this->Template('application/views/files/addcategory.php', $vars);
            parent::OnOutput();
	}	
}
