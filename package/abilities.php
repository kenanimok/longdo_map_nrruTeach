 <?php
 require_once '../theme/header.php';
//  require_once("../library/nusoap.php");
 include('../library/function/func.datethai.php');
 ?>
  <!-- Main content -->
       <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                    <h2>แบบฟอร์ม <small>(สำหรับจัดการข้อมูลกลุ่มผู้ใช้งาน)</small></h2>
                   <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
					<div id="txtalert"></div>
                    <br />
                    <form id="demo-form2"  class="form-horizontal">
						<input type="hidden" name="status_up" id="status_up">
						<div class="form-group row">
                        <label class="control-label col-md-3 col-xs-12">ชื่อกลุ่มผู้ใช้งาน <span class="required">:</span>
                        </label>
                        <div class="col-md-6 col-xs-12">
						  <?php
							$i = 0;
							$result1 = $con->query("select * from us_user_group order by group_id");
							echo '<select id="Group_Id" name="Group_Id"  required="required" class="form-control col-md-7 col-xs-12">';
							echo   "<OPTION VALUE=\"\"> <<<  เลือกกลุ่มผู้ใช้งาน >>></OPTION> ";
							while ($row1 = $result1->fetch_assoc()){
									$i++;
									if($row1['group_id']==$Group_Id && strlen($row1['group_id'])==strlen($Group_Id)){
										echo   "<OPTION VALUE=\"".iconv("tis-620", "utf-8",$row1['group_id'])."\" selected> $i. ".iconv("tis-620", "utf-8",$row1['group_name'])."</OPTION> ";
									}else{
										echo   "<OPTION VALUE=\"".iconv("tis-620", "utf-8",$row1['group_id'])."\"> $i. ".iconv("tis-620", "utf-8",$row1['group_name'])."</OPTION> ";
									}
								}
								echo '</select>';
							?>
                        </div>
                      </div>
                    </form>
              </div>
            </div>
		</div>
		<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                   <h2>ตารางข้อมูล <small>(แสดงข้อมูลรายการกลุ่มผู้ใช้งาน)</small></h2>
                     <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
                  <div class="x_content">
							<div id="txtabilities"></div>
						</div>
					</div>
				</div>
			</div>

          </div>
        <!-- /page content -->
 <?php
 require_once '../theme/footer.php';
 ?>
 <script type="text/javascript">
<!--
$(document).ready(function(){
			$.post("getabilities.php", {
			}, 
			function(result){	 
				$("#txtabilities").html(result);
			});
		$( "#btnClear").click(function() {
			$("#status_up").val("Up_I");
		});
		$( "#Group_Id").change(function() {
			$.post("getabilities.php", {
				group_id : $("#Group_Id").val()
			}, 
			function(result){	 
				$("#txtabilities").html(result);
				$("#status_up").val("Up_I");
			});
		});
 });
//-->
</script>