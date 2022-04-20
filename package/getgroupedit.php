<?php 
include("../element/config.php");
include('../library/function/func.datethai.php');
$Group_id =iconv("utf-8", "tis-620", $_POST["group_id"]) ;
if(!empty($Group_id)){
		$sqldel = "delete from us_user_group 
						  where group_id = '$Group_id'";
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
			$.post("getgroup.php", {
			}, 
			function(result){	 
				$('#group_name').val('');
				$('#group_detail').val('');
				$("#txtgroup").html(result);
			});
		//-->
</script>