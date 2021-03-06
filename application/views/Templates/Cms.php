<?php
if(!$this->session->userdata('verified')){

	$date = strtotime($this->session->userdata('created_at'));
	$suspend_date = date('Y-m-d', strtotime('+30 days', strtotime($this->session->userdata('created_at'))));

	$Expired = $this->settingvalue_library->IntervalDays(date('Y-m-d'), $suspend_date);
}
else {
	$Expired = null;
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="JobSribe.Com, Lowongan Kerja Terbaru Setai Hari dari Segala Bidang Pekerjaan & Lokasi Kerja">
    <meta name="keywords" content="">
    <meta name="theme-color" content="#4db8fe">
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="<?= $this->config->item('assets_url') ?>Company/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<link href="<?= $this->config->item('assets_url') ?>Company/plugins/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?= $this->config->item('assets_url') ?>Company/plugins/font-awesome/5.0/css/fontawesome-all.min.css" rel="stylesheet" />
	<link href="<?= $this->config->item('assets_url') ?>Company/plugins/animate/animate.min.css" rel="stylesheet" />
	<link href="<?= $this->config->item('assets_url') ?>Company/css/default/style.min.css" rel="stylesheet" />
	<link href="<?= $this->config->item('assets_url') ?>Company/css/default/style-responsive.min.css" rel="stylesheet" />
	<link href="<?= $this->config->item('assets_url') ?>Company/css/default/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="<?= $this->config->item('assets_url') ?>Company/plugins/jquery-jvectormap/jquery-jvectormap.css" rel="stylesheet" />
	<link href="<?= $this->config->item('assets_url') ?>Company/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="<?= $this->config->item('assets_url') ?>Company/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
<!-- 	<script src="<?= $this->config->item('assets_url') ?>Company/plugins/pace/pace.js"></script> -->	
	<!-- ================== END BASE JS ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar-default">
			<!-- begin navbar-header -->
			<div class="navbar-header">
				<a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> <b>AR LIZO</b> Admin</a>
				<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- end navbar-header -->
			
			<!-- begin header-nav -->
			<ul class="navbar-nav navbar-right">
<!-- 				<li>
					<form class="navbar-form">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Enter keyword" />
							<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</li> -->
				<li class="dropdown">
				<?php if($Expired != null) { ?>
					<a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
						<i class="fa fa-exclamation-triangle"></i>
						<span class="label bg-red"><?= $Expired ?> days</span>
					</a>
					<ul class="dropdown-menu media-list dropdown-menu-right">
						<li class="dropdown-header">Verifikasi Akun</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<i class="fa fa-bug media-object bg-red"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading">Segera lakukan verifikasi akun
									 <i class="fa fa-exclamation-triangle text-danger"></i></h6>
									<div class="text-muted f-s-11"> <?= $Expired ?> hari sebelum di suspen</div>
								</div>
							</a>
						</li>
						<li class="dropdown-footer text-center">
							<a href="<?= base_url('Cms/sendverifikasi') ?>">Kirim Verifikasi Akun</a>
						</li>
					</ul>
				<?php } else { ?>
					<a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
						<i class="fa fa-check text-primary"></i>						
						<span class="label bg-blue">terverifikasi</span>
					</a>
					<ul class="dropdown-menu media-list dropdown-menu-right">
						<li class="dropdown-header">Verifikasi Akun Sukses</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<i class="fa fa-check media-object bg-blue"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading">Akun masih aktif
									 <i class="fa fa-check text-primary"></i></h6>
									<div class="text-muted f-s-11">terverifikasi</div>
								</div>
							</a>
						</li>
					</ul>
				<?php } ?>
				</li>
				<li class="dropdown">
					<a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
						<i class="fa fa-bell text-success"></i>
						<span class="label">5</span>
					</a>
					<ul class="dropdown-menu media-list dropdown-menu-right">
						<li class="dropdown-header">NOTIFICATIONS (5)</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<i class="fa fa-bug media-object bg-silver-darker"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading">Server Error Reports <i class="fa fa-exclamation-circle text-danger"></i></h6>
									<div class="text-muted f-s-11">3 minutes ago</div>
								</div>
							</a>
						</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<img src="<?= $this->config->item('assets_url') ?>Company/img/user/user-1.jpg" class="media-object" alt="" />
									<i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading">John Smith</h6>
									<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
									<div class="text-muted f-s-11">25 minutes ago</div>s
								</div>
							</a>
						</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<img src="<?= $this->config->item('assets_url') ?>Company/img/user/user-2.jpg" class="media-object" alt="" />
									<i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading">Olivia</h6>
									<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
									<div class="text-muted f-s-11">35 minutes ago</div>
								</div>
							</a>
						</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<i class="fa fa-plus media-object bg-silver-darker"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading"> New User Registered</h6>
									<div class="text-muted f-s-11">1 hour ago</div>
								</div>
							</a>
						</li>
						<li class="media">
							<a href="javascript:;">
								<div class="media-left">
									<i class="fa fa-envelope media-object bg-silver-darker"></i>
									<i class="fab fa-google text-warning media-object-icon f-s-14"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading"> New Email From John</h6>
									<div class="text-muted f-s-11">2 hour ago</div>
								</div>
							</a>
						</li>
						<li class="dropdown-footer text-center">
							<a href="javascript:;">View more</a>
						</li>
					</ul>
				</li>
				<li class="dropdown navbar-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?= $this->config->item('assets_url') ?>Company/img/user/user-13.jpg" alt="" /> 
						<span class="d-none d-md-inline"><?= $this->session->userdata('Unique_user') ?></span> 
						<b class="caret"></b>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="<?= base_url('Cms/profile/'.$this->session->userdata('Unique_user')) ?>" class="dropdown-item">Edit Profile</a>
						<a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span> Inbox</a>
						<a href="javascript:;" class="dropdown-item">Calendar</a>
						<a href="javascript:;" class="dropdown-item">Setting</a>
						<div class="dropdown-divider"></div>
						<a href="<?= base_url("Auth/Logout") ?>" class="dropdown-item">Log Out</a>
					</div>
				</li>
			</ul>
			<!-- end header navigation right -->
		</div>
		<!-- end #header -->

		<!--  Sidebar  -->
		<div id="sidebar" class="sidebar">
		<?php $this->load->view('Templates/_Sidebar') ?>
		</div>
		<div class="sidebar-bg"></div>
		<!-- End Sidebar -->

		<!--- Content  -->
		<?=  $contents;?>
		<?= $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
		<!--- End Content -->

<!-- begin theme-panel -->
        <div class="theme-panel">
            <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
            <div class="theme-panel-content">
                <h5 class="m-t-0">Color Theme</h5>
                <ul class="theme-list clearfix">
                    <li class="active"><a href="javascript:;" class="bg-green" data-theme="default" data-theme-file="<?= $this->config->item('assets_url') ?>Company/css/default/theme/default.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-red" data-theme="red" data-theme-file="<?= $this->config->item('assets_url') ?>Company/css/default/theme/red.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-blue" data-theme="blue" data-theme-file="<?= $this->config->item('assets_url') ?>Company/css/default/theme/blue.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-theme-file="<?= $this->config->item('assets_url') ?>Company/css/default/theme/purple.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-orange" data-theme="orange" data-theme-file="<?= $this->config->item('assets_url') ?>Company/css/default/theme/orange.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-black" data-theme="black" data-theme-file="<?= $this->config->item('assets_url') ?>Company/css/default/theme/black.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
                </ul>
                <div class="divider"></div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Header Styling</div>
                    <div class="col-md-7">
                        <select name="header-styling" class="form-control form-control-sm">
                            <option value="1">default</option>
                            <option value="2">inverse</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Header</div>
                    <div class="col-md-7">
                        <select name="header-fixed" class="form-control form-control-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Styling</div>
                    <div class="col-md-7">
                        <select name="sidebar-styling" class="form-control form-control-sm">
                            <option value="1">default</option>
                            <option value="2">grid</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Sidebar</div>
                    <div class="col-md-7">
                        <select name="sidebar-fixed" class="form-control form-control-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Gradient</div>
                    <div class="col-md-7">
                        <select name="content-gradient" class="form-control form-control-sm">
                            <option value="1">disabled</option>
                            <option value="2">enabled</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Content Styling</div>
                    <div class="col-md-7">
                        <select name="content-styling" class="form-control form-control-sm">
                            <option value="1">default</option>
                            <option value="2">black</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-12">
                        <a href="javascript:;" class="btn btn-inverse btn-block btn-sm" data-click="reset-local-storage">Reset Local Storage</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end theme-panel -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- Modal Login  -->
	<div id="myLogin" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Login</h4>
	      </div>
	      <div class="modal-body">
	        <p>Sebagai Kandidat <a  href="<?= base_url("login/candidate") ?>">disini</a>.</p>
	        <p>Sebagai Perusahaan <a  href="<?= base_url("login/company") ?>">disini</a>.</p>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
	<!--- End Modal Login  -->
	<!--- MOdal -->
	  <div id="modal-msg" class="modal" tabindex="-5">
	        <div class="modal-dialog">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <button type="button" class="close" data-dismiss="modal">&times;</button>
	                        <h4 class="blue bigger" id="title-message"></h4>
	                </div>
	                <div class="modal-body" id="content-message">
	                </div>
	                    <div class="modal-footer wizard-actions">
	                        <button type="submit" data-dismiss="modal" class="btn btn-sm btn-primary btn-round">
	                                Close
	                            <i class="ace-icon fa fa-times"></i>
	                        </button>
	                    </div>
	            </div>
	        </div>
	    </div>
	<!-- End Modal --> 

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= $this->config->item('assets_url') ?>Company/plugins/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?= $this->config->item('assets_url') ?>Company/plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="<?= $this->config->item('assets_url') ?>Company/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
	<!--[if lt IE 9]>
		<script src="<?= $this->config->item('assets_url') ?>Company/crossbrowserjs/html5shiv.js"></script>
		<script src="<?= $this->config->item('assets_url') ?>Company/crossbrowserjs/respond.min.js"></script>
		<script src="<?= $this->config->item('assets_url') ?>Company/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?= $this->config->item('assets_url') ?>Company/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?= $this->config->item('assets_url') ?>Company/plugins/js-cookie/js.cookie.js"></script>
	<script src="<?= $this->config->item('assets_url') ?>Company/js/theme/default.min.js"></script>
	<script src="<?= $this->config->item('assets_url') ?>Company/js/apps.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?= $this->config->item('assets_url') ?>Company/plugins/gritter/js/jquery.gritter.js"></script>
	<script src="<?= $this->config->item('assets_url') ?>Company/plugins/flot/jquery.flot.min.js"></script>
	<script src="<?= $this->config->item('assets_url') ?>Company/plugins/flot/jquery.flot.time.min.js"></script>
	<script src="<?= $this->config->item('assets_url') ?>Company/plugins/flot/jquery.flot.resize.min.js"></script>
	<script src="<?= $this->config->item('assets_url') ?>Company/plugins/flot/jquery.flot.pie.min.js"></script>
	<script src="<?= $this->config->item('assets_url') ?>Company/plugins/sparkline/jquery.sparkline.js"></script>
	<script src="<?= $this->config->item('assets_url') ?>Company/plugins/jquery-jvectormap/jquery-jvectormap.min.js"></script>
	<script src="<?= $this->config->item('assets_url') ?>Company/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="<?= $this->config->item('assets_url') ?>Company/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?= $this->config->item('assets_url') ?>Company/js/demo/dashboard.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			Dashboard.init();
			
		});
	</script>
	<script type="text/javascript">
		    jQuery(function($) {

			    $(document).ready(function(){
				    var thehours = new Date().getHours();
					var themessage;
					var morning = ('Pagi');
					var afternoon = ('Sore');
					var evening = ('Malam');
					var flag;

					if (thehours >= 0 && thehours < 11) {

						themessage = morning;

						flag = 'fa-cloud'; 

				  	} else if (thehours >= 11 && thehours < 15) {

				    	themessage = 'Siang';

				    	flag = 'fa-certificate  yellow';

					} else if (thehours >= 15 && thehours < 18) {

						themessage = afternoon;

						flag = 'fa-certificate  orange';

					} else if (thehours >= 18 && thehours < 24) {

						themessage = evening;

						flag = 'fa-circle';

					}

					//$('#flag').addClass("fa fa-flag "+flag);
					$('#greeting').append(themessage);


				    var msg = $("#message").val();
				        if(msg == 'verified'){
							$("#title-message").append('Mohon lakukan verifikasi Akun');
							$("#content-message").append('<h3>Jika belum mendapatkan notifikasi verifikasi di Email, silahkan tekan tombol kirim verifikasi dibawah ini</h3>'+
								'<a href="<?= base_url('Cms/sendverifikasi') ?>">Kirim Verifikasi Akun</a>');
				   			$("#modal-msg").modal("show");
				       	}
				       	else if (msg == 'sendverified') {
							$("#title-message").append('Verifikasi telah dikirim');
							$("#content-message").append("<h2 style='text-align: justify;'>Silahkan cek email Anda</h2>");
				   			$("#modal-msg").modal("show");
				       	}
				});
			});
    	</script>
</body>
</html>
