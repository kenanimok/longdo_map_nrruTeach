<?php 
include("../element/config.php");
include('../library/function/func.datethai.php');
$Group_name =iconv("utf-8", "tis-620", $_POST["group_name"]) ;
$Group_detail =iconv("utf-8", "tis-620", $_POST["group_detail"]) ;
$Group_up =iconv("utf-8", "tis-620", $_POST["group_up"]) ;
$Group_id =iconv("utf-8", "tis-620", $_POST["group_id"]) ;
if($Group_up == "Up_I"){
	if(!empty($Group_name)){
		$sqlinsert = "INSERT INTO us_user_group (group_name, group_detail, group_time)
							  VALUES ('$Group_name', '$Group_detail', '".date("Y-m-d H:i:s")."')";
		$result = $con->query($sqlinsert);
		if($result > 0){
?>
	<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>การจัดเก็บสำเร็จ !</strong> บันทึกข้อมูลเรียบร้อย.
	</div>
<?php
	}
}else{
?>
<div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>เกิดข้อผิดพลาดขึ้น !</strong>  กรุณาป้อนข้อมูลชื่อกลุ่มผู้ใช้งาน.
</div>
<?php
	}
}else{
	if(!empty($Group_id)){
		$sqlupdate = "UPDATE us_user_group 
							SET  group_name = '$Group_name',
									group_detail = '$Group_detail',
									group_time = '".date("Y-m-d H:i:s")."'
							WHERE group_id = '$Group_id'";
		$result = $con->query($sqlupdate);
		if($result > 0){
?>
	<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>แก้ไขข้อมูลสำเร็จ !</strong> แก้ไขข้อมูลเรียบร้อย.
	</div>
<?php
	}
}else{
?>
<div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>เกิดข้อผิดพลาดขึ้น !</strong>  แก้ไขข้อมูลไม่สำเร็จ.
</div>
<?php
	}
}
?>
	<script type="text/javascript">
		<!--
			$.post("getgroup.php", {
			}, 
			function(result){	 
				$('#group_name').val('');
				$('#group_detail').val('');
				$("#txtgroup").html(result);
			});
		//-->
</script>