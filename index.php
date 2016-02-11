<?php
require("include/db.php");
require("include/auth.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>VC MALATE PMS</title>
		<meta name="description" content="description">
		<meta name="author" content="DevOOPS">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="plugins/bootstrap/bootstrap.css" rel="stylesheet">
		<link href="plugins/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
		<link href="plugins/font-awesome-4.1.0/css/font-awesome.css" rel="stylesheet">
		<!--<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>-->
		<link href="plugins/select2/select2.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
<body>
<!--Start Header-->
<div id="screensaver">
	<canvas id="canvas"></canvas>
	<i class="fa fa-lock" id="screen_unlock"></i>
</div>

<div id="modalbox">
		
	<div class="hidden-xs" style="padding:50px 250px 0px 250px;">
		<div class="devoops-modal-header">
			<div class="modal-header-name">
				<span>Basic table</span>
			</div>
			<div class="box-icons">
				<a class="close-link">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
		<div class="devoops-modal-inner">
		</div>
		<div class="devoops-modal-bottom">
		</div>
	</div>

	<div id="responsive" class="visible-xs" tabindex="-1">
		<div class="devoops-modal-header visible-xs">
			<div class="modal-header-name">
				<span>Basic table</span>
			</div>
			<div class="box-icons">
				<a class="close-link">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
		<div class="devoops-modal-inner">
		</div>
		<div class="devoops-modal-bottom">
		</div> 
	</div>
</div>



<header class="navbar">
	<div class="container-fluid expanded-panel">
		<div class="row">
			<div id="logo" class="col-xs-12 col-sm-2">
				<a href="index.php">VC-PMS</a>
			</div>
			<div id="top-panel" class="col-xs-12 col-sm-10">
				<div class="row">
					<div class="col-xs-8 col-sm-4">
						<a href="#" class="show-sidebar">
						  <i style="font-size:18px;" class="fa fa-bars"></i>
						</a>
						<!--<div id="search">
							<input type="text" placeholder="search"/>
							<i class="fa fa-search"></i>
						</div>-->
					</div>
					<div class="col-xs-4 col-sm-8 top-panel-right">
						<ul class="nav navbar-nav pull-right panel-menu">
							<li class="hidden-xs">
								<a href="index.php" class="modal-link">
									<i class="fa fa-bell"></i>
									<span class="badge">7</span>
								</a>
							</li>
							
							<li class="dropdown">
								<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
									<div class="avatar">
										<img src="img/avatar.jpg" class="img-rounded" alt="avatar" />
									</div>
									<i class="fa fa-angle-down pull-right"></i>
									<div class="user-mini pull-right">
										<span class="welcome">Welcome,</span>
										<span><?php echo $nn; ?></span>
									</div>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="#">
											<i class="fa fa-user"></i>
											<span class="hidden-sm text">Profile</span>
										</a>
									</li>
																		
									<li>
										<a href="ajax/admin.php" class="ajax-link">
											<i class="fa fa-tasks"></i>
											<span class="hidden-sm text">Admin Modules</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-cog"></i>
											<span class="hidden-sm text">Settings</span>
										</a>
									</li>
									<li>
										<a href="logout.php">
											<i class="fa fa-power-off"></i>

											<span class="hidden-sm text">Logout</span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!--End Header-->
<!--Start Container-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<div id="sidebar-left" class="col-xs-2 col-sm-2">
			<ul class="nav main-menu">
				<?php
				// echo $nn . ' loc: ' . $loc . ' grp: ' . $grp . ' ' . $cred; 
					if ($cred==1) {
						print '
							<li class="dropdown">
								<a href="#" class="dropdown-toggle">
									<i class="fa fa-table"></i>
									 <span class="hidden-xs">Employee</span>
								</a>
								<ul class="dropdown-menu">
									<li><a class="ajax-link" href="ajax/masterlist.php"><i class="fa fa-list"></i>&nbsp;Masterlists</a></li>
									<li><a class="ajax-link" href="ajax/users.php"><i class="fa fa-user"></i>&nbsp;Add/Edit Users</a></li>
								</ul>
						</li>';
					}
				
					if ($cred==1 OR $cred==5) {
						print '
							<li class="dropdown">
								<a href="#" class="dropdown-toggle">
									<i class="fa fa-tasks"></i>
									 <span class="hidden-xs">Quality</span>
								</a>

								<ul class="dropdown-menu">
									<li><a class="ajax-link" href="ajax/add_af.php"><i class="fa fa-edit"></i>&nbsp;Add Findings</a></li>
									<li><a class="ajax-link" href="ajax/assesment_findings_compilation.php"><i class="fa fa-table"></i>&nbsp;Findings Compilation</a></li>
									<li><a class="ajax-link" href="ajax/q_admin.php"><i class="fa fa-table"></i>&nbsp;Quality Admin</a></li>
								</ul>
							</li>';
					}
				
					if ($cred==1 OR ($grp==4 AND $cred==4)) {
						print '
							<li class="dropdown">
								<a href="#" class="dropdown-toggle">
									<i class="fa fa-tasks"></i>
									 <span class="hidden-xs">Spot Check</span>
								</a>
								<ul class="dropdown-menu">
									<li><a class="ajax-link" href="ajax/hk_tools.php"><i class="fa fa-table"></i>&nbsp;Add Spot Check Findings</a></li>
								</ul>
							</li>';
					}
				
					
					print '
						<li class="dropdown">
							<a href="#" class="dropdown-toggle">
								<i class="fa fa-tasks"></i>
								 <span class="hidden-xs">HK PMS</span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle">
										<i class="fa fa-money"></i>
										<span class="hidden-xs">Financial Perspectives</span>
									</a>
									<ul class="dropdown-menu">';
										if ($cred==1 OR $grp==6) {
											print '<li><a class="ajax-link" href="ajax/fin_pers.php">&nbsp;&nbsp;&nbsp;Unused PCK</a></li>';
										}
										if ($cred==1 OR $grp==7 ) {
											print '<li><a class="ajax-link" href="ajax/fin_pershk.php">&nbsp;&nbsp;&nbsp;HK Supplies</a></li>';
										}
										if ($cred==1) {
											print '<li><a class="ajax-link" href="ajax/fin_gen.php">&nbsp;&nbsp;&nbsp;Data Generation</a></li>';
										}
					print '				
									</ul>
								</li>';
					
					
						print '<li class="dropdown">
									<a href="#" class="dropdown-toggle">
										<i class="fa fa-users"></i>
										<span class="hidden-xs">Customer Perspective</span>
									</a>
									<ul class="dropdown-menu">';

										if ($cred==1 OR ($grp==4 AND $cred==4) OR $cred==5) {
											print '<li><a class="ajax-link" href="ajax/quality.php">	&nbsp;&nbsp;&nbsp;&nbsp;Quality</a></li>';
										}
										if ($cred!=6) {
											print '<li><a class="ajax-link" href="ajax/cp_mg.php">	&nbsp;&nbsp;&nbsp;&nbsp;MG/TM/FOO</a></li>';
										}
										if ($cred==1) {
											print '<li><a class="ajax-link" href="ajax/cp_gen.php">&nbsp;&nbsp;&nbsp;Data Generation</a></li>';
										}

						print		'</ul>
								</li>';
					
					
						print '<li class="dropdown">
									<a href="#" class="dropdown-toggle">
										<i class="fa fa-trophy"></i>
										<span class="hidden-xs">Internal System</span>
									</a>
									<ul class="dropdown-menu">';
										if ($cred!=6) {
											print '<li><a class="ajax-link" href="ajax/is_iqa.php">		&nbsp;&nbsp;&nbsp;&nbsp;IQA</a></li>';
										}
										if ($cred!=6 AND ($cred!=4 OR $grp==4) ) {
											print '<li><a class="ajax-link" href="ajax/spot.php">	&nbsp;&nbsp;&nbsp;&nbsp;Spot Check Reports</a></li>';
										}
										if ($cred==1) {
											print '<li><a class="ajax-link" href="ajax/is_gen.php">&nbsp;&nbsp;&nbsp;Data Generation</a></li>';
										}		
						print		'</ul>
								</li>';
					

							print'</ul>
							</li>';
					
						if ($cred==1 OR ($cred==4 AND $grp==4)) {
							print '
								<li class="dropdown">
									<a href="#" class="dropdown-toggle">
										<i class="fa fa-tasks"></i>
										 <span class="hidden-xs">QMS</span>
									</a>
									<ul class="dropdown-menu">
										<li><a class="ajax-link" href="ajax/qms_reports.php"><i class="fa fa-table"></i>&nbsp;iQMS Reports</a></li>
									</ul>
								</li>';
						}
				?>
			</ul>
		</div>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
			<div class="preloader">
				<img src="img/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/>
			</div>
			<div id="ajax-content"></div>
		</div>
		<!--End Content-->
	</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="plugins/jquery/jquery-2.1.0.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/wru.js"></script>
<!--<script src="plugins/bootstrap/bootstrap.min.js"></script>-->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!--<script src="plugins/bootstrapvalidator/bootstrapValidator.min.js"></script>-->
<script src="plugins/justified-gallery/jquery.justifiedgallery.min.js"></script>
<script src="plugins/tinymce/tinymce.min.js"></script>
<script src="plugins/tinymce/jquery.tinymce.min.js"></script>
<!--<script src="plugins/bootstrap_datetimepicker_master/src/js/bootstrap-datetimepicker.js"></script>
 All functions for this theme + document.ready processing -->
<script src="js/devoops.js"></script>
<script src="js/pmsfunction.js"></script>
</body>
</html>
