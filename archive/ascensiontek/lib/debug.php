<?php
// Debugging functions:
// * requires strings.php


$debugMode = false;


function debugOn() {
	global $debugMode;
	$debugMode = true;
}


function debugOff() {
	global $debugMode;
	$debugMode = false;
}


function getDebugMode() {
	global $debugMode;
	return $debugMode;
}


function beginDebugPrint() {
	println("<pre style='color:Red'>");
}


function endDebugPrint() {
	println("</pre>");
}


function debug($var, $funcName = '') {
	global $debugMode;
	if ($debugMode) {
		beginDebugPrint();
		if ($funcName != '') {
			print "<b>$funcName:</b> ";
		}
		if (is_array($var)) {
			print_r($var);
		}
		elseif (is_object($var)) {
			var_dump($var);
		}
		elseif (is_bool($var)) {
			printbr(bool2str($var));
		}
		else {
			printbr(htmlspecialchars($var));
		}
		endDebugPrint();
	}
}


function debugAll($printPreTags = true) {
	global $debugMode;
	if ($debugMode) {
		if ($printPreTags) {
			beginDebugPrint();
		}
		var_dump(get_defined_vars());
		if ($printPreTags) {
			endDebugPrint();
		}
	}
}


function debugExit($str = '') {
	global $debugMode;
	if ($debugMode) {
		exit($str);
	}
}
?>