<?php 
session_start();
include("../element/config.php");
include('../library/function/func.datethai.php');
?>
<div class="table-responsive">
      <table id="example" class="table table-striped jambo_table bulk_action">
		<thead>
		<tr class="headings">
				<!-- ส่วนของหัวตาราง -->
				<th width="10%" class="text-center">ลำดับ</th>
				<th width="40%">ประเภทผู้ใช้งาน</th>
				<th  width="30%">วันเวลาที่เพิ่ม/แก้ไข</th>
				<th  width="10%" class="text-center">แก้ไข</th>
				<th  width="10%" class="text-center">ลบ</th>
				<!-- จบส่วนของหัวตาราง -->
			</tr>
		</thead>
	<tbody>
	<!-- รายละเอียดของตาราง -->
	<?php
			$i = 1;
			$result1 = $con->query('select ug.*, u.group_id as groupid 
													from us_user_group ug
													left join us_user u 
													on(u.group_id=ug.group_id)
													group by ug.group_id');
			while ($row = $result1->fetch_assoc()) {
				$groupid = $row["groupid"];
				$group_id = $row["group_id"];
				$group_name = iconv("tis-620", "utf-8",$row["group_name"]);
				$group_detail = iconv("tis-620", "utf-8",$row["group_detail"]);
				$group_time = iconv("tis-620", "utf-8",unno_sql_datetimes($row["group_time"],false));
				echo '<tr>';
					echo '<td class="text-center">' . $i . '</td>';
					echo '<td>' .$group_name. '</td>';
					echo '<td>' .$group_time.'</td>';
					echo '<td class="text-center"><i class="fa fa-edit fa-2x" id="fa-edit-'.$group_id.'" style="cursor: pointer;"></i></td>';
					if(empty($groupid)){
						echo '<td class="text-center"><i class="fa fa-trash-o fa-2x" id="fa-trash-'.$group_id.'" style="cursor: pointer;"></i></td>';
					}else{
						echo '<td class="text-center text-danger"><i class="fa fa-ban fa-2x"></i></td>';
					}
				echo '</tr>';
			?>
			<script type="text/javascript">
		<!--
		$("<?php echo '#fa-trash-'.$group_id;?>").click(function() {
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
								 $.post("getgroupedit.php", {
										group_id : "<?php echo $group_id;?>"
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
		});
		$("<?php echo '#fa-edit-'.$group_id;?>").click(function() {
			$("#group_name").val("<?php echo $group_name;?>");
			$("#group_detail").val("<?php echo $group_detail;?>");
			$("#group_time").val("<?php echo $group_time;?>");
			$("#group_id").val("<?php echo $group_id;?>");
			$("#status_up").val("Up_E");
			$("#group_name").focus();
		});
		//-->
		</script>
			<?php
			$i++;					
		}
    ?>
	<!-- จบรายละเอียดของตาราง -->
				</tbody>
			</table>
		</div>