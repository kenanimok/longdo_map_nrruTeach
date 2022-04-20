 <?php
 require_once '../theme/header.php';
 include('../library/function/func.datethai.php');
 ?>
      <!-- page content -->
       <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                    <h4>แบบฟอร์ม <small>(การสร้างแผนที่พื้นฐาน)</small></h4>
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
                   <form id="CreateBasicMap" class="form-horizontal">
					 <div class="card-body">
						  <div class="form-group">
							<div id="map" style="height:500px;"></div>
						  </div>
							
						</div>
						<hr>
						<div class="form-group text-center">
							<button type="button" class="btn btn-primary" id="btn-primary">สร้างแผนที่พื้นฐาน</button>
							<button type="button" class="btn btn-success" id="btn-success">แผนที่ปกติ (ภาษาไทย)</button>
							<button type="button" class="btn btn-info" id="btn-info">แผนที่ปกติ (ภาษาอังกฤษ)</button>
							<button type="button" class="btn btn-secondary" id="btn-secondary">แผนที่สีเทา</button>
							<button type="button" class="btn btn-danger" id="btn-danger">แผนที่การปกครอง</button>	
							<button type="button" class="btn btn-warning" id="btn-warining">แผนที่สถานที่</button>
							<button type="button" class="btn btn-dark" id="btn-dark">แผนที่กลับด้าน</button>
						</div>
					</form>
						<!--  -->
						</div>
					</div>
				</div>
			</div>
        <!-- /page content -->
 <?php
 require_once '../theme/footer.php';
 ?>
 <script type="text/javascript" src="https://api.longdo.com/map/?key=3e7b65d5e30c67495db31bb4b322eea5"></script>
<script>
$(document).ready(function(){
		var map;
		var a = 0;
		init();
		function init(a) {
		  map = new longdo.Map({
			placeholder: document.getElementById('map'),
		  });
		  switch(a) {
			 case 1:
				map.Layers.setBase(longdo.Layers.NORMAL);
				break;
			case 2:
				map.Layers.setBase(longdo.Layers.NORMAL_TH);
				break;
			case 3:
				map.Layers.setBase(longdo.Layers.NORMAL_EN); 
				break;
			case 4:
				map.Layers.setBase(longdo.Layers.GRAY);
				break;
			case 5:
				map.Layers.setBase(longdo.Layers.POLITICAL);
				break; 
			case 6: 
				map.Layers.setBase(longdo.Layers.POI);
				break;
			case 7:
				map.Layers.setBase(longdo.Layers.REVERSE);
				break;
			 default: map.Layers.setBase(longdo.Layers.NORMAL);
		}  
	 }
	$( "#btn-primary").click(function() {
		init(1);
	});
	$( "#btn-success").click(function() {
		init(2);
	});
	$( "#btn-info").click(function() {
		init(3);
	});
	$( "#btn-warining").click(function() {
		init(4);
	});
	$( "#btn-danger").click(function() {
		init(5);
	});
	$( "#btn-secondary").click(function() {
		init(6);
	});
	$( "#btn-dark").click(function() {
		init(7);
	});
});
    </script>