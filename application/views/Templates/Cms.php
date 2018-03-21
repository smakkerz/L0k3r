<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<link rel="shorcut icon" href="<?php echo base_url(); ?>Assets/images/logo.png" />

		<meta name="title" content="why" />
		<meta name="images" content="<?php echo base_url(); ?>Assets/images/ucac.jpg" />
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url()?>Assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>Assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>Assets/css/greeting.css" />

		<!-- page specific plugin styles -->

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url()?>Assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url()?>sAssets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<script src="<?php echo base_url()?>Assets/js/jquery-2.1.4.min.js"></script>

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo base_url()?>Assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?php echo base_url()?>Assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?php echo base_url()?>Assets/js/html5shiv.min.js"></script>
		<script src="<?php echo base_url()?>Assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="<?= base_url('home') ?>" class="navbar-brand">
						<small>
							<img src="<?php echo base_url(); ?>Assets/images/logo.png" class="img-circle" style="background-color: white;" width="29px"> JobSribe
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<img src="<?php echo base_url(); ?>Assets/images/logo.png" class="img-circle" width="22px">
								<span class="user-info">
									<small id="greeting"></small>,
									<?=ucfirst($this->session->userdata('name')) ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="<?= base_url('reset.py') ?>">
										<i class="ace-icon fa fa-lock"></i>
										Ganti Password
									</a>
								</li>

								<li>
									<a href="<?= base_url('profil.py') ?>">
										<i class="ace-icon fa fa-user"></i>
										Profil
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?= base_url('Auth/Logout') ?>">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<div id="sidebar" class="sidebar responsive ace-save-state">

				<?php $this->load->view('Templates/_Sidebar') ?>

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>
            <div class="main-content">
                <div class="main-content-inner">
	                <div class="breadcrumbs" id="breadcrumbs">
	                	<?php $this->load->view('Templates/_Mini_menu') ?>
					</div>
					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->
						<?=  $contents;?>
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-10">
						<!-- <a href="https://github.com/smakkerz" target="blank">
								<i class="ace-icon fa fa-github-square light-blue  bigger-150"></i>
							</a> -->
							<a href="https://web.facebook.com/smakkerz" target="blank">
								<i class="ace-icon fa fa-facebook-square bigger-150"></i>
							</a>
							<span class="blue bolder"><a href="https://sekawan.xyz/"> 
							<i class="fa fa-trademark"></i>
							SM4KK3RZ</a></span>  &copy; <?php echo date("Y"); ?> <!-- <?= $this->settingvalue_library->Getvalue("Company")->Value ?> -->
							<a href="https://twitter.com/ucac_info" target="blank">
								<i class="ace-icon fa fa-twitter-square orange bigger-150"></i>
							</a>
							<a href="https://instagram.com/usm_ucac" target="blank">
								<i class="ace-icon fa fa-instagram orange bigger-150"></i>
							</a>	
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
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
		<!-- basic scripts -->
		<!-- <![endif]-->

		<!--[if IE]>
<script src="<?php echo base_url()?>Assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url()?>Assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url()?>Assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url()?>Assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="<?php echo base_url()?>Assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url()?>Assets/js/jquery.dataTables.bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<!-- ace scripts -->
		<script src="https://cdn.datatables.net/select/1.2.2/js/dataTables.select.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>
		<script src="<?php echo base_url()?>Assets/js/jquery.validate.min.js"></script>
		<script src="<?php echo base_url()?>Assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url()?>Assets/js/ace.min.js"></script>
		<script type="text/javascript">
		    jQuery(function($) {

			    $(document).ready(function(){
				    $("#hide").click(function(){
				        $("#table").slideUp();
				        $("#table1").slideUp("slow");
				        $("#table2").slideUp("slow");
				        $("#table3").slideUp("slow");
				        $("#table4").slideUp("slow");
				    });
				    $("#show").click(function(){
				        $("#table").slideDown();
				        $("#table1").slideDown("slow");
				        $("#table2").slideDown();
				        $("#table3").slideDown("slow");
				        $("#table4").slideDown("slow");
				    });
				    $("#showA").click(function(){
				        $("#table").slideDown();
				        $("#table1").slideDown("slow");
				        $("#table2").slideDown();
				        $("#table3").slideDown();
				        $("#table4").slideDown("slow");
				    });
				     $("#show1").click(function(){
				        $("#table5").slideDown();
				        $("#table6").slideDown();
				    });
				     $("#hide1").click(function(){
				        $("#table5").slideUp();
				        $("#table6").slideUp();
				    });
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
				        if(msg == 1){
							$("#title-message").append('Form Kuisioner');
							$("#content-message").append('<h3>Kuisioner belum lengkap, mohon dilengkapi</h3>');
				   			$("#modal-msg").modal("show");
				       	}
				       	else if (msg == 2) {
							$("#title-message").append('Form Kuisioner');
							$("#content-message").append("<h2 style='text-align: justify;'>Terimakasih telah mengisi kuesioner Tracer Study Universitas Semarang Carrer and Alumni Center </h2>");
				   			$("#modal-msg").modal("show");
				       	}
				       	else if(msg == 'login') {
							$("#title-message").append('<i class="fa '+flag+'"></i> Selamat '+ themessage +' di <?= $this->settingvalue_library->Getvalue("Title_Home")->Value ?>');
							$("#content-message").append("<h4 style='text-align: justify;'><?= $this->settingvalue_library->Getvalue("Description")->Value ?></h4>");
				   			$("#modal-msg").modal("show");
				       	}
				       	else if(msg == 'update_profil') {
							$("#title-message").append('<i class="ace-icon fa fa-thumbs-o-up"></i> Terima Kasih');
							$("#content-message").append("<h4>Terima Kasih telah memperbarui Profil </h4>");
				   			$("#modal-msg").modal("show");
				       	}
				});

                $('#modal-wizard-container').ace_wizard();
				$('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');
				
			});
    	</script>
	</body>
</html>
