 <?php
 require_once '../theme/header.php';
 include('../library/function/func.datethai.php');
 ?>
      <!-- page content -->
       <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                    <h4>แบบฟอร์ม <small>การสร้างหมุด (Marker)</small></h4>
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
					 	<div class="row">
						  <div class="form-group col-lg-12 col-md-12">
							<div id="map" style="height:600px;"></div>
						  </div>
						</div>
						<hr>
						<div class="form-group text-center">
							<!-- สร้าง ปุ่มเพื่อใช้งาน -->

							<button type="button" class="btn btn-primary" id="btnMarker">
								<i class="fa fa-map-marker fa-lg"></i> นครรราชสีมา
							</button>

							<button type="button" class="btn btn-warning" id="btnMarker2">
								<i class="fa fa-map-marker fa-lg"></i> อีสานตอนล่าง
							</button>

							<button type="button" class="btn btn-info" id="btnMarker3">
								<i class="fa fa-map-marker fa-lg"></i> อำเภอจังหวัดนครราชสีมา 
							</button>

							<button type="button" class="btn btn-success" id="btnMarker4">
								<i class="fa fa-map-marker fa-lg"></i> ห้วยขาแข้ง
							</button>

							<button type="button" class="btn btn-danger" id="btnMarker5">
								<i class="fa fa-map-marker fa-lg"></i> clear
							</button>

						





							<!-- ######################## -->
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
		map.location({ lon: 102.05, lat: 14.94 }, true);

		var object1 = new longdo.Overlays.Object('30', 'IG');//นครราชสีมา

		var object2 = new longdo.Overlays.Object('3_', 'IG');//อีสาน

		var object3 = new longdo.Overlays.Object('30__', 'IG');

		var object4 = new longdo.Overlays.Object('610604;610607;610703;610704;610802', 'IG', {
			combine: true,
			simplify: 0.00005,
			ignorefragment: false
			});
		switch(a){
			 case 1: map.Overlays.load(object1);
			 break;
			 case 2:map.Overlays.load(object2); 
			 break;
			 case 3:map.Overlays.load(object3); 
			 break;
			 case 4:map.Overlays.load(object4); 
			 break;
			 case 5:map.Overlays.clear(); 
			 break;
			 default: map.zoom(7, true);
		}
	 }
	 $('#btnMarker').click(function(){
		  init(1);
	 });

	 $('#btnMarker2').click(function(){
		  init(2);
	 });

	 $('#btnMarker3').click(function(){
		  init(3);
	 });

	 $('#btnMarker4').click(function(){
		  init(4);
	 });

	 $('#btnMarker5').click(function(){
		  init(5);
	 });
	
});
    </script>