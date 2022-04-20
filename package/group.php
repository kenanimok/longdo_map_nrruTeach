 <?php
 require_once '../theme/header.php';
 include('../library/function/func.datethai.php');
 ?>
        <!-- page content -->
       <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                    <h4>แบบฟอร์ม <small>(สำหรับจัดการข้อมูลกลุ่มผู้ใช้งาน)</small></h4>
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
					<div id="txtalert"></div>
                    <form id="frm-basic" data-parsley-validate class="form-horizontal form-label-left">
					 <div class="card-body">
						<input type="hidden" name="status_up" id="status_up">
						<input type="hidden" name="group_id" id="group_id">
                      <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">ชื่อกลุ่มผู้ใช้งาน :
                        </label>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                          <input type="text" id="group_name" class="form-control ">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">คำอธิบาย (ถ้ามี) :
                        </label>
                        <div class="col-md-8 col-sm-12 col-xs-12">
						<textarea  class="form-control  " rows="5" id="group_detail"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">วันที่เพิ่ม/แก้ไข :</label>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                          <input id="group_time" class="form-control " type="text" name="group_time" value="<?php echo iconv("tis-620", "utf-8",unno_sql_datetimes(date("Y-m-d H:i:s"),false));?>" readonly>
                        </div>
                      </div>
					  <hr>
                      <div class="form-group text-center">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <button class="btn btn-primary" id="btnSave" type="button"><i class="fa fa-save"></i> จัดเก็บ</button>
						  <button class="btn btn-warning" id="btnClear" type="reset"><i class="fa fa-refresh"></i> ล้างข้อมูล</button>
                        </div>
                      </div>

                    </form>

			       <div class="clearfix"></div>
              </div>
            </div>

		 <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                    <h4>ตารางข้อมูล <small>(แสดงข้อมูลกลุ่มผู้ใช้งาน)</small></h4>
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
							<div id="txtgroup"></div>
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
			$("#status_up").val("Up_I");
			$.post("getgroup.php", {
			}, 
			function(result){	 
				$("#txtgroup").html(result);
			});
		$( "#btnClear").click(function() {
			$("#status_up").val("Up_I");
		});
		$( "#btnSave").click(function() {
			$.post("getgroupsave.php", {
				group_id : $("#group_id").val(),
				group_name : $("#group_name").val(),
				group_detail : $("#group_detail").val(),
				group_up: $("#status_up").val()
			}, 
			function(result){	 
				$("#txtalert").html(result);
				$("#status_up").val("Up_I");
			});
		});
 });
//-->
</script>