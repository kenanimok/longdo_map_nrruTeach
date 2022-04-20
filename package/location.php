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
					 	<div class="row">
						  <div class="form-group col-lg-7 col-md-7">
							<div id="map" style="height:600px;"></div>
						  </div>
						   <div class="form-group col-lg-5 col-md-5">
						     <!-- ############################ -->
							 <div class="form-group">
								<ul class="list-group">
									<li class="list-group-item list-group-item-primary">
										<strong>แบบระบุพิกัด (Custom location)</strong>
									</li>
									<li class="list-group-item">map.location({ lon:100, lat:16 }, true);</li>
									<li class="list-group-item text-center">
										<button type="button" class="btn btn-primary" id="btnLCT"><i class="fa fa-map-marker fa-lg"></i> ไปที่พิกัด [100, 13]</button>
									</li>
								</ul>
							 </div>
							 <!-- ############################ -->
							 <div class="form-group">
								<ul class="list-group">
									<li class="list-group-item list-group-item-success">
										<strong>ไปยังตำแหน่งปัจจุบัน (Geolocation)</strong>
									</li>
									<li class="list-group-item">map.location(longdo.LocationMode.Geolocation);</li>
									<li class="list-group-item text-center">
										<button type="button" class="btn btn-success" id="btnGLCT"><i class="fa fa-map-marker fa-lg"></i> ไปยังตำแหน่งปัจจุบัน</button>
									</li>
								</ul>
							 </div>
							 <!-- ############################ -->
							 <div class="form-group">
								<ul class="list-group">
									<li class="list-group-item list-group-item-warning">
										<strong>แบบระบุพิกัด (Custom location)</strong>
									</li>
									<li class="list-group-item">var result = map.location();</li><li class="list-group-item text-left">
										<div id="getLocation"></div>
									</li>
								</ul>
							 </div>
 							 <!-- ############################ -->
							 <div class="form-group">
								<ul class="list-group">
									<li class="list-group-item list-group-item-danger">
										<strong>ไปยังตำแหน่งปัจจุบัน (Geolocation)</strong>
									</li>
									<li class="list-group-item">
										var result = map.location(longdo.LocationMode.Pointer);
									</li>
									<li class="list-group-item text-left"><div id="getPointer"></div></li>
								</ul>
							 </div>
						   </div>
						 </div>
						</div>
						<hr>
						<div class="form-group">
							
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
		switch(a){
			 case 1: map.location({ lon:100.49388471913528, lat:13.749072541284509 }, true); // go to 13.749072541284509, 100.49388471913528
			 break;
			 case 2: map.location(longdo.LocationMode.Geolocation); // go to 102, 15 when created map
			 break;
			 default: map.location({ lon:100, lat:16 }, true);
		}
	 }

	$('#btnLCT').click(function(){
    	init(1);
	});

	$('#btnGLCT').click(function(){
		init(2);
	});

	$('#map').mousemove(function(){
    var result = map.location();
    	$('#getLocation').html("Result => lon: "+ 
        result['lon'] + ", lat:"+ result['lat']);
	});

	$('#map').mousemove(function(){
    	var result = map.location(longdo.LocationMode.Pointer);
    	$('#getPointer').html("Result => lon: "+ result['lon'] + ", lat:"+ result['lat']);
	});


});
    </script>