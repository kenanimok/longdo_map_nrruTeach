 <?php
 session_start();
 require_once('../theme/header.php');
$timecreate=date_create($_SESSION['time_create']);
$timeupdate=date_create($_SESSION['time_update']);
 ?>
        <!-- page content -->
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
						<div class="table-responsive">
							<table class="table  table-borderless">
							<thead>
								<tr>
									<th style="text-align:center;"><img src="../images/userlogin.png" class="img-rounded" alt=""></th>
							</tr>
							</thead>
							<tbody style="text-align:center;">
								<tr >
									<td><h3><strong>ยินดีต้อนรับ</strong></h3></td>
								</tr>
								<tr>
									<td><i class="fa fa-users fa-5x text-primary"></i></td>
								</tr>
								<tr>
									<td><h5>คุณ<?php echo $_SESSION['fullname'];?></h5></td>
								</tr>
								<tr>
									<td><h5><strong>วันเริ่มใช้งานได้ :</strong> <?php echo date_format($timecreate,"d/m/Y");?></h5></td>
								</tr>
								<tr>
									<td><h5><strong>วันใช้งานล่าสุด : </strong><?php echo date_format($timeupdate,"d/m/Y");?></h5></td> 
								</tr>
							</tbody>
						</table>
                  </div>
                  
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->

			</div>
		</div>
	</div>
   <!-- /page content -->

<?php
 require_once '../theme/footer.php';
 ?>