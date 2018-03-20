	<div class="login-box visible widget-box no-border">
		<div class="widget-body">
			<div class="widget-main">
				<h4 class="header blue lighter bigger">
					<i class="ace-icon fa fa-coffee green"></i>
						Silahkan masukan Akun
				</h4>
                <?= $this->session->userdata('error') <> '' ? $this->session->userdata('error') : ''; ?>
                <?= $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
							<style type="text/css">
								.fa-passwd-reset > .fa-lock {
								  font-size: 1.2rem;
								}
							</style>
				<div class="space-6"></div>

					<form action="<?= $ActionLogin ?>" method="post" onsubmit="return checkEmptyInput();" role="form">
						<fieldset>
							<label class="block clearfix">
								<span class="block input-icon input-icon-right">
									<input type="text" class="form-control" name="PostUser" id="PostUser" placeholder="Isi Username / Email" required autofocus />
										<i class="ace-icon fa fa-user"></i>
										<i class="has-feedback "></i>
								</span>
							</label>

							<label class="block clearfix">
								<span class="block input-icon input-icon-right">
									<input type="password" class="form-control" name="PostPass" id="PostPass" placeholder="Isi Password Anda" required />
										<i class="ace-icon fa fa-lock"></i>
										<i class="has-feedback "></i>
								</span>
							</label>

							<div class="space"></div>

								<div class="clearfix">
									<label class="inline">
										<input name="switch-field-1" class="ace ace-switch ace-switch-6" type="checkbox" id="pass"/>
											<span class="lbl">  Tampilkan Password</span>
									</label>
										<b><span class="width-55 pull-left greeting"> <i class="a fa-flag" id="flag"></i> </span></b> 
									<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
										<i class="ace-icon fa fa-key"></i>
											<span class="bigger-110">Masuk</span>
									</button>
								</div>

								<div class="space-4"></div>
						</fieldset>
					</form>
							<div class="social-or-login center">
								<span class="bigger-110">Bantuan</span>
							</div>

							<div class="space-6"></div>

							<div class="social-login center">
								<img src="<?php echo base_url(); ?>Assets/images/logo.png" class="img-circle" width="50px">
								<a href="#modal-form" data-toggle="modal" lass="blue">
									<span class="fa-passwd-reset fa-stack">
									  <i class="fa fa-undo fa-stack-2x"></i>
									  <i class="fa fa-lock fa-stack-1x"></i>
									</span> Lupa Password 
								</a>
							</div>
			</div><!-- /.widget-main -->

						<div class="toolbar clearfix">
						<div>
						<a href="<?= base_url();?>/library/Tracer-UCAC.apk" class="user-signup-link">
							<i class="ace-icon fa fa-android"></i>
									<span style="color: #fff;"> Apps</span>
								</a>
								</div>

							<div>
								<a href="<?= base_url('register.py');?>" data-target="#signup-box" class="user-signup-link">
									Buat member Baru
									<i class="ace-icon fa fa-arrow-right"></i>
								</a>
							</div>
						</div>
		</div><!-- /.widget-body -->
	</div><!-- /.login-box -->
	<div id="modal-form" class="modal" tabindex="-5">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="blue bigger">Form Reset Password 
									<span class="fa-passwd-reset fa-stack">
									  <i class="fa fa-undo fa-stack-2x"></i>
									  <i class="fa fa-lock fa-stack-1x"></i>
									</span></h4>
				</div>
				<div class="modal-body">
					<form action="<?= site_url('login/reset_pwd'); ?>" method="post" onsubmit="return checkEmptyInput();">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<fieldset>
							<div class="col-xs-12 col-sm-7">
								<div class="form-group">
								<label class="block clearfix">
								<span class="block input-icon input-icon-right">
								<input type="text" class="form-control" name="%nim%" placeholder="Isi NIM / Phone Anda" required="required" />
									<i class="ace-icon fa fa-user"></i>
										<i class="has-feedback "></i>
								</span>
								</label>
								</div>
								<div class="form-group">
								<label class="block clearfix">
								<span class="block input-icon input-icon-right">
								<input type="text" pattern="[0-9]+" maxlength="4" class="form-control" name="_lulus" placeholder="Isi Tahun Lulus Anda (Ex: 2000)" required="required" />
									<i class="ace-icon fa fa-graduation-cap"></i>
										<i class="has-feedback "></i>
								<small class="text-danger">*Jika belum Mengisi Tahun lulus pada kuisioner maka isi 0 (nol)</small>
								</span>
								</label>
								</div>
							</div>
							Masukan Data sesuai dengan Profil Anda di Tracer UCAC atau bisa menghubungi UCAC ke 
							<span class="bigger-110">Email <a href="mailto:ucac@usm.ac.id">ucac@usm.ac.id</a></span>

						</fieldset>
				</div>
					<div class="modal-footer wizard-actions">
						<button class="btn btn-sm btn-round" data-dismiss="modal">
							<i class="ace-icon fa fa-times red"></i>
								Batal
						</button>
						<button type="submit" data-last="Finish" class="btn btn-sm btn-primary btn-round">
								Lanjut
							<i class="ace-icon fa fa-arrow-right"></i>
						</button>
					</div>
					</form>
			</div>
		</div>
	</div><!-- PAGE CONTENT ENDS -->
	<!-- -->