<?php 
	session_start();
	include("library/func.common.php"); 
	$LF = new lib_Function();
	if(!empty($_SESSION['username'])){
		$LF->unno_redirect('package/main.php');
	}else{
		require_once 'element/login.php';
	}
  ?>
    