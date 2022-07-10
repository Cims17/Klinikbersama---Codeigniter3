<!-- Start Breadcrumb 
    ============================================= -->
<div class="breadcrumb-area bg-gradient text-center">
	<!-- Fixed BG -->
	<div class="fixed-bg" style="background-image: url(<?= base_url() ?>assets/user/img/shape/9.png);"></div>
	<!-- Fixed BG -->
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2">
				<?php foreach ($klinik as $knk) { ?>
					<h1><?= $knk['nama_klinik'] ?></h1>
				<?php } ?>
				<ul class="breadcrumb">
					<li><a href="<?= base_url() ?>"><i class="fas fa-home"></i> Home</a></li>
					<li><a href="">Klinik</a></li>
					<?php foreach ($klinik as $knk) { ?>
						<li class="active"><?= $knk['nama_klinik'] ?></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumb -->

<!-- Start Department Single 
    ============================================= -->
<div class="department-single-area overflow-hidden default-padding">
	<div class="container">
		<?php foreach ($klinik as $knk) { ?>
			<div class="row">
				<div class="col-lg-8 daftar">
					<div class="thumb">
						<img src="<?= base_url() ?>assets/admin/images/klinik/<?= $knk['foto_klinik'] ?>" alt="Thumb">
						<div class="title">
							<h3><?= $knk['nama_klinik'] ?></h3>
							<span>Dokter yang tersedia: <?= $jumlah_dokter ?></span>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 info">
							<div class="card">
								<div class="card-header bg-gradient">
									<h4 class="card-title text-light">Profil Klinik</h4>
								</div>
								<!--end card-header-->
								<div class="card-body">
									<div class="form-group row">
										<h5 class="col-xl-4 col-lg-3 text-end mb-lg-0 align-self-center">No Telepon</h5>
										<div class="col-lg-8 col-xl-8">
											<h5>: <?= $knk['no_telepon'] ?> </h5>
										</div>
									</div>
									<div class="form-group row">
										<h5 class="col-xl-4 col-lg-3 text-end mb-lg-0 align-self-center">Alamat Klinik</h5>
										<div class="col-lg-8 col-xl-8">
											<h5>: <?= $knk['alamat_klinik'] ?></h5>
										</div>
									</div>
									<div class="form-group row">
										<h5 class="col-xl-4 col-lg-3 text-end mb-lg-0 align-self-center">Asuransi</h5>
										<div class="col-lg-8 col-xl-8">
											<h5>: <?= $knk['asuransi_klinik'] ?></h5>
										</div>
									</div>
									<div class="form-group row">
										<h5 class="col-xl-4 col-lg-3 text-end mb-lg-0 align-self-center">Google Map</h5>
										<div class="col-lg-8 col-xl-8">
											<h5>: <a href="<?= $knk['link_gmap'] ?>" target="_blank"><?= $knk['link_gmap'] ?></a><i class="fas fa-link ml-2"></i></h5>
										</div>
									</div>
								</div>
								<!--end card-body-->
							</div>
							<!--end card-->
						</div>

					</div>
				</div>
				<div class="col-lg-4 sidebar">

					<!-- Single Widget -->
					<div class="widget opening-hours">
						<div class="title">
							<h4>Jam Praktik</h4>
						</div>
						<ul>
							<li> <span> Senin - Jumat : </span>
								<div class="float-right">06.00 - 09.00</div>
							</li>
							<li> <span> Senin - Jumat :</span>
								<div class="float-right">16.00 - 20.00</div>
							</li>
						</ul>
					</div>
					<!-- End Single Widget -->
					<!-- Single Widget -->
					<div class="widget opening-hours">
						<div class="title">
							<h4>Libur</h4>
						</div>
						<ul>
							<li> <span>Sabtu, Minggu, dan Hari Besar Tutup</span>
							</li>
						</ul>
					</div>
					<!-- End Single Widget -->


				</div>
				<!-- End Widget Items -->

			</div>
		<?php } ?>
	</div>
</div>
</div>
<!-- End Department Single -->
<!-- Start Team 
    ============================================= -->
<div class="team-default-area bg-gray default-padding bottom-less">
	<div class="container">
		<div class="title">
			<h1>Dokter</h1>
		</div>
		<div class="team-items text-center">
			<div class="row">
				<?php foreach ($dokter as $dkt) { ?>
					<!-- Single Item -->
					<div class="single-item col-lg-3 col-md-6">
						<div class="item">
							<div class="thumb">
								<img src="<?= base_url() ?>assets/admin/images/dokter/<?= $dkt['foto_dokter'] ?>" height="300" width="300" alt="Thumb">
								<div class="contact">
									<ul>
										<li>
											<a href="<?= base_url() ?>Dokter/Daftar/<?= $dkt['id_dokter'] ?>">Daftar</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="info">
								<h5><?= $dkt['nama_dokter'] ?></h5>
								<span class="text-dark">Spesialis <?= $dkt['spesialis'] ?></span>
								<br>
								<span><?= $dkt['nama_klinik'] ?></span>
							</div>
						</div>
					</div>
					<!-- End Single Item -->
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<!-- End Team -->
