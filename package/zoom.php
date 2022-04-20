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
										<strong>การซูมแผนที่ระดับ 14 (Zoom 14)</strong></li>
									<li class="list-group-item">map.zoom(14, true);</li>
									<li class="list-group-item text-center">
										<button type="button" class="btn btn-primary" id="btnZoomLevel"><i class="fa fa-map-marker fa-lg"></i> ซูมระดับ 14
									</li>
									</ul>
								</div>
								<!-- ############################ -->
								<div class="form-group">
									<ul class="list-group">
									<li class="list-group-item list-group-item-success">
										<strong>ซูมเข้า (Zoom in)</strong></li>
									<li class="list-group-item">map.zoom(true, true);</li>
									<li class="list-group-item text-center">
										<button type="button" class="btn btn-success" id="btnZoomIn"><i class="fa fa-search-plus fa-lg"></i> ซูมเข้า</button>
									</li>
									</ul>
								</div>
								<!-- ############################ -->
								<div class="form-group">
									<ul class="list-group">
									<li class="list-group-item list-group-item-warning">
										<strong>ซูมออก (Zoom out)</strong></li>
									<li class="list-group-item">map.zoom(false, true);</li>
									<li class="list-group-item text-center">
										<button type="button" class="btn btn-success" id="btnZoomOut"><i class="fa fa-search-minus fa-lg"></i> ซูมออก</button>
									</li>
									</ul>
								</div>
 								<!-- ############################ -->
								<div class="form-group">
									<ul class="list-group">
									<li class="list-group-item list-group-item-danger">
										<strong>วิธีการแสดงระดับซการซูมปัจจุบัน</strong></li>
									<li class="list-group-item">var result = map.zoom();</li>
									<li class="list-group-item text-left">
										<div id="getLevelZoom"></div>
									</li>
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
		var i = 14;
		init();
		function init(a) {
		  map = new longdo.Map({
			placeholder: document.getElementById('map'),
		  });
		switch(a){
			 case 1: map.zoom(14, true); 
			 break;
			 case 2: map.zoom(i, true); 
			 break;
			 case 3: map.zoom(i, true); 
			 break;
			 default: map.location({ lon:100.49388471913528, lat:13.749072541284509 }, true);
		}
		var result = map.zoom();
		$('#getLevelZoom').html("Result => "+ result);
	 }

	$('#btnZoomLevel').click(function(){
		init(1);
	});

	$('#btnZoomIn').click(function(){
     	if(i < 20)i++;
		 init(2);
	});

	$('#btnZoomOut').click(function(){
		if(i > 1)i--;
		init(3);
	});

});
</script>