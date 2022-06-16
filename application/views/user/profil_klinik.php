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
				<div class="col-lg-8 info">
					<div class="thumb">
						<img src="<?= base_url() ?>/assets/user/img/2440x1578.png" alt="Thumb">
						<div class="title">
							<h3><?= $knk['nama_klinik'] ?></h3>
							<span>Dokter yang tersedia: <?= $jumlah_dokter ?></span>
						</div>
					</div>
					<p>
						<?= $knk['alamat_klinik'] ?>
					</p>
				</div>
				<div class="col-lg-4 sidebar">

					<!-- Single Widget -->
					<div class="widget opening-hours">
						<div class="title">
							<h4>Jam Oprasional</h4>
						</div>
						<ul>
							<li> <span> Mon - Tues : </span>
								<div class="float-right"> 6.00 am - 10.00 pm </div>
							</li>
							<li> <span> Wednes - Thurs :</span>
								<div class="float-right"> 8.00 am - 6.00 pm </div>
							</li>
							<li> <span> Sun : </span>
								<div class="float-right closed"> Closed </div>
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
								<img src="<?= base_url() ?>assets/user/img/800x800.png" alt="Thumb">
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
