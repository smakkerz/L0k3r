<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Register Page</title>
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
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= $this->config->item('assets_url') ?>Company/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top bg-white">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin register -->
        <div class="register register-with-news-feed">
            <!-- begin news-feed -->
  <?= $contents ?>

    </div>
        <!-- end register -->
        
        <!-- begin theme-panel -->
        <div class="theme-panel">
            <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
            <div class="theme-panel-content">
                <h5 class="m-t-0">Color Theme</h5>
                <ul class="theme-list clearfix">
                    <li class="active"><a href="javascript:;" class="bg-green" data-theme="default" data-theme-file="../assets/css/default/theme/default.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-red" data-theme="red" data-theme-file="../assets/css/default/theme/red.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-blue" data-theme="blue" data-theme-file="../assets/css/default/theme/blue.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-theme-file="../assets/css/default/theme/purple.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-orange" data-theme="orange" data-theme-file="../assets/css/default/theme/orange.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-black" data-theme="black" data-theme-file="../assets/css/default/theme/black.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
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
	</div>
	<!-- end page container -->
	  <!-- POP UP Loader-->
      <div id="Loader" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header hidden">
              <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
              <img src="<?= $this->config->item('assets_url') ?>images/loading.gif">
            </div>
            <div class="modal-footer hidden">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
      <!-- End POP UP Loader-->
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= $this->config->item('assets_url') ?>Company/plugins/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?= $this->config->item('assets_url') ?>Company/plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="<?= $this->config->item('assets_url') ?>Company/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
	<!--[if lt IE 9]>
		<script src="../assets/crossbrowserjs/html5shiv.js"></script>
		<script src="../assets/crossbrowserjs/respond.min.js"></script>
		<script src="../assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?= $this->config->item('assets_url') ?>Company/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?= $this->config->item('assets_url') ?>Company/plugins/js-cookie/js.cookie.js"></script>
	<script src="<?= $this->config->item('assets_url') ?>Company/js/theme/default.min.js"></script>
	<script src="<?= $this->config->item('assets_url') ?>Company/js/apps.min.js"></script>
	<!-- ================== END BASE JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
        <script type="text/javascript">
    $(document).ready(function(){
        
        $('#submit_login').on('click',function (e){
          e.preventDefault();
          $('#Loader').modal('show');
            $('#msg').empty();
              if(!validatelogin()){
                console.log("error tuh");
              } else{
                Loginlogic();
              }
        })

        $('#submit_reset').on('click',function (e){
          e.preventDefault();
          $('#Loader').modal('show');
            $('#msg').empty();
              if(!validatereset()){
                console.log("error tuh");
              } else{
                Loginlogic();
              }
        })


        function Loginlogic(){
            var formData = $('#formlogin').find('input').serialize();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/Auth/LoginPost')?>",
                dataType : "JSON",
                data : formData,
                success: function(data){
                    if(data.StatusCode == "200"){
                      window.location = "<?= base_url('/Cms?Login='.date('His').'+') ?>"+data.Value.UniqID;
                    } else {
                      $('#msg').append(data.StatusMessage);
                      $('#Loader').modal('hide'); 
                    }
                }
            });
        }

        function validatelogin(){
            var Email=$('#PostUser').val();
            var Password=$('#PostPass').val();
            var msg = "";
            var counterror = 0;

            if(Email == ""){
                counterror++;
                msg = 'Oops Email masih kosong';
                $('#msg').append(msg);
            }
            if(Password == ""){
                counterror++;
                msg = 'Oops Password masih kosong';
                $('#msg').append(msg);
            }
            if(counterror > 0){
              return false;
            } else {
              return true;
            }
        }

        function validatereset(){
            var Email=$('#PostUser').val();
            var Password=$('#PostPass').val();
            var msg = "";
            var counterror = 0;

            if(Email == ""){
                counterror++;
                msg = 'Oops Email masih kosong';
                $('#msg').append(msg);
            }
            if(Password == ""){
                counterror++;
                msg = 'Oops Password masih kosong';
                $('#msg').append(msg);
            }
            if(counterror > 0){
              return false;
            } else {
              return true;
            }
        }
    });
    </script>
</body>
</html>
