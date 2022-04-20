<?php
	$mysql_host = 'localhost';
	$mysql_user = 'root';
	$mysql_pass = 'root123456';
	$mysqp_db = 'db_longdo';
// ===== Database
$con = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysqp_db);
if ($con->connect_errno) {
    echo $con->connect_error;
    exit;
}
$con->set_charset("tis-620");
$result = $con->query("SET character_set_results=tis620");//��駤�ҡ�ô֧�������͡������� tis620
$result = $con->query("SET character_set_client=tis620");//��駤�ҡ���觢�����ŧ�ҹ�������͡������� tis620
$result = $con->query("SET character_set_connection=tis620");//��駤�ҡ�õԴ��Ͱҹ����������� tis620

error_reporting(error_reporting() & ~E_NOTICE);
date_default_timezone_set("Asia/Bangkok");
?>