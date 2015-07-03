<?php

$file = $_GET['file'];

if(file_exists($_SERVER['DOCUMENT_ROOT']."/dt/uploads/act/".$file))
{
		$file_name  = $file;
		switch($file_ext)
		{
			case "gif": $file_type="image/gif"; break;
			case "png": $file_type="image/png"; break;
			case "jpg": $file_type="image/jpg"; break;
			default: $file_type="application/force-download";
		}
		header('Content-type: '.$file_type);
		header('Content-Disposition: attachment; filename=' . $file_name . '');
		readfile($_SERVER['DOCUMENT_ROOT'].'/dt/uploads/act/'.''. $file .'');
}

header('location: index.php?option=editclaim&id='.$_GET['id']);
?>