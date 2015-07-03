<?php
include_once('system/C_Base.php');

class C_Chems extends C_Base {

	public $chems; 

	public function __construct() {

	}

	public function OnInput() {
		parent::OnInput();
		$this->title = 'Аптеки';
		$this->chems = getChems();
	}

	public function OnOutput() {

		$vars = array('chems' => $this->chems);
		$this->content = $this->Template('application/views/chems/all.php', $vars);
		parent::OnOutput();
	}
}