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
        <div class="pull-right user-login">
        <?php if($this->session->userdata("isLogin") == FALSE){ ?>
          <a class="btn btn-sm btn-primary" href="<?= base_url("Identic") ?>">Masuk</a> atau <a href="user-register.html"> daftar</a>
        <?php } else { ?>
          <a class="btn btn-sm btn-primary" href="<?= base_url("Identic/Logout") ?>">Keluar</a>
        <?php } ?>

        </div>
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