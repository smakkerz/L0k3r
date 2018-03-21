<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<link rel="shorcut icon" href="<?php echo base_url(); ?>Assets/images/logo.png" />

		<meta name="title" content="why" />
		<meta name="images" content="<?php echo base_url(); ?>Assets/images/logo.png" />
	     <meta property="og:image" content="<?php echo base_url(); ?>Assets/images/ucac.jpg" />
	     <meta property="og:image:type" content="image/jpeg" />
	     <meta property="og:type" content="website" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url()?>Assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>Assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="<?php echo base_url()?>Assets/css/greeting.css" />

		<!-- page specific plugin styles -->

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url()?>Assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url()?>slibrary/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<script src="<?php echo base_url()?>Assets/js/jquery-2.1.4.min.js"></script>

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo base_url()?>library/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?php echo base_url()?>Assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?php echo base_url()?>library/assets/js/html5shiv.min.js"></script>
		<script src="<?php echo base_url()?>library/assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="login-layout blur-login"

		style="background:url(<?php echo base_url(); ?>Assets/images/bg-admin.jpg)  no-repeat center fixed;

				-webkit-background-size: cover;

				-moz-background-size: cover;

				-o-background-size: cover;

			 	background-size: cover;

			 	position:relative;">

		<div class="main-container">

			<div class="main-content">

				<div class="row">

					<div class="col-sm-10 col-sm-offset-1">

						<div class="login-container">

							<div class="center">

								<h1>

									<img src="<?php echo base_url(); ?>Assets/images/logo.png" class="img-circle" width="50px">
									<span class="blue">JobScribe</span><span class="white">.com</span>

								</h1>

								<h4 class="white" >&copy; JOB Sribe</h4>

							</div>



							<div class="space-6"></div>

							<div class="position-relative">



							<?= $contents ?>



							</div>

						</div><!-- /.forgot-box -->

					</div><!-- /.col -->

				</div><!-- /.row -->

			</div><!-- /.main-content -->

		</div><!-- /.main-container -->

		<!-- basic scripts -->



		<!--[if !IE]> -->

		<script src="<?php echo base_url()?>Assets/js/bootstrap.min.js"></script>

		<script src="<?php echo base_url()?>Assets/js/ace.min.js"></script>

		<!-- <![endif]-->



		<!--[if IE]>

<script src="assets/js/jquery-1.11.3.min.js"></script>

<![endif]-->

		<script type="text/javascript">

			jQuery(function($) {

				//$('#modal-form-container').ace_wizard();

				$('#modal-form .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');

			    $(function(){

			      $("#belum").click(function(){

			        $("#kutip").slideUp();

			      });

			    });

			    $(function(){

			      $("#ya").click(function(){

			        $("#kutip").slideDown();

			    });

			  });

		

	$(document).ready(function(){		

		$("#pass").click(function(){

			if($(this).is(':checked')){

				$("#p4ssword").attr('type','text');

			}else{

				$("#p4ssword").attr('type','password');

			}

		});

		var thehours = new Date().getHours();

					var themessage;

					var morning = ('Pagi');

					var afternoon = ('Sore');

					var evening = ('Malam');

					var flag;



					if (thehours >= 0 && thehours < 11) {

						themessage = morning;

						flag = 'fa-cloud  white'; 

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

					$('#flag').addClass("fa "+flag);

					$('.greeting').append(themessage+', Company');

	});

});

</script>
<script>
var slideIndex = 1;
	showDivs(slideIndex);

	function plusDivs(n) {
  		showDivs(slideIndex += n);
	}

	function showDivs(n) {
  		var i;
  		var x = document.getElementsByClassName("mySlides");
  		
  		if (n > x.length) {slideIndex = 1}    
  		if (n < 1) {slideIndex = x.length}
  		for (i = 0; i < x.length; i++) {
     		x[i].style.display = "none";  
  		}
  		x[slideIndex-1].style.display = "block";  
	}
</script>

</body>
</html>
