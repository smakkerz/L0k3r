	<ul class="breadcrumb">

		<li>

			<a href="<?= base_url('home') ?>">

			<i class="ace-icon fa fa-home home-icon"></i>

				 Beranda</a>

		</li>

		<li>

			<a href="<?=base_url('biodata'); ?>">

			<i class="menu-icon fa fa-users"></i>

				 Alumni</a>

		</li>



		<li>

			<a href="<?=base_url('kuis'); ?>">

			<i class="menu-icon fa fa-list"></i>

				 Data Kuis</a>

		</li>



		<li>

			<a href="<?= base_url('graph') ?>">

			<i class="ace-icon fa fa-pie-chart"></i>

				 Grafik</a>

		</li>
		<li>

			<a href="#">

			<i class="menu-icon fa fa-pencil-square-o"></i>

				 Kuesioner</a>

		</li>



		<li>

			<a href="<?=base_url('profil.py'); ?>">

			<i class="menu-icon fa fa-user"></i>

				 Profil</a>

		</li>



		<li>

			<a href="<?=base_url('reset.py'); ?>/<?=md5($this->session->userdata('id_bio')) ?>">

			<i class="menu-icon fa fa-lock"></i>

				 Ganti Password</a>

		</li>
	</ul><!-- /.breadcrumb -->

