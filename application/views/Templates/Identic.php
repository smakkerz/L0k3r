<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="JobSribe.Com, Lowongan Kerja Terbaru Setai Hari dari Segala Bidang Pekerjaan & Lokasi Kerja">
    <meta name="keywords" content="">
    <meta name="theme-color" content="#4db8fe">

    <title>JobSribe - Portal Kerja Online</title>

    <!-- Styles -->
    <link href="<?= $this->config->item('assets_url')  ?>css/app.min.css" rel="stylesheet">
    <link href="<?= $this->config->item('assets_url')  ?>css/custom.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Oswald:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="icon" href="assets/img/favicon.ico">
  </head>

  <body  class="login-page">
  <?= $contents ?>
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
  
    <!-- Scripts -->
    <script src="<?= $this->config->item('assets_url')  ?>js/app.min.js"></script>
    <script src="<?= $this->config->item('assets_url')  ?>js/custom.js"></script>
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
        function Loginlogic(){
            var formData = $('#formlogin').find('input').serialize();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/Identic/LoginPost')?>",
                dataType : "JSON",
                data : formData,
                success: function(data){
                    if(data.StatusCode == "200"){
                      window.location = "<?= base_url('?Login='.date('His').'+') ?>"+data.Value.UniqID;
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
    });
    </script>
  </body>
  </html>