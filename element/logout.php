<?php
	session_start();
	session_destroy();
	include("../library/func.common.php"); 
	$LF = new lib_Function();
	$LF->unno_redirect('../index.php');
?>