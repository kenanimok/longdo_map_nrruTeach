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
								<i class="fa fa-map-marker fa-lg"></i> เส้น(polyline)
							</button>

							<button type="button" class="btn btn-warning" id="btnMarker2">
								<i class="fa fa-map-marker fa-lg"></i> หลายเหลี่ยม(polygon)
							</button>

							<button type="button" class="btn btn-info" id="btnMarker3">
								<i class="fa fa-map-marker fa-lg"></i> วงกลม(circle)
							</button>

							<button type="button" class="btn btn-success" id="btnMarker4">
								<i class="fa fa-map-marker fa-lg"></i> จุด(Dot)
							</button>

							<button type="button" class="btn btn-secondary" id="btnMarker5">
								<i class="fa fa-map-marker fa-lg"></i> สามเหลี่ยมมีรู(donut)
							</button>

							<button type="button" class="btn btn-danger" id="btnMarker6">
								<i class="fa fa-map-marker fa-lg"></i> สี่เหลี่ยม(rectangle)
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
		map.location({ lon: 100.41, lat: 13.84 }, true);

		
		var locationList = [
				{ lon: 100, lat: 20 },
				{ lon: 100, lat: 6 }
			];
			var geom = new longdo.Polyline(locationList);// เส้น poly line


		var polygon = new longdo.Polygon([
				{ lon: 99, lat: 14 },
				{ lon: 100, lat: 13 },
				{ lon: 102, lat: 13 },
				{ lon: 103, lat: 14 }
			], {
				title: 'Polygon', //Popup title
				detail: '-', //Popup detail
				label: 'Polygon', //Show label
				lineWidth: 2,
				lineColor: 'rgba(0, 0, 0, 1)',
				fillColor: 'rgba(255, 0, 0, 0.4)',
				visibleRange: { min: 7, max: 18 },
				editable: true,
				weight: longdo.OverlayWeight.Top
			});//เส้นpolygon


			var circle = new longdo.Circle({
				lon: 101, lat: 15
				}, 1, {
				title: 'Geom 3',
				detail: '-',
				lineWidth: 2,
				lineColor: 'rgba(255, 0, 0, 0.8)',
				fillColor: 'rgba(255, 0, 0, 0.4)'
				});//	วงกลม


			var dot = new longdo.Dot({
					lon: 100.5, lat: 12.5
					}, {
					lineWidth: 20,
					draggable: true
					});//dot


			var donut = new longdo.Polygon([
					{ lon: 101, lat: 15 },
					{ lon: 105, lat: 15 },
					{ lon: 103, lat: 12 },
					null,
					{ lon: 103, lat: 14.9 },
					{ lon: 102.1, lat: 13.5 },
					{ lon: 103.9, lat: 13.5 }
					], {
					label: true,
					clickable: true
					});	//สามเหลี่ยมรู

			var rectangle = new longdo.Rectangle({
				lon: 97, lat: 17
				}, {
				width: 2, height: 1
				}, {
				editable: true
				});			


		switch(a){
			case 1: map.Overlays.add(geom); // add geometry object;
			break;
			case 2: map.Overlays.add(polygon); // add geometry object
			break;
			case 3: map.Overlays.add(circle); //add geometry object
			break;
			case 4: map.Overlays.add(dot);//dot
			break;
			case 5: map.Overlays.add(donut); //add geometry object
			break;
			case 6: map.Overlays.add(rectangle); //add geometry object
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
	 $('#btnMarker6').click(function(){
		  init(6);
	 });
});
    </script>