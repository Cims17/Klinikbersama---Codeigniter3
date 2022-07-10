<!DOCTYPE html>
<html lang="en">

<head>
	<!-- ========== Meta Tags ========== -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Healdi - Medical & Health Template">

	<!-- ========== Page Title ========== -->
	<title>Klinik Praktik Bersama - KAB.Ponorogo</title>

	<!-- ========== Favicon Icon ========== -->
	<link rel="shortcut icon" href="<?= base_url() ?>assets/user/img/favicon.png" type="image/x-icon">

	<!-- ========== Start Stylesheet ========== -->
	<link href="<?= base_url() ?>assets/user/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/user/css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/user/css/themify-icons.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/user/css/flaticon-set.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/user/css/magnific-popup.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/user/css/owl.carousel.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/user/css/owl.theme.default.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/user/css/animate.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/user/css/bootsnav.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/user/css/style.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/user/css/responsive.css" rel="stylesheet" />
	<!-- ========== End Stylesheet ========== -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="assets/js/html5/html5shiv.min.js"></script>
      <script src="assets/js/html5/respond.min.js"></script>
    <![endif]-->

	<!-- ========== Google Fonts ========== -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;600;700;800&display=swap" rel="stylesheet">

</head>

<body>

	<!-- Start Consultation 
    ============================================= -->
	<div class="consultation-area default-padding">
		<div class="container pt-4">
			<div class="col-lg-12 form">
				<div class="appoinment-box text-center wow fadeInRight">
					<div class="heading">
						<a href="<?= base_url() ?>">
							<img src="<?= base_url() ?>assets/user/img/logo-light.png" class="logo mb-3" alt="Logo">
						</a>
						<h4>Form Registrasi Mitra Klinik</h4>
					</div>
					<form action="<?= base_url() ?>Auth/Registrasi/Registrasi_pasien" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<div class="input-container ic-1">
										<input id="nama_klinik" name="nama_klinik" class="input" type="text" value="<?php echo $this->session->flashdata('value_no_identitas') ?>" placeholder=" " />
										<div class="cut"></div>
										<label for="nama_klinik" class="placeholder">Nama Klinik</label>
									</div>
								</div>
								<span class="d-flex ml-2 text-danger"><?php echo  $this->session->flashdata('err_no_identitas') ?></span>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<div class="input-container ic-2">
										<input id="nama_pemilik" name="nama_pemilik" class="input" type="text" value="<?php echo $this->session->flashdata('value_nama_pasien') ?>" placeholder=" " />
										<div class="cut "></div>
										<label for="nama_pemilik" class="placeholder">Nama Pemilik</label>
									</div>
								</div>
								<span class="d-flex ml-2 text-danger"><?php echo  $this->session->flashdata('err_nama_pasien') ?></span>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<div class="input-container ic-2">
										<input id="dokter_pj_klinik" name="dokter_pj_klinik" class="input" type="text" value="<?php echo $this->session->flashdata('value_tempat_lahir') ?>" placeholder=" " />
										<div class="cut cut-toolong"></div>
										<label for="dokter_pj_klinik" class="placeholder">Dokter Penanggung Jawab</label>
									</div>
								</div>
								<span class="d-flex ml-2 text-danger"><?php echo  $this->session->flashdata('err_tempat_lahir') ?></span>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<!-- <div class="input-container ic-2"> -->
									<textarea id="alamat_klinik" name="alamat_klinik" class="form-control input textarea"><?php echo $this->session->flashdata('value_alamat_pasien') ?></textarea>
									<div class="cut cut-long"></div>
									<label for="alamat_klinik" class="placeholder">Alamat Klinik</label>
									<!-- </div> -->
								</div>
								<span class="d-flex ml-2 text-danger"><?php echo  $this->session->flashdata('err_alamat_pasien') ?></span>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<div class="input-container ic-2">
										<select id="asuransi_klinik" name="asuransi_klinik" class="form-control input">
											<option value="Tidak Menerima Asuransi" <?= ($this->session->flashdata('value_asuransi_pasien') === 'Tidak Ada Asuransi') ? 'selected' : '' ?>>Tidak Ada Asuransi</option>
											<option value="BPJS Kesehatan" <?= ($this->session->flashdata('value_asuransi_pasien') === 'BPJS Kesehatan') ? 'selected' : '' ?>>BPJS Kesehatan</option>
										</select>
										<div class="cut cut-toolong"></div>
										<label for="asuransi_klinik" class="placeholder">Pilih Menerima Asuransi</label>
									</div>
								</div>
								<span class="d-flex ml-2 text-danger"><?php echo  $this->session->flashdata('err_asuransi_pasien') ?></span>
							</div>

							<hr size="1px" width="100%">

							<!-- <div class="col-md-12">
								<div class="form-group">
									<div class="input-container ic-2">
										<input id="email" name="email" class="form-control input" type="email" placeholder=" " />
										<div class="cut cut-short"></div>
										<label for="email" class="placeholder">Email</label>
									</div>
								</div>
							</div> -->

							<div class="col-md-12">
								<div class="form-group">
									<div class="input-container ic-2">
										<input id="no_telepon" name="no_telepon" class="form-control input" type="number" value="<?php echo $this->session->flashdata('value_no_telepon') ?>" placeholder=" " />
										<div class="cut cut-toolong"></div>
										<label for="no_telepon" class="placeholder">Nomor Whatsapp Klinik</label>
									</div>
								</div>
								<span class="d-flex ml-2 text-danger"><?php echo  $this->session->flashdata('err_no_telepon') ?></span>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<div class="input-container ic-2">
										<input class="form-control input" name="password" id="password" placeholder=" " type="password">
										<div class="cut cut-short2"></div>
										<span class="p-viewer">
											<i id="eyeIcon" class="far fa-eye"></i>
										</span>
										<label for="password" class="placeholder">Password</label>
									</div>
								</div>
								<span class="d-flex ml-2 text-danger"><?php echo  $this->session->flashdata('err_password') ?></span>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<div class="input-container ic-2">
										<input class="form-control input" name="konfirmasi_password" id="konfirmasi_password" placeholder=" " type="password">
										<div class="cut cut-toolong"></div>
										<span class="p-viewer">
											<i id="eyeIcon2" class="far fa-eye"></i>
										</span>
										<label for="konfirmasi_password" class="placeholder">Konfirmasi Password</label>
									</div>
								</div>
								<span class="d-flex ml-2 text-danger"><?php echo  $this->session->flashdata('err_konfirmasi_password') ?></span>
							</div>

							<div class="col-md-12">
								<button type="submit" name="submit" id="f_submit">
									Daftar
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Consultation -->

	<!-- jQuery Frameworks
    ============================================= -->
	<script src="<?= base_url() ?>assets/user/js/jquery-1.12.4.min.js"></script>
	<script src="<?= base_url() ?>assets/user/js/popper.min.js"></script>
	<script src="<?= base_url() ?>assets/user/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/user/js/jquery.appear.js"></script>
	<script src="<?= base_url() ?>assets/user/js/jquery.easing.min.js"></script>
	<script src="<?= base_url() ?>assets/user/js/jquery.magnific-popup.min.js"></script>
	<script src="<?= base_url() ?>assets/user/js/modernizr.custom.13711.js"></script>
	<script src="<?= base_url() ?>assets/user/js/owl.carousel.min.js"></script>
	<script src="<?= base_url() ?>assets/user/js/wow.min.js"></script>
	<script src="<?= base_url() ?>assets/user/js/isotope.pkgd.min.js"></script>
	<script src="<?= base_url() ?>assets/user/js/imagesloaded.pkgd.min.js"></script>
	<script src="<?= base_url() ?>assets/user/js/count-to.js"></script>
	<script src="<?= base_url() ?>assets/user/js/jquery.nice-select.min.js"></script>
	<script src="<?= base_url() ?>assets/user/js/bootsnav.js"></script>
	<script src="<?= base_url() ?>assets/user/js/main.js"></script>

	<script type="text/javascript">
		let passwordInput = document.getElementById('password'),
			icon = document.getElementById('eyeIcon');

		function togglePassword() {
			if (passwordInput.type === 'password') {
				passwordInput.type = 'text';
				icon.classList.add("fa-eye-slash");
				//toggle.innerHTML = 'hide';
			} else {
				passwordInput.type = 'password';
				icon.classList.remove("fa-eye-slash");
				//toggle.innerHTML = 'show';
			}
		}

		function checkInput() {}

		icon.addEventListener('click', togglePassword, false);
		passwordInput.addEventListener('keyup', checkInput, false);
	</script>

	<script type="text/javascript">
		let passwordInput2 = document.getElementById('konfirmasi_password'),
			icon2 = document.getElementById('eyeIcon2');

		function togglePassword2() {
			if (passwordInput2.type === 'password') {
				passwordInput2.type = 'text';
				icon2.classList.add("fa-eye-slash");
				//toggle.innerHTML = 'hide';
			} else {
				passwordInput2.type = 'password';
				icon2.classList.remove("fa-eye-slash");
				//toggle.innerHTML = 'show';
			}
		}

		function checkInput2() {}

		icon2.addEventListener('click', togglePassword2, false);
		passwordInput2.addEventListener('keyup', checkInput2, false);
	</script>

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
		document.getElementById("tanggal_lahir").setAttribute("max", today);
	</script>

</body>

</html>
