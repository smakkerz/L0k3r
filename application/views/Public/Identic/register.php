<main>

      <div class="login-block">
        <img src="<?= base_url("Assets/img/jobsribe-logo.png") ?>" alt="">
        <h1>Buat Akun </h1>
        <?= $this->session->userdata('error') <> '' ? $this->session->userdata('error') : ''; ?>
                <?= $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>

        <form action="<?= $ActionRegister ?>" method="post">
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-user"></i></span>
              <input type="text" minlength="3" name="PostName" class="form-control" placeholder="Nama" required="required">
            </div>
          </div>

          <hr class="hr-xs">

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-email"></i></span>
              <input type="email" minlength="3" name="PostEmail" class="form-control" placeholder="Alamat Email">
            </div>
          </div>

          <hr class="hr-xs">

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-tel"></i></span>
              <input type="text" name="PostPhone" class="form-control" placeholder="No Phone">
            </div>
          </div>

          <hr class="hr-xs">

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-calendar"></i></span>
              <input type="date" name="PostDate" class="form-control" placeholder="Tanggal Lahir" required="required">
            </div>
          </div>

          <hr class="hr-xs">

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-unlock"></i></span>
              <input type="password" name="PostPassword" minlength="8" class="form-control" placeholder="Buat Katasandi" required="required">
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit">Daftar Sekarang</button>

          <div class="login-footer">
            <h6>atau daftar menggunakan</h6>
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>

        </form>
      </div>

      <div class="login-links">
        <p class="text-center">Sudah Punya Akun? <a class="txt-brand" href="<?= base_url('login/candidate') ?>">Masuk Disini</a></p>
      </div>

    </main>