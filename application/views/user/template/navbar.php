<body>

	<!-- Preloader Start -->
	<div class="se-pre-con"></div>
	<!-- Preloader Ends -->

	<!-- Header 
    ============================================= -->
	<header id="home">

		<!-- Start Navigation -->
		<nav class="navbar navbar-default attr-border navbar-sticky bootsnav">

			<!-- Start Top Search -->
			<div class="container">
				<div class="row">
					<div class="top-search">
						<div class="input-group">
							<form action="#">
								<input type="text" name="text" class="form-control" placeholder="Search">
								<button type="submit">
									<i class="ti-search"></i>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- End Top Search -->

			<div class="container">

				<!-- Start Atribute Navigation -->
				<div class="attr-nav">
					<ul>
						<li class="search"><a href="#"><i class="fas fa-search"></i></a></li>
					</ul>
				</div>
				<!-- End Atribute Navigation -->

				<!-- Start Header Navigation -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
						<i class="fa fa-bars"></i>
					</button>
					<a class="navbar-brand" href="<?= base_url() ?>">
						<img src="<?= base_url() ?>assets/user/img/logo.png" class="logo" alt="Logo">
					</a>
				</div>
				<!-- End Header Navigation -->

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-menu">
					<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
						<li class="<?= ($this->uri->segment(1) == '') ? 'active' : '' ?>">
							<a href="<?= base_url() ?>">Beranda</a>
						</li>
						<li class="<?= ($this->uri->segment(1) == 'Klinik') ? 'active' : '' ?>">
							<a href="<?= base_url() ?>Klinik">Klinik</a>
						</li>
						<li class="<?= ($this->uri->segment(1) == 'Dokter') ? 'active' : '' ?>">
							<a href="<?= base_url() ?>Dokter">Dokter</a>
						</li>
						<li class="<?= ($this->uri->segment(1) == 'Peta') ? 'active' : '' ?>">
							<a href="<?= base_url() ?>Peta">Peta</a>
						</li>
						<?php if ($this->session->userdata('nama_pasien') != null) {
							$nama = explode(' ', $this->session->userdata('nama_pasien')); ?>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Akun</a>
								<ul class="dropdown-menu">
									<li><a>Selamat Datang <?= $nama[0] ?> !</a></li>
									<li><a href="<?= base_url() ?>Profil">Profil</a></li>
									<li><a href="<?= base_url() ?>Antrean">Antrean Berlangsung</a></li>
									<li><a href="<?= base_url() ?>Riwayat_antrean">Riwayat Antrean</a></li>
									<li><a href="<?= base_url() ?>Auth/Login/Logout">Log Out</a></li>
								</ul>
							</li>
						<?php } else { ?>
							<li>
								<a href="<?= base_url() ?>Auth/Login">Login</a>
							</li>
						<?php } ?>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>

		</nav>
		<!-- End Navigation -->

	</header>
	<!-- End Header -->
