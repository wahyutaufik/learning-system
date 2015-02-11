<?php  

function autoSpace()
{
	$ptn = "/_[a-z]?/";
	$str = $_GET['module'];

	$result = preg_replace_callback($ptn,"callbackhandler",$str);
	$result = preg_replace('/\B([A-Z])/', ' $1', $result);
	echo $result;
	
}

function callbackhandler($matches) {
    return strtoupper(ltrim($matches[0], "_"));
}
?>