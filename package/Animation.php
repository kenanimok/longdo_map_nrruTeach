 <?php
 require_once '../theme/header.php';
 include('../library/function/func.datethai.php');
 ?>
      <!-- page content -->
       <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                    <h4>แบบฟอร์ม <small>การแสดง Animation ให้กับ Marker</small></h4>
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
							<div id="map" style="height:400px;"></div>
						  </div>
						</div>
						<hr>
						<div class="form-group text-center">
							<button type="button" class="btn btn-primary" id="btnMarker">
								<i class="fa fa-map-marker fa-lg"></i> ปล่อยหมุด</button>
							<button type="button" class="btn btn-success" id="btnMarker2">
								<i class="fa fa-map-marker fa-lg"></i> หมุดกระเด้ง</button>
							<button type="button" class="btn btn-info" id="btnMarker3">
								<i class="fa fa-map-marker fa-lg"></i> การสั่งหยุดกระเด้ง</button>
							<button type="button" class="btn btn-danger" id="btnMarker4">
								<i class="fa fa-map-marker fa-lg"></i> การเลื่อนหมุด</button>
							<button type="button" class="btn btn-dark" id="btnMarker5">
								<i class="fa fa-map-marker fa-lg"></i> การเลื่อนหมุดตามเส้น</button>								
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
 <script src="https://api.longdo.com/map/?key=3e7b65d5e30c67495db31bb4b322eea5"></script>
<script>
$(document).ready(function(){
		var map;
		var a = 0;
		init();
		function init(a) {
		  map = new longdo.Map({
			placeholder: document.getElementById('map'),
		 });	
		var marker = new longdo.Marker({ lon: 100.643005, lat: 14.525007 });
		map.Overlays.add(marker);

		switch(a){
			 case 1: map.Overlays.drop(marker); 
			 break;
			 case 2: map.Overlays.bounce(marker); 
			 break;
			 case 3: map.Overlays.bounce(null);
			 break;
			 case 4: marker.move({lon:102, lat:18}, true);;
			 break;
			 case 5: map.Overlays.pathAnimation(marker, 
						new longdo.Polyline([
						{ lon: 102, lat: 18 }, 
						{ lon: 98, lat: 17 }, 
						{ lon: 99, lat: 14 }]
						));
			 break;
			 default: map.zoom(6, true);
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