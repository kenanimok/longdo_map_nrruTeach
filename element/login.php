<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="plugins/font-awesome/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="plugins/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="plugins/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="plugins/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="plugins/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="plugins/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="dist/css/util.css">
	<link rel="stylesheet" type="text/css" href="dist/css/main.css">
<!--===============================================================================================-->
  <link rel="stylesheet" href="dist/css/jquery-confirm.css">
<!--===============================================================================================-->
<style>
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url("images/bg_desktop.jpg");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.loader{
    width: 70px;
    height: 70px;
    margin: 40px auto;
}
.loader p{
    font-size: 16px;
    color: #777;
}
.loader .loader-inner{
    display: inline-block;
    width: 15px;
    border-radius: 15px;
    background: #74d2ba;
}
.loader .loader-inner:nth-last-child(1){
    -webkit-animation: loading 1.5s 1s infinite;
    animation: loading 1.5s 1s infinite;
}
.loader .loader-inner:nth-last-child(2){
    -webkit-animation: loading 1.5s .5s infinite;
    animation: loading 1.5s .5s infinite;
}
.loader .loader-inner:nth-last-child(3){
    -webkit-animation: loading 1.5s 0s infinite;
    animation: loading 1.5s 0s infinite;
}
@-webkit-keyframes loading{
    0%{
        height: 15px;
    }
    50%{
        height: 35px;
    }
    100%{
        height: 15px;
    }
}
@keyframes loading{
    0%{
        height: 15px;
    }
    50%{
        height: 35px;
    }
    100%{
        height: 15px;
    }
}
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100 bg"> 
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						การสร้างแผนที่พื้นฐาน
					</span>
				</div>

				<form class="login100-form validate-form">
					<div class="wrap-input100 validate-input m-b-26" data-validate="กรุณาป้อนชื่อผู้ใช้งาน">
						<span class="label-input100">ชื่อผู้ใช้</span>
						<input class="input100" type="text"  id="login_user" placeholder="">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "กรุณาป้อนรหัสผ่าน">
						<span class="label-input100">รหัสผ่าน</span>
						<input class="input100" type="password"  id="login_pass" placeholder="">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button type="button" class="login100-form-btn" id="btn_login">
							เข้าสู่ระบบ
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="plugins/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="plugins/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="plugins/bootstrap/js/popper.js"></script>
	<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="plugins/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="plugins/daterangepicker/moment.min.js"></script>
	<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="plugins/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="dist/js/main.js"></script>
<!--===============================================================================================-->
	<script src="dist/js/jquery-confirm.js"></script>

</body>
</html>

<script type="text/javascript">
	<!--
	$( document ).ready(function() {
		$( "#btn_login" ).click(function() {
			$('#btn_login').prop('disabled', true);
			$("#btn_login").html('<i class="fa fa-spinner fa-spin text-danger"></i> Loading..').button('refresh');
			$.post("element/getuser.php", { 
				login_user :  $("#login_user").val(), 
				login_pass :  $("#login_pass").val()
			}, 
			function(result){	
				if(result.length != 61){
					$('#btn_login').prop('disabled', false);
					$("#btn_login").html('<i class="fa fa-sign-in"></i> เข้าสู่ระบบ').button('refresh');
					$.alert({
						icon: 'fa fa-warning',
						title: '<font color="red"><strong>มีข้อผิดพลาดเกิดขึ้น !</strong></font>',
						content: result,
						type: 'red',
						typeAnimated: true,
							 buttons: {
								tryAgain: {
									text: 'ตกลง',
									btnClass: 'btn-red',
									action: function(){
										//window.parent.location.assign("index.php");
										//location.reload();
								 }
							}
						},
						columnClass: 'medium',
					});
				}else{
					location.reload();
				}
			});
		});
		$(document).keypress(function(e) {
			if(e.which == 13) {
				$("#btn_login").click();
			}
		});
	});
	//-->
 </script>

