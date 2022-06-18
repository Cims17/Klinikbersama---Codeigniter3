<!-- Start Breadcrumb 
    ============================================= -->
<div class="breadcrumb-area bg-gradient text-center">
	<!-- Fixed BG -->
	<div class="fixed-bg" style="background-image: url(<?= base_url() ?>assets/user/img/shape/9.png);"></div>
	<!-- Fixed BG -->
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2">
				<?php foreach ($dokter as $dkt) { ?>
					<h1><?= $dkt['nama_dokter'] ?></h1>
					<h1>Dokter <?= $dkt['spesialis'] ?></h1>
				<?php } ?>
				<ul class="breadcrumb">
					<li><a href="<?= base_url() ?>"><i class="fas fa-home"></i> Home</a></li>
					<li><a href="<?= base_url() ?>Klinik">Klinik</a></li>
					<?php foreach ($dokter as $dkt) { ?>
						<li> <a href="<?= base_url() ?>Klinik/Profil/<?= $dkt['id_klinik'] ?>"><?= $dkt['nama_klinik'] ?></a></li>
						<li class="active"><?= $dkt['nama_dokter'] ?></li>
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
		<?php foreach ($dokter as $knk) { ?>
			<div class="row">
				<div class="col-lg-8 daftar">
					<div class="thumb">
						<img src="<?= base_url() ?>/assets/user/img/2440x1578.png" alt="Thumb">
						<div class="title">
							<h3>Dokter <?= $knk['nama_dokter'] ?></h3>
						</div>
					</div>
					<div class="consultation-area mt-5">
						<div class="form">
							<div class="appoinment-box text-center wow fadeInRight">
								<div class="heading">
									<h4>Form Pendaftaran Berobat</h4>
								</div>
								<form action="<?php echo base_url() ?>Dokter/Daftar_antrean" method="post" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input class="form-control" id="id_dokter" name="id_dokter" type="text" value="<?= $knk['id_dokter'] ?>" hidden>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<input class="form-control input" id="tanggal_berobat" name="tanggal_berobat" placeholder=" " type="date">
												<div class="cut cut-long2"></div>
												<label for="tanggal_berobat" class="placeholder">Tanggal Berobat</label>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<select id="cara_bayar" name="cara_bayar" class="form-control input">
													<option value="" selected disabled>Pilih Cara Bayar</option>
													<option value="Bayar Sendiri">Bayar Sendiri</option>
													<option value="BPJS Kesehatan">BPJS Kesehatan</option>
												</select>
												<div class="cut"></div>
												<label for="cara_bayar" class="placeholder">Cara Bayar</label>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<textarea id="keluhan" name="keluhan" class="form-control input textarea"> </textarea>
												<div class="cut cut-short"></div>
												<label for="keluhan" class="placeholder">Keluhan</label>
											</div>
										</div>
										<?php if ($this->session->userdata('username') != null) { ?>
											<div class="col-md-12">
												<button type="submit" name="submit" id="f_submit">
													Mendaftar
												</button>
											</div>
										<?php } else { ?>
											<div class="col-md-12">
												<button type="submit" name="submit" id="f_submit">
													Anda Belum Login
												</button>
											</div>
										<?php } ?>
									</div>
								</form>
							</div>
						</div>
					</div>

				</div>
				<div class="col-lg-4 sidebar">

					<!-- Single Widget -->
					<div class="widget opening-hours">
						<div class="title">
							<h4>Jadwal Praktik</h4>
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

<script>
	// Use Javascript
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth() + 1; //January is 0 so need to add 1 to make it 1!
	var yyyy = today.getFullYear();
	if (dd < 10) {
		dd = '0' + dd
	}
	if (mm < 10) {
		mm = '0' + mm
	}

	today = yyyy + '-' + mm + '-' + dd;
	document.getElementById("tanggal_berobat").setAttribute("min", today);
</script>
