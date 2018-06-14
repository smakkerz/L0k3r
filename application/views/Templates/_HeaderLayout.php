    <!-- Navigation bar -->
    <nav class="navbar">
      <div class="container">

        <!-- Logo -->
        <div class="pull-left">
          <a class="navbar-toggle" href="#" data-toggle="offcanvas"><i class="ti-menu"></i></a>

          <div class="logo-wrapper">
            <a class="logo" href="index.html"><img src="<?= base_url("Assets/images/logo.png") ?>" alt="logo"></a>
            <a class="logo-alt" href="index.html"><img src="<?= base_url("Assets/images/logo.png") ?>" alt="logo-alt"></a>
          </div>

        </div>
        <!-- END Logo -->

        <!-- User account -->
        <?php if($this->session->userdata("Role") != 'Candidate'){ ?>
        <div class="pull-right user-login">
          <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myLogin">Masuk</a> atau 
          <a data-toggle="modal" data-target="#myRegister"> daftar</a>
          </div>
        <?php } else { ?>
        <div class="pull-right">

          <div class="dropdown user-account">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
              <img src="<?= base_url("Assets/images/logo.png") ?>" alt="avatar">
            </a>

            <ul class="dropdown-menu dropdown-menu-right">
              <li><a href="<?= base_url("profile/".$this->session->userdata('Unique_user')) ?>">Akun</a></li>
              <li><a href="<?= base_url("Member/sendverifikasi") ?>">Kirim Verifikasi</a></li>
              <li><a href="user-forget-pass.html">Forget pass</a></li>
              <li><a href="<?= base_url("Identic/Logout") ?>">Logout</a></li>
            </ul>
          </div>

        </div>
<!--           <a class="btn btn-sm btn-primary" href="<?= base_url("Identic/Logout") ?>">Keluar</a>
 -->        <?php } ?>
        <!-- END User account -->

        <!-- Navigation menu -->
        <ul class="nav-menu">
          <li>
            <li><a class="active" href="#">Beranda</a></li>
          </li>
          <li>
            <a href="job-list-1.html">Cari Lowongan</a>
          </li>
          <li><a href="#">Bantuan</a></li>
        </ul>
        <!-- END Navigation menu -->

      </div>
    </nav>
    <!-- END Navigation bar -->