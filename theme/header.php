<?php 
session_start();
include_once "../library/func.common.php";
include_once "../element/config.php";  
$LF = new lib_Function();
$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$dirs = explode('/', $url);
$last_dir = $dirs[count($dirs) - 1];
if(empty($_SESSION['username'])){
	$LF->unno_redirect('./index.php');
}else{
	$resultnum = $con->query('select m.menu_link, m.menu_parent  
													from us_user u 
													inner join us_user_group ug 
													on(ug.group_id = u.group_id) 
													inner join us_menu_group mg
													on(mg.group_id = u.group_id)
													inner join us_menu m
													on(m.menu_id = mg.menu_id)
														and(m.menu_link =  \''.$last_dir.'\')
													where u.user_name = \''.$_SESSION['username'].'\' 
													and u.group_id =\''. $_SESSION['group_id'].'\'');
		$rowcount=mysqli_num_rows($resultnum);
		while (($menubarray = $resultnum->fetch_assoc())) {
			$menuparent = $menubarray['menu_parent'];
			$menulink = $menubarray['menu_link'];
		}
		if($rowcount == 0){
			$LF->unno_redirect('checkuser.php');
		}
}
if(empty($_SESSION['user_image'])){
		$shimg = "img_avatar3.png";
	}else{
		$shimg = $_SESSION['user_image'];
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
   <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap4.min.css">
  <!-- jquery confirm -->
   <link rel="stylesheet" href="../dist/css/jquery-confirm.css">
   <style type="text/css">
	html { height: 100%; }
	body { height: 100%; margin: 0; padding: 0; font: 14px/1.2 Meiryo, Tahoma, sans-serif; }
	.control-label {
	float: left; width: 30%; margin-right: 3%; text-align: right;
 }
</style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="./#">
          <i class="fa fa-sign-out"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="../element/logout.php" class="dropdown-item text-primary">
            <i class="fa fa-sign-out mr-2"></i> ออกจากระบบ
          </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="./#"><i
            class="fa fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index.php" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Longdo map</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../images/personal/<?php echo $shimg?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['username'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
			   <?php
			  // $i_active = 1;
				$result = $con->query("select distinct m.menu_id, 
												m.menu_name, 
												m.menu_link, 
												m.menu_parent, 
												m.menu_icon 
										from us_menu m 
										inner join us_menu_group mg
										on(mg.menu_id = m.menu_id)
										and(mg.group_id='".$_SESSION['group_id']."')
										where m.menu_parent = 0
										order by m.menu_parent, m.menu_order");
while (($menu_barray = $result->fetch_assoc())) {
	if($menuparent == $menu_barray['menu_id']) {
		$in_active = 'active';
		$menu_open = 'menu-open';
	}else{
		$in_active = '';
		$menu_open ='';
	}
?>
		
          <li class="nav-item has-treeview <?php echo $menu_open;?>">
            <a href="#" class="nav-link <?php echo $in_active;?>">
              <i class="nav-icon fa <?php echo $menu_barray['menu_icon'];?>"></i>
              <p>
                <?php echo iconv("tis-620", "utf-8", $menu_barray['menu_name']);?>
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
			<ul class="nav nav-treeview"> 
	<?php
		$result1 = $con->query("select distinct m.menu_id, 
												m.menu_name, 
												m.menu_link, 
												m.menu_parent, 
												m.menu_icon 
										from us_menu m 
										inner join us_menu_group mg
										on(mg.menu_id = m.menu_id) 
										and(mg.group_id='".$_SESSION['group_id']."')
										where m.menu_parent = '".$menu_barray['menu_id']."'
										order by m.menu_parent, m.menu_order");
				while (($menu_barray1 = $result1->fetch_assoc())) {
		?>
			 <li class="nav-item">
			 <?php
				if($last_dir == $menu_barray1['menu_link']){
					$in_active = 'active';
				}else{
					$in_active = '';
				}
			?>
				<a href="<?php echo $menu_barray1['menu_link'];?>" class="nav-link <?php echo $in_active;?>">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-dot-circle-o fa-md"></i>&nbsp;
                  <p><?php echo iconv("tis-620", "utf-8", $menu_barray1['menu_name']);?></p>
                </a>
			</li>
<?php
			}
		echo '</ul>';
	echo '</li>';
	$i_active++;
}
?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid"> <!-- /begin .container-fluid -->
        