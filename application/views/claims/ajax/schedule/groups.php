<?php

include('../config.php');

function getPatientInfoById($id) {
	$sql = "SELECT * FROM patients WHERE id='$id'";
	$res = mysql_query($sql);
	$result = mysql_fetch_object($res);
	
	return $result;
}


$group = $_POST['group'];
$id_group = substr($group, 5);

$sql = "SELECT * FROM groupofpatients WHERE id_group = '$id_group'";
$res = mysql_query($sql);

while ($row = mysql_fetch_object($res))
	$result[] = $row;

$html = "<table class='table table-condenced'><tr><td><b>#</b></td><td><b>ФИО Пациент</b></td></tr>";

for($i = 0; $i < count($result); $i++)
{
	$k = $i + 1;
	$patient = getPatientInfoById($result[$i]->id_patient);
	$html .= "<tr>";
	$html .= "<td>$k</td>";
	$html .= "<td>".$patient->patientname."</td>";
	$html .= "</tr>";
}

$html .= "</table>";

echo $html;

?>