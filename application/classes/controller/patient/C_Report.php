<?php

include_once('system/C_Base.php');

class C_Report extends C_Base {

	public $expenced;
	public $costExpenced;
	public $id;
	public $month;
	public $year;

	function __construct() {

	}

	public function OnInput() {
		parent::OnInput();

		$this->id = $_GET['id_patient'];
		$this->month = $_GET['month'];
		$this->year = $_GET['year'];

		$this->expenced = getPatientExpences($this->id, $this->month, $this->year);
		$this->costExpenced = getPatientCostExpences($this->id, $this->month, $this->year);

	}

	public function OnOutput() {
		$vars = array('patientId' => $this->id,
						'month' => $this->month,
						'year' => $this->year,
						'expences' => $this->expenced,
						'cexpences' => $this->costExpenced);

		$this->content = $this->Template("application/views/patients/report.php", $vars);

		parent::OnOutput();
	}
}