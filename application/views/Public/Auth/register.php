<div class="news-feed">
    <div class="news-image" style="background-image: url(<?= base_url('Assets/Company/img/login-bg/login-bg-16.jpg') ?>)"></div>
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
        Sign Up
        <small>Create your Color Admin Account. It’s free and always will be.</small>
         <?= $this->session->userdata('error') <> '' ? $this->session->userdata('error') : ''; ?>
                <?= $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
    </h1>
    <!-- end register-header -->
    <!-- begin register-content -->
    <div class="register-content">
        <form action="<?= $ActionRegister ?>" method="post" class="margin-bottom-0">
            <label class="control-label">Nama Perusahaan <span class="text-danger">*</span></label>
            <div class="row m-b-15">
                <div class="col-md-12">
                    <input type="text" name="PostName" class="form-control" placeholder="Ex: PT XXX BERKARYA" required />
                </div>
            </div>
            <label class="control-label">Email <span class="text-danger">*</span></label>
            <div class="row m-b-15">
                <div class="col-md-12">
                    <input type="text" name="PostEmail" class="form-control" placeholder="Email address" required />
                </div>
            </div>
            <label class="control-label">No Telp <span class="text-danger">*</span></label>
            <div class="row m-b-15">
                <div class="col-md-12">
                    <input type="tel" name="PostPhone" class="form-control" placeholder="Ex: 021000100" required />
                </div>
            </div>
            <label class="control-label">Password <span class="text-danger">*</span></label>
            <div class="row m-b-15">
                <div class="col-md-12">
                    <input type="password" name="PostPassword" class="form-control" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required />
                </div>
            </div>
            <div class="checkbox checkbox-css m-b-30">
            	<div class="checkbox checkbox-css m-b-30">
					<input type="checkbox" id="agreement_checkbox" value="" required>
					<label for="agreement_checkbox">
						By clicking Sign Up, you agree to our <a href="javascript:;">Terms</a> and that you have read our <a href="javascript:;">Data Policy</a>, including our <a href="javascript:;">Cookie Use</a>.
					</label>
				</div>
            </div>
            <div class="register-buttons">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Sign Up</button>
            </div>
            <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                Sudah mempunyai Akun? Klik <a href="<?= base_url('login/company') ?>">disini</a> untuk login.
            </div>
            <hr />
            <p class="text-center">
                &copy; Color Admin All Right Reserved 2018
            </p>
        </form>
    </div>
    <!-- end register-content -->
</div>