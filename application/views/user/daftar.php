<?= $this->session->flashdata('berhasil_jadwal') ?>
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
					<h1><?= $dkt['spesialis'] ?></h1>
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
					<div class="thumb" style="height: 410px;">
						<img src="<?= base_url() ?>assets/admin/images/dokter/<?= $dkt['foto_dokter'] ?>" height="400" width="400" alt="Thumb">
						<div class="title">
							<h3>Dokter <?= $knk['nama_dokter'] ?></h3>
							<span>No.SIP : <?= $knk['no_SIP'] ?></span><br>
							<span><?= $knk['spesialis'] ?></span>
						</div>
					</div>
					<!-- Start Fun Factor Area
    ============================================= -->
					<div class="fun-factor-area pb-5">
						<div class="container">
							<div class="title">
								<h3>Antrean Tanggal <?= date("Y-m-d") ?> <br> Jadwal Praktik 06.00-09.00 WIB</h3>
							</div>
							<div class="fun-fact-items bg-gradient text-light text-center">

								<div class="row">
									<div class="col-lg-6 col-md-6 item">
										<div class="fun-fact">
											<?php if ($antrean == null) { ?>
												<div class="timer" data-to="0" data-speed="500"></div>
												<span class="medium">No Antrean dilayani</span>
											<?php } else{?>
												<div class="timer" data-to="<?= $antrean[0]['no_antrean'] ?>" data-speed="500"></div>
												<span class="medium">No Antrean dilayani</span>
												<?php } ?>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 item">
										<div class="fun-fact">
											<div class="timer" data-to="<?= $jmlantrean ?>" data-speed="500"></div>
											<span class="medium">Jumlah Antrean</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End Fun Factor Area -->
					<div class="consultation-area ">
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
												<select id="cara_bayar" name="jadwal_dokter" class="form-control input">
													<option value="" selected disabled>Pilih Jam Praktik</option>
													<?php foreach($jadwal as $jdl) { ?>
														<option value="<?= $jdl['id_jadwal'] ?>"><?= $jdl['jam_mulai'] ?> - <?= $jdl['jam_selesai'] ?></option>
														<?php } ?>
												</select>
												<div class="cut"></div>
												<label for="cara_bayar" class="placeholder">Jam Praktik</label>
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
													<?php if ($asuransi['asuransi'] == 'Tidak Ada Asuransi') { ?>
														<option value="Bayar Mandiri">Bayar Sendiri</option>
													<?php } ?>
													<?php if ($asuransi['asuransi'] == 'BPJS Kesehatan') { ?>
														<option value="Bayar Mandiri">Bayar Mandiri</option>
														<option value="BPJS Kesehatan">BPJS Kesehatan</option>
													<?php } ?>
												</select>
												<div class="cut"></div>
												<label for="cara_bayar" class="placeholder">Cara Bayar</label>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<textarea id="keluhan" name="keluhan" class="form-control input textarea" required> </textarea>
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
