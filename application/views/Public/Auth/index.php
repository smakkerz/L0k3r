 <div class="news-feed">
    <div class="news-image" style="background-image: url(<?= base_url('Assets/Company/img/login-bg/login-bg-10.jpg') ?>)"></div>
    <div class="news-caption">
        <h4 class="caption-title"><b>Ar</b> Lizo</h4>
        <p>
            As a Color Admin app administrator, you use the Color Admin console to manage your organization’s account, such as add new users, manage security settings, and turn on the services you want your team to access.
        </p>
    </div>
</div>
<div class="right-content">
    <!-- begin register-header -->
    <h1 class="register-header">
        Sign In
        <small>Create your Color Admin Account. It’s free and always will be.</small>
                  <p id="msg"></p>
    </h1>
    <!-- end register-header -->
    <!-- begin register-content -->
    <div class="register-content">
        <form action="<?= $ActionLogin ?>" method="post" id="formlogin">
            <label class="control-label">Email <span class="text-danger">*</span></label>
            <div class="row m-b-15">
                <div class="col-md-12">
              <input type="text" class="form-control" name="PostUser" placeholder="Email" required>
                </div>
            </div>
            <label class="control-label">Password <span class="text-danger">*</span></label>
            <div class="row m-b-15">
                <div class="col-md-12">
              <input type="password" name="PostPass" class="form-control" placeholder="Kata sandi" required>
                </div>
            </div>

          	<div class="register-buttons">
                <button type="submit" id="submit_login" class="btn btn-primary btn-block btn-lg">Sign In</button>
            </div>
            <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                Belum mempunyai Akun? Klik <a href="<?= base_url('register/company') ?>">disini</a> untuk daftar.
            </div>
            <hr />
            <p class="text-center">
                &copy; Color Admin All Right Reserved 2018
            </p>
        </form>
    </div>
    <!-- end register-content -->
</div>