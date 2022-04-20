<?php 
session_start();
include("config.php");
include("../library/func.common.php"); 
$LF = new lib_Function();
	//===================  ทำงานสำหรับล็อกอิน ===========================
if(empty($_POST['login_user'])){
?>
		<font color="blue"> กรุณาป้อนชื่อผู้ใช้งาน.</font>
<?php
}else if(empty($_POST['login_pass'])){
	?>
		<font color="blue">กรุณาป้อนรหัสผ่าน.</font>
<?php
}else{
		$result1 = $con->query("select * from us_user where user_name = '".$_POST['login_user']."'
		and user_password = '".MD5($_POST['login_pass'])."'");
		$num_rows = mysqli_num_rows($result1);
		if($num_rows == 0){
	?>
			<font color="blue"> ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง กรุณากลับไปใส่ข้อมูลใหม่.</font>
 <?php
}else{
			$result1 = $con->query('select ug.*, u.user_id, u.time_create, u.user_image, u.user_name, u.nameth    
													from us_user u
													inner join us_user_group ug
													on(ug.group_id = u.group_id)
													where u.user_name = \''.$_POST['login_user'].'\'');
			while ($row = $result1->fetch_assoc()) {
				$_SESSION['group_id'] = $row["group_id"];
				$_SESSION['username'] = $row["user_name"];
				$_SESSION['group_name'] = $row["group_name"];
				$_SESSION['user_id'] = $row["user_id"];
				$_SESSION['user_image'] = $row["user_image"];
				$_SESSION['fullname'] = iconv("tis-620", "utf-8", $row["nameth"]);
					$sqlupdate = "UPDATE us_user 
									SET  time_update = '".date("Y-m-d H:i:s")."'
									WHERE user_id = '".$row["user_id"]."'"; 
					$result = $con->query($sqlupdate);
					$_SESSION['time_update'] = date("Y-m-d H:i:s");
					$_SESSION['time_create'] = $row["time_create"];

					?>
					<script>
						location.reload();
					</script>
				<?php
				}
		}
	 }
?>