<?php
include_once('system/C_Base.php');
// 
//

class C_ViewCategory extends C_Base
{
	protected $active;
	protected $id;
	protected $category;
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
			
			
			$this->category = getUserCategories($_SESSION['uid']);
	}
	
	//
	// ГђвЂ™ГђВёГ‘в‚¬Г‘вЂљГ‘Ж’ГђВ°ГђВ»Г‘Е’ГђВЅГ‘вЂ№ГђВ№ ГђВіГђВµГђВЅГђВµГ‘в‚¬ГђВ°Г‘вЂљГђВѕГ‘в‚¬ HTML.
	//	
	protected function OnOutput()
	{
            $vars = array('category' => $this->category);
            $this->content = $this->Template('application/views/files/category.php', $vars);
            parent::OnOutput();
	}	
}
