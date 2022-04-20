<?php 
include("../element/config.php");
include('../library/function/func.datethai.php');
$User_id=iconv("utf-8", "tis-620", $_POST["user_id"]) ;
$Prf_id=iconv("utf-8", "tis-620", $_POST["prf_id"]) ;
$User_name =iconv("utf-8", "tis-620", $_POST["user_name"]) ;
$User_password =iconv("utf-8", "tis-620", $_POST["user_password"]) ;
$Nameth =iconv("utf-8", "tis-620", $_POST["nameth"]) ;
$Group_id =iconv("utf-8", "tis-620", $_POST["group_id"]) ;
$User_up =iconv("utf-8", "tis-620", $_POST["user_up"]) ;
if($User_up == "Up_I"){
		$result1 = $con->query("select * from us_user where user_id = '$User_id'");
		$num_rows = mysqli_num_rows($result1);
		if($num_rows > 0){
	?>
			<div class="alert alert-danger alert-dismissible">
				<strong>เกิดข้อผิดพลาดขึ้น !</strong>  ผู้ใช้งานนี้มีอยู่.
			</div>
	<?php
		}else{
		$sqlinsert = "INSERT INTO us_user (user_id, group_id, prf_id, nameth, user_name, user_password, time_create)
							  VALUES ('$User_id', '$Group_id',  '$Prf_id', '$Nameth', '$User_name', '".MD5($User_password)."', '".date("Y-m-d H:i:s")."')";
		$result = $con->query($sqlinsert);
		if($result > 0){
?>
			<div class="alert alert-success alert-dismissible">
				<strong>การจัดเก็บสำเร็จ !</strong> บันทึกข้อมูลเรียบร้อย.
			</div>
<?php
		}else{
?>
		<div class="alert alert-danger alert-dismissible">
			<strong>เกิดข้อผิดพลาดขึ้น !</strong>  บันทึกข้อมูลไม่สำเร็จ.
		</div>
<?php
		}
	}
}else{
	if(!empty($User_id)){
			if(!empty($User_password )){
				$userpassword = "user_password  = '".MD5($User_password)."', "; 
			}else{ 
				$userpassword = "";
			}
			$sqlupdate = "UPDATE us_user 
									SET  user_name = '$User_name',
									nameth = '$Nameth',
									group_id = '$Group_id',
									$userpassword 
									time_create = '".date("Y-m-d H:i:s")."'
									WHERE user_id = '$User_id'"; 
			
		$result = $con->query($sqlupdate);
		if($result > 0){
?>
	<div class="alert alert-success alert-dismissible">
		<strong>แก้ไขข้อมูลสำเร็จ !</strong> แก้ไขข้อมูลเรียบร้อย.
	</div>
<?php
	}
}else{
?>
<div class="alert alert-danger alert-dismissible">
	<strong>เกิดข้อผิดพลาดขึ้น !</strong>  แก้ไขข้อมูลไม่สำเร็จ.
</div>
<?php
	}
}
?>
	<script type="text/javascript">
		<!--
			$.post("getuser.php", { }, 
			function(result){	 
				$('#user_name').val('');
				$('#nameth').val('');
				$('#group_id').val('');
				$("#prf_id").val('');
				$("#user_password").val('');
				$("#confirm_password").val('');
				$("#txtuser").html(result);
			});
		//-->
</script>