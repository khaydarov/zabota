<?php
include_once('system/C_Base.php');
// 
//

class C_EditCost extends C_Base
{
	 protected $active;
	 protected $id;
	 protected $allmedicines;
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
            $this->title = 'Список медикаментов';    

            $this->allmedicines = getMedicinebyId($_GET['id']);
			
	}
	
	//	
	protected function OnOutput()
	{
            $vars = array('allmedicines' => $this->allmedicines);
            $this->content = $this->Template('application/views/medicines/allmedicines.php', $vars);
            parent::OnOutput();
	}	
}
