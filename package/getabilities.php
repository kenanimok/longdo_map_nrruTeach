<?php 
include("../element/config.php");
include('../library/function/func.datethai.php');
$GroupId =iconv("utf-8", "tis-620", $_POST["group_id"]) ;
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
										left join us_menu_group mg
										on(mg.menu_id = m.menu_id)
										where m.menu_parent = 0
										order by m.menu_parent, m.menu_order");
while (($menu_barray = $result->fetch_assoc())) {
	$Menu_Id = $menu_barray['menu_id'];
	echo '<input type="hidden" name="MenuId" value="'.$Menu_Id.'">';
	echo '<thead>';
	echo '<tr class="headings">';
	//echo '<td>'.$i.'</td>';
			echo '<td colspan="4">&nbsp;<i class="fa '.$menu_barray['menu_icon'].' fa-lg"></i> '.iconv("tis-620", "utf-8", $menu_barray['menu_name']).' </td>'; //<span class="fa fa-chevron-down"> 
   echo '</tr>'; 
   echo '</thead>';
   echo '<tbody>';
			$result1 = $con->query("select distinct m.menu_id, 
												m.menu_name, 
												m.menu_link, 
												m.menu_parent, 
												m.menu_icon 
										from us_menu m 
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
	$( "#btnSave").click(function() {
	if($("#Group_Id").val() == "") {
		myAlert('กรุณาเลือกชื่อกลุ่มผู้ใช้งาน', 'fa fa-warning', 'red', 'มีข้อผิดพลาดเกิดขึ้น !','btn-red', 'red', 'small', 'ตกลง');
		$("#Group_Id").focus();
		return false;
	}
		$.confirm({
					icon: 'fa fa-warning',
					title: 'ยื่นยันการเปลี่ยนแปลงข้อมูล !',
					content: 'คุณต้องการบันทึกข้อมูลการเปลี่ยนแปลงใช่หรือไม่',
					type: 'blue',
					typeAnimated: true,
					buttons: {
						tryAgain: {
							text: 'ตกลง',
							btnClass: 'btn-blue',
							action: function(){
					//----------------------------------------------------------------
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
		 //------------------------------------------------------
				}
			},
			ยกเลิก: function () {
			}
		}
	});
 });
 //-->
 </script>
