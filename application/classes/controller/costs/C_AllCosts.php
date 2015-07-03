<?php

include_once('system/C_Base.php');

class C_Costs extends C_Base {

	public $costs;

	function __construct() {

	}

	public function OnInput() {
		parent::OnInput();

		$this->costs = getAllCosts();
	}

	public function OnOutput() {

		$vars = array('costs' => $this->costs);
		$this->content = $this->Template('application/views/costs/all.php', $vars);
		parent::OnOutput();
	}
}