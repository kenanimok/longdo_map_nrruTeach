<?php 
include("../element/config.php");
include('../library/function/func.datethai.php');
$Staffname =iconv("utf-8", "tis-620", $_POST["staffname"]) ;
?>
<div class="table-responsive">
      <table  id="example" class="table table-bordered table-striped">
		<thead>
		<tr>
				<!-- ส่วนของหัวตาราง -->
				<th width="20%">ประเภทผู้ใช้งาน</th>
				<th  width="5%" class="text-center">ลำดับ</th>
				<th width="15%">ชื่อผู้ใช้งาน</th>
				<th width="20%">ชื่อ- นามสกุลผู้ใช้งาน</th>
				<th  width="15%">วันเวลาที่เริ่มใช้</th>
				<th  width="15%">วันเวลาใช้ล่าสุด</th>
				<th  width="5%" class="text-center">แก้ไข</th>
				<th  width="5%" class="text-center">ลบ</th>
				<!-- จบส่วนของหัวตาราง -->
			</tr>
		</thead>
	<tbody>
	<!-- รายละเอียดของตาราง -->
	<?php
			$i = 1;
			$j = 1;
			$GroupName = "";
			if(empty($Staffname)){
			$result1 = $con->query('select u.*, ug.group_name, frg.prf_initialsth 
													from us_user_group ug
													inner join us_user u 
													on(u.group_id=ug.group_id)
													inner join tbl_prefix frg
													on(frg.prf_id=u.prf_id)
													order by ug.group_id');
			}else{
				$result1 = $con->query('select u.*, ug.group_name, frg.prf_initialsth 
													from us_user_group ug
													inner join us_user u 
													on(u.group_id=ug.group_id) 
													inner join tbl_prefix frg
													on(frg.prf_id=u.prf_id)
													where u.nameth like \'%'.$Staffname.'%\' 
													order by ug.group_id');
			}
			while ($row = $result1->fetch_assoc()) {
				$group_id = $row["group_id"];
				$user_id = $row["user_id"];
				$prf_id = $row["prf_id"];
				$group_name = iconv("tis-620", "utf-8",$row["group_name"]);
				$user_name = iconv("tis-620", "utf-8",$row["user_name"]);
				$prf_initialsth = iconv("tis-620", "utf-8",$row["prf_initialsth"]);
				$nameth = iconv("tis-620", "utf-8",$row["nameth"]);
				$time_create = iconv("tis-620", "utf-8",unno_sql_datetime($row["time_create"],false));
				$time_update = iconv("tis-620", "utf-8",unno_sql_datetime($row["time_update"],false));
				echo '<tr>';
					if($GroupName != $group_name){
						$GroupName = $group_name;
						echo '<td>'.$group_name.'</td>';
						$j =1;
					}else{
						echo '<td>&nbsp;</td>';
					}
					echo '<td class="text-center">'.$j.'</td>';
					echo '<td>'.$user_name.'</td>';
					echo '<td>' .$prf_initialsth."".$nameth.'</td>';
					echo '<td>' .$time_create.'</td>';
					echo '<td>' .$time_update.'</td>';
					echo '<td class="text-center"><i class="fa fa-edit fa-2x" id="fa-edit'.$i.'" style="cursor: pointer;"></i></td>';
					echo '<td class="text-center"><i class="fa fa-trash-o fa-2x" id="fa-trash'.$i.'" style="cursor: pointer;"></i></td>';
				echo '</tr>';
			?>
<script type="text/javascript">
		<!--
		$("<?php echo '#fa-trash'.$i;?>").click(function() {
			warn_del("<?php echo $user_id;?>");
		});
		$("<?php echo '#fa-edit'.$i;?>").click(function() {
			$("#user_id").val("<?php echo $user_id;?>");
			$("#user_name").val("<?php echo $user_name;?>");
			$("#nameth").val("<?php echo $nameth;?>");
			$("#group_id").val("<?php echo $group_id;?>");
			$("#user_time").val("<?php echo $time_create;?>");
			$("#prf_id").val("<?php echo $prf_id;?>");
			$("#status_up").val("Up_E");
			$("#nameth").focus();
			$("#user_name").attr("disabled", "disabled");
		});
		//-->
		</script>
			<?php
			$i++;		
			$j++;
		}
    ?>
	<!-- จบรายละเอียดของตาราง -->
				</tbody>
			</table>
		</div>
		<script type="text/javascript">
 <!--
	function warn_del(user_id){
		 $.confirm({
					icon: 'fa fa-warning',
					title: 'ยื่นยันการลบข้อมูล !',
					content: 'คุณต้องการที่จะลบข้อมูลใช่หรือไม่',
					type: 'red',
					typeAnimated: true,
					buttons: {
						tryAgain: {
							text: 'ตกลง',
							btnClass: 'btn-red',
							action: function(){
					//----------------------------------------------------------------
							 $.post("getuseredit.php", {
									user_id: user_id
								}, 
								function(result){	 
									$("#txtalert").html(result);
								});
				//------------------------------------------------------
				}
			},
			ยกเลิก: function () {
			}
		}
	});
 }
 $(document).ready(function () {
      var table = $('#example').DataTable({
		pageLength: 50,
		lengthMenu: [10,  25, 50, 75, 100],
		order: [],
		columnDefs: [ { orderable: false, targets: [0] }]
	  });
  });
 //-->
 </script>