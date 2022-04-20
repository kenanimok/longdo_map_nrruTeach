<?php 
include("../element/config.php");
include('../library/function/func.datethai.php');
$Group_id =iconv("utf-8", "tis-620", $_POST["group_id"]) ;
$Nenuid  = array($_POST["nenuid"]) ;
$i=0;
if(count($Nenuid[0]) ==0){
?>
	<div class="alert alert-danger alert-dismissible">
		 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>เกิดข้อผิดพลาดขึ้น !</strong>  กรุณาเลือกรายการสำหรับให้กลุ่มผู้ใช้เพื่อใช้งาน.
	</div>
<?php
}else{
foreach ($Nenuid as $v1) {
    foreach ($v1 as $v2) {
		if(++$i == count($v1))
			$_nenuid .= $v2;
		else 
			$_nenuid .= $v2.',';
    }
}
$arr_nenuid = explode(",",$_nenuid);
$nenuid_arr = array_unique($arr_nenuid);
if(!empty($Group_id)){
		$sqldel = "delete from us_menu_group 
						  where group_id = '$Group_id'";
		$result = $con->query($sqldel);
		foreach ($nenuid_arr as $i => $value) {
			$sql ='insert into us_menu_group(group_id,	menu_id) 
								values (\''.$Group_id.'\',\''. $value.'\')';
			$result2 = $con->query($sql);
		}
		if($result > 0){
?>
	<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>จัดเก็บข้อมูลสำเร็จ !</strong>บันทึกข้อมูลเรียบร้อย.
	</div>
<?php
	}else{
?>
<div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>เกิดข้อผิดพลาดขึ้น !</strong>  ไม่สามารถบันทึกข้อมูลได้.
</div>
<?php
		}
	}
}
$arr_input = array();
$resultnew = $con->query("select distinct m.menu_id, 
												m.menu_name, 
												m.menu_link, 
												m.menu_parent, 
												m.menu_icon 
										from us_menu m 
										inner join us_menu_group mg
										on(mg.menu_id = m.menu_id)
										and(mg.group_id='".$GroupId."')
										where m.menu_parent = 0
										order by m.menu_parent, m.menu_order");
while (($menu_barray = $resultnew->fetch_assoc())) {
		$resultnew1 = $con->query("select distinct m.menu_id, 
												m.menu_name, 
												m.menu_link, 
												m.menu_parent, 
												m.menu_icon 
										from us_menu m 
										inner join us_menu_group mg
										on(mg.menu_id = m.menu_id) 
										and(mg.group_id='".$GroupId."')
										where m.menu_parent = '".$menu_barray['menu_id']."'
										order by m.menu_parent, m.menu_order");
				while (($menu_barray1 = $resultnew1->fetch_assoc())) {
					 array_push($arr_input,$menu_barray1['menu_id']); 
				}
}
?>
<div class="form-group">
<div class="table-responsive">
      <table class="table table-striped jambo_table bulk_action">
	<!-- รายละเอียดของตาราง -->
	<?php
			$i = 1;
$result = $con->query("select distinct m.menu_id, 
												m.menu_name, 
												m.menu_link, 
												m.menu_parent, 
												m.menu_icon 
										from us_menu m 
										inner join us_menu_group mg
										on(mg.menu_id = m.menu_id)
										where m.menu_parent = 0
										order by m.menu_parent, m.menu_order");
while (($menu_barray = $result->fetch_assoc())) {
	$Menu_Id = $menu_barray['menu_id'];
	echo '<input type="hidden" name="MenuId" value="'.$Menu_Id.'">';
	echo '<thead>';
	echo '<tr class="headings">';
	//echo '<td>'.$i.'</td>';
			echo '<td colspan="4">&nbsp;<i class="fa '.$menu_barray['menu_icon'].'"></i> '.iconv("tis-620", "utf-8", $menu_barray['menu_name']).' </td>'; //<span class="fa fa-chevron-down"> 
   echo '</tr>'; 
   echo '</thead>';
   echo '<tbody>';
			$result1 = $con->query("select distinct m.menu_id, 
												m.menu_name, 
												m.menu_link, 
												m.menu_parent, 
												m.menu_icon 
										from us_menu m 
										inner join us_menu_group mg
										on(mg.menu_id = m.menu_id) 
										where m.menu_parent = '".$Menu_Id."'
										order by m.menu_parent, m.menu_order");
				while (($menu_barray1 = $result1->fetch_assoc())) {
					$Menu_ID = $menu_barray1['menu_id'];
					echo '<tr>';
						echo '<td width="5%">&nbsp;</td>';
						echo '<td width="75%"> <i class="fa fa-chevron-circle-left"></i> '.iconv("tis-620", "utf-8", $menu_barray1['menu_name']).'</td>';	
						echo '<td width="20%">';
						if(in_array($Menu_ID, $arr_input) == $Menu_ID){
							echo '<input type="checkbox" name="nenuid" id="nenuid-'.$i.'"  value="'.$Menu_Id.','.$Menu_ID.'" class="flat" checked />';
						}else{
							echo '<input type="checkbox" name="nenuid" id="nenuid-'.$i.'"   value="'.$Menu_Id.','.$Menu_ID.'"  class="flat" />';
						}
						echo '</td>';
					echo '</tr>';
				}
				$i++;
				echo '<tbody>';
	}
?>
	<!-- จบรายละเอียดของตาราง -->
			</table>
			</div>	
				<div class="form-group">
					<div class="col-md-12 col-sm-12 col-xs-12 text-center">
							<button class="btn btn-primary" id="btnSave" type="button"><i class="fa fa-save"></i> จัดเก็บ</button>
                     </div>
				</div>
		</div>

<script type="text/javascript">
 <!--
	$("#Group_Id").focus();
	$( "#btnSave").click(function() {
	if($("#Group_Id").val() == "") {
		alert("กรุณาเลือกชื่อกลุ่มผู้ใช้งาน");
		$("#Group_Id").focus();
		return false;
	}
	 if(confirm("คุณต้องการบันทึกข้อมูลการเปลี่ยนแปลงใช่หรือไม่")){
		 var nenuId = new Array();
	/*	 $('input[name="MenuId"]').each(function() {
			nenuId.push(this.value);
		});*/
		$('input[name="nenuid"]:checked').each(function() {
			nenuId.push(this.value);
		});
	//	alert("Number of selected Languages: "+selectedLanguage.length+"\n"+"And, they are: "+selectedLanguage);
		//alert(nenuId);
		 $.post("getabilitesedit.php", {
				group_id : "<?php echo $GroupId;?>",
				nenuid : nenuId
			}, 
			function(result){	 
				$("#txtabilities").html(result);
			});
		 return true;
	 }else{
		return false;
	}
  });
 //-->
 </script>