 <?php
 require_once '../theme/header.php';
 include('../library/function/func.datethai.php');
 ?>
  <!-- Main content -->
       <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">หน้าหลัก <small>(งานสารสนเทศเพื่อการบริการ)</small> </h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
			<form class="form-horizontal">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
						<input type="hidden" name="status_up" id="status_up">
						<input type="hidden" name="user_id" id="user_id">
					    <div class="form-group row">
							<label class="control-label col-md-2 col-sm-12 col-xs-12">ชื่อกลุ่มผู้ใช้งาน : </label>
							<div class="col-md-4 col-sm-4 col-xs-12">
							  <?php
								$i = 0;
								$result1 = $con->query("select * from us_user_group order by group_id");
								echo '<select id="group_id" name="group_id"   class="form-control">';
								echo   "<OPTION VALUE=\"\"> เลือกกลุ่มผู้ใช้งาน</OPTION> ";
								while ($row1 = $result1->fetch_assoc()){
										$i++;
										if($row1['group_id']==$group_id && strlen($row1['group_id'])==strlen($group_id)){
											echo   "<OPTION VALUE=\"".iconv("tis-620", "utf-8",$row1['group_id'])."\" selected> $i. ".iconv("tis-620", "utf-8",$row1['group_name'])."</OPTION> ";
										}else{
											echo   "<OPTION VALUE=\"".iconv("tis-620", "utf-8",$row1['group_id'])."\"> $i. ".iconv("tis-620", "utf-8",$row1['group_name'])."</OPTION> ";
										}
									}
									echo '</select>';
								?>
							</div>
						</div>
						<!--  -->
						 <div class="form-group row">
							<label class="control-label col-md-2 col-sm-12 col-xs-12">คำนำหน้า :</label>
							<div class="col-md-4 col-sm-12 col-xs-12">
							  <?php
								$i = 0;
								$result1 = $con->query("select * from tbl_prefix order by prf_id");
								echo '<select id="prf_id" name="prf_id"   class="form-control">';
								echo   "<OPTION VALUE=\"\"> เลือกคำนำหน้า </OPTION> ";
								while ($row1 = $result1->fetch_assoc()){
											echo   "<OPTION VALUE=\"".iconv("tis-620", "utf-8",$row1['prf_id'])."\">".iconv("tis-620", "utf-8",$row1['prf_initialsth'])."</OPTION> ";
									}
									echo '</select>';
								?>
							</div>
                        <label class="control-label col-md-2 col-sm-12 col-xs-12" for="nameth">ชื่อ-นามสกุล :</label>
                        <div class="col-md-3 col-sm-12 col-xs-12">
							<input type="text" id="nameth"  class="form-control" >
                        </div>
                      </div>
					  <!-- ///////////////////// -->
                      <div class="form-group row">
                        <label class="control-label col-md-2 col-sm-12 col-xs-12" for="user_name">ชื่อผู้ใช้งาน : </label>
                        <div class="col-md-4 col-sm-12 col-xs-12">
							<input type="text" id="user_name"  class="form-control" >
                        </div>
                        <label class="control-label col-md-2 col-sm-12 col-xs-12" for="userpassword">รหัสผ่าน :</label>
						<div class="col-md-3 col-sm-12 col-xs-12">
							<input type="password" id="user_password"  class="form-control" >
                        </div>
						</div>
						<!-- ////////////////// -->
						<div class="form-group row">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="confirmpassword">ยื่นยันรหัสผ่าน :</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="password" id="confirm_password"  class="form-control" >
                        </div> 
                        <label for="middle-name" class="control-label col-md-2 col-sm-12 col-xs-12">วันที่เพิ่ม :</label>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                          <input id="user_time" class="form-control" type="text" name="group_time" value="<?php echo iconv("tis-620", "utf-8",unno_sql_datetimes(date("Y-m-d H:i:s"),false));?>" readonly>
                        </div>
                      </div>
                      <hr>
                      <div class="form-group row text-center">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <button class="btn btn-primary" id="btnSave" type="button"><i class="fa fa-save"></i> จัดเก็บ</button>
						  <button class="btn btn-warning" id="btnClear" type="reset"><i class="fa fa-refresh"></i> ล้างข้อมูล</button>
                        </div>
                      </div>

                    </form>

              </div>
            </div>
		 </div>
	  </div>

		<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">หน้าหลัก <small>(งานสารสนเทศเพื่อการบริการ)</small> </h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
							<div id="txtuser"></div>
						</div>
					</div>
				</div>
			</div>

			</div>
		</div>
	</div>
  </div>
 <?php
 require_once '../theme/footer.php';
 ?>
 <script type="text/javascript">
<!--
$(document).ready(function(){
		$("#status_up").val("Up_I");
		$.post("getuser.php", {
			}, 
			function(result){	 
				$("#txtuser").html(result);
			});
		$( "#btnClear").click(function() {
			$("#status_up").val("Up_I");
		});
		$( "#btnSave").click(function() {
			var upass = $("#user_password").val();
			var frmpass = $("#confirm_password").val();
			var statusUp = $("#status_up").val();
			
			if($("#group_id").val() == ""){
				myAlert("กรุณาเลือกชื่อกลุ่มผู้ใช้งาน !", 'fa fa-warning', 'red', 'มีข้อผิดพลาดเกิดขึ้น !','btn-red', 'red', 'small', 'ตกลง');
				return false;
			}
			if($("#prf_id").val() == ""){
				myAlert("กรุณาเลือกคำนำหน้า !", 'fa fa-warning', 'red', 'มีข้อผิดพลาดเกิดขึ้น !','btn-red', 'red', 'small', 'ตกลง');
				return false;
			}
			if($("#nameth").val() == ""){
				myAlert("กรุณาป้อนชื่อ-นามสกุล !", 'fa fa-warning', 'red', 'มีข้อผิดพลาดเกิดขึ้น !','btn-red', 'red', 'small', 'ตกลง');
				return false;
			}
			if($("#user_name").val() == ""){
				myAlert("กรุณาป้อนชื่อ-นามสกุล !", 'fa fa-warning', 'red', 'มีข้อผิดพลาดเกิดขึ้น !','btn-red', 'red', 'small', 'ตกลง');
				return false;
			}
			if(statusUp.localeCompare("Up_E") != 0){
				if($("#user_password").val() == ""){
					$("#user_password").focus();
					myAlert("กรุณาป้อนรหัสผ่าน !", 'fa fa-warning', 'red', 'มีข้อผิดพลาดเกิดขึ้น !','btn-red', 'red', 'small', 'ตกลง');
					return false;
				}
				if($("#confirm_password").val() == ""){
					$("#confirm_password").focus();
					myAlert("กรุณายืนยันรหัสผ่านอีกครั้ง !", 'fa fa-warning', 'red', 'มีข้อผิดพลาดเกิดขึ้น !','btn-red', 'red', 'small', 'ตกลง');
					return false;
				}
			}
			if(upass.localeCompare(frmpass) != 0){
				$("#confirm_password").focus();
				$("#confirm_password").val("");
				myAlert("ป้อนรหัสผ่าน และการยืนยันรหัสผ่านไม่ตรงกัน !", 'fa fa-warning', 'red', 'มีข้อผิดพลาดเกิดขึ้น !','btn-red', 'red', 'small', 'ตกลง');
				return false;
			}
			$.post("getusersave.php", {
				group_id : $("#group_id").val(),
				user_id : $("#user_id").val(),
				user_name : $("#user_name").val(),
				user_password : $("#user_password").val(),
				nameth : $("#nameth").val(),
				prf_id : $("#prf_id").val(),
			    user_up: $("#status_up").val()
			}, 
			function(result){	 
				var str = "เกิดข้อผิดพลาดขึ้น";
				var n = str.search(result);
				var color="blue";
				var ico = "fa fa-info-circle";
				if(n >= 0){
					 color = "red";
					 ico = "fa fa-warning";
				}
				myAlert(result, ico, color, 'สถานะการทำงาน !','btn-red', color, 'middle', 'ตกลง');
				$("#status_up").val("Up_I");
				$("#user_name").removeAttr("disabled"); 
			});
		});
 });
//-->
</script>