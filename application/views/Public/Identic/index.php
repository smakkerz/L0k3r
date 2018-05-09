<main>

      <div class="login-block">
        <a href="<?= base_url('/') ?>"><img src="<?= base_url("Assets/img/jobsribe-logo.png") ?>" alt=""></a>
        <h1>Masuk &amp; Akses Lebih Jauh</h1>
        <?= $this->session->userdata('error') <> '' ? $this->session->userdata('error') : ''; ?>
                <?= $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        <form action="<?= $ActionLogin ?>" method="post">

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-email"></i></span>
              <input type="text" class="form-control" name="PostUser" placeholder="Email">
            </div>
          </div>

          <hr class="hr-xs">

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-unlock"></i></span>
              <input type="password" name="PostPass" class="form-control" placeholder="Katasandi">
            </div>
          </div>

          <button class="btn btn-primary btn-block" type="submit">Masuk</button>

          <div class="login-footer">
            <h6>atau masuk menggunakan</h6>
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>

        </form>
      </div>

      <div class="login-links">
        <a class="pull-left" href="user-forget-pass.html">Lupa Katasandi?</a>
        <a class="pull-right" href="<?= base_url('register/candidate') ?>">Saya Belum Punya Akun</a>
      </div>

    </main>