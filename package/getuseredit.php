<?php 
include("../element/config.php");
include('../library/function/func.datethai.php');
$user_id =iconv("utf-8", "tis-620", $_POST["user_id"]) ;
if(!empty($user_id)){
		$sqldel = "delete from us_user 
						  where user_id = '$user_id'";
		$result = $con->query($sqldel);
		if($result > 0){
?>
	<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>ลบข้อมูลสำเร็จ !</strong> ลบข้อมูลเรียบร้อย.
	</div>
<?php
		}
}else{
?>
<div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>เกิดข้อผิดพลาดขึ้น !</strong>  ไม่สามารถลบข้อมูลได้.
</div>
<?php
}
?>
	<script type="text/javascript">
		<!--
			$.post("getuser.php", { }, 
			function(result){	 
				$('#staffid').val('');
				$('#user_name').val('');
				$('#nameth').val('');
				$('#group_id').val('');
				$("#txtuser").html(result);
			});
		//-->
</script>