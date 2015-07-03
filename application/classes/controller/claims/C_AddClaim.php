<?php
include_once('system/C_Base.php');
// 
//

class C_AddClaim extends C_Base
{
	 protected $active;
	 protected $id;
	 protected $types;
	 protected $departments;
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
            $this->title = 'Добавление заявки';
			
			$this->types = getTypes();
			$this->departments = getDepartments();
			
			
			if (isset($_POST['submit'])) {
				move_uploaded_file($_FILES["filename"]['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/dt/uploads/claim/".$_FILES["filename"]["name"]);
				$file = $_FILES['filename']['name'];
				addClaim(
					$_POST['in_num'], 
					$_POST['in_date'],
					$_POST['out_num'],
					$_POST['out_date'],
					$_POST['type'],
					$_POST['description'],
					$_POST['sen_dep'],
					$_POST['sen_name'],
					$file,
					$_POST['rec']
				);
			}
			
	}
	
	//
	// ГђвЂ™ГђВёГ‘в‚¬Г‘вЂљГ‘Ж’ГђВ°ГђВ»Г‘Е’ГђВЅГ‘вЂ№ГђВ№ ГђВіГђВµГђВЅГђВµГ‘в‚¬ГђВ°Г‘вЂљГђВѕГ‘в‚¬ HTML.
	//	
	protected function OnOutput()
	{
            $vars = array('types' => $this->types, 'departments' => $this->departments);
            $this->content = $this->Template('application/views/claims/addclaim.php', $vars);
            parent::OnOutput();
	}	
}
