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
							<div id="map" style="height:500px;"></div>
						  </div>
						</div>
						<hr>
						<div class="form-group text-center">
							<button type="button" class="btn btn-primary" id="btnMarker">
								<i class="fa fa-map-marker fa-lg"></i> สร้างหมุด</button>

							<button type="button" class="btn btn-success" id="btnMarker3">
								<i class="fa fa-map-marker fa-lg"></i> แบบตั้งค่าเอง</button>

							<button type="button" class="btn btn-info" id="btnMarker4">
								<i class="fa fa-map-marker fa-lg"></i> แบบเขียนโค้ด html เอง</button>

							<button type="button" class="btn btn-dark" id="btnMarker5">
								<i class="fa fa-map-marker fa-lg"></i> แบบกำหนดทิศให้หมุด</button>
						
							<button type="button" class="btn btn-danger" id="btnDelMarker">
								<i class="fa fa-map-marker fa-lg"></i> ลบหมุด</button>
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
		var r = 0;
		var marker = new longdo.Marker({ lon: 100.56, lat: 13.74 });

		var marker1 = new longdo.Marker({ lon: 101.2, lat: 12.8 },
			{
			title: 'Marker',
			icon: {
				url: '../images/pin_mark.png',
				offset: { x: 12, y: 45 }
			},
			detail: 'Drag me',
			visibleRange: { min: 7, max: 9 },
			draggable: true,
			weight: longdo.OverlayWeight.Top,
			});

		var marker2 = new longdo.Marker({ lon: 99.35, lat: 14.25 },
			{
			title: 'Custom Marker',
			icon: {
				html: '<i class="fa fa-home" style="font-size:48px;color:red"></i>',
				offset: { x: 12, y: 45 }
			},
			popup: {
				html: '<div style="background: #eeeeff;">popup</div>'
			},
			draggable: true,
			});


		init();
		function init(a) {
		  map = new longdo.Map({
			placeholder: document.getElementById('map'),
		 });

		 var marker3 = new longdo.Marker({ lon: 100.41, lat: 13.84 },
			{ title: 'Rotate Marker',
			rotate:r
			});

		map.location({ lon: 100.56, lat: 13.74 }, true);
		switch(a){
			 case 1: map.Overlays.add(marker); 
			 break;
			 case 2: map.Overlays.remove(marker); 
			 break;
			 case 3: map.Overlays.add(marker1); 
			 break;
			 case 4: map.Overlays.add(marker2); 
			 break;
			 case 5: map.Overlays.add(marker3); 
			 break;
			 default: map.zoom(7, true);
		}
	 }
	 $('#btnMarker').click(function(){
		  init(1);
	 });

	 $('#btnDelMarker').click(function(){
		  init(2);
	 });

	 $('#btnMarker3').click(function(){
		  init(3);
	 });

	 $('#btnMarker4').click(function(){
		  init(4);
	 });

	 $('#btnMarker5').click(function(){
		  r += 30;
		  init(5);
	 });

});
    </script>