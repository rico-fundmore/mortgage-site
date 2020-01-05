<?php 
function getStream(){
	
	$context = stream_context_create(
		array (		"http"=>array()));
	return $context;//returns the stream
	
}

$file = $_GET["file"] .".pdf";
header("Content-type: application/pdf");
	header("Content-Disposition: attachment; filename=" . urlencode($file));
	readfile($file, false, getstream());