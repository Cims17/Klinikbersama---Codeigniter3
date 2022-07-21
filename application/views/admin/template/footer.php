
	<footer class="footer text-center text-sm-start">
	DINKES.PNG @ 2022	
	<span class="text-muted d-none d-sm-inline-block float-end"></span>
</footer>
<!--end footer-->
</div>
<!-- end page content -->
</div>
<!-- end page-wrapper -->

<!-- jQuery  -->
<script src="<?= base_url() ?>assets/admin/js/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/admin/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/admin/js/metismenu.min.js"></script>
<script src="<?= base_url() ?>assets/admin/js/waves.js"></script>
<script src="<?= base_url() ?>assets/admin/js/feather.min.js"></script>
<script src="<?= base_url() ?>assets/admin/js/simplebar.min.js"></script>
<script src="<?= base_url() ?>assets/admin/js/moment.js"></script>


<?php if ( $footer == 'beranda'  ) { ?>


<?php } ?>

<?php if ( $footer == 'profilklinik'  ) { ?>

	<script src="<?= base_url() ?>assets/admin/plugins/leaflet/leaflet.js"></script> 
    <script src="<?= base_url() ?>assets/admin/plugins/lightpick/lightpick.js"></script>
	<!-- <script src="<?= base_url() ?>assets/admin/pages/jquery.leaflet-mapedit.init.js"></script>  -->
	<script src="<?= site_url() ?>Admin/Profil_klinik/Map_data_byiduserklinik"></script>
    <script src="<?= base_url() ?>assets/admin/pages/jquery.profile.init.js"></script> 
	<script src="<?= base_url() ?>assets/admin/plugins/dropify/js/dropify.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/pages/jquery.form-upload.init.js"></script>

<?php } ?>

<?php if ( $footer == 'dataklinik'  ) { ?>

		<script src="<?= base_url() ?>assets/admin/plugins/leaflet/leaflet.js"></script> 
		<script src="<?= site_url() ?>Admin/Data_klinik/Map_data_klinik"></script>
		<script src="<?= base_url() ?>assets/admin/pages/jquery.leaflet-map.init.js"></script> 

		<!-- Sweet-Alert  -->
		<script src="<?= base_url() ?>assets/admin/plugins/sweet-alert2/sweetalert2.min.js"></script>

		<script type="text/javascript">

		!function ($) {

			var SweetAlert = function () {
				};
			SweetAlert.prototype.init = function () {
				$(".remove").click(function() {
						var id = $(this).parents("tr").attr("id");
						swal.fire({
										title: 'Hapus Data Klinik?',
										text: "Anda tidak akan dapat mengembalikan data ini!",
										type: 'warning',
										showCancelButton: true,
										confirmButtonText: 'Yes, delete it!',
										cancelButtonText: 'No, cancel!',
										reverseButtons: true
									}).then(function(result) {
										if (result.value) {
											$.ajax({
												url: '<?= base_url() ?>Admin/Data_klinik/Delete_klinik/' + id,
												type: 'DELETE',
												error: function() {
														alert('Something is wrong');
												},
												success: function(data) {
													swal.fire(
												'Deleted!',
												'Data Klinik Dihapus',
												'success'
											).then(function() {
																location.reload();
														});
												}
										});
											
										} else if (
											// Read more about handling dismissals
											result.dismiss === Swal.DismissReason.cancel
										) {
											swal.fire(
												'Cancelled',
												'Data Klinik Aman',
												'error'
											)
										}
									})
				});
				$(".aktivasi").click(function() {
						var id = $(this).parents("tr").attr("id");
						swal.fire({
										title: 'Aktivasi Data Klinik?',
										text: "Anda Akan Mengaktifkan Admin Klinik!",
										type: 'warning',
										showCancelButton: true,
										confirmButtonText: 'Yes!',
										cancelButtonText: 'No, cancel!',
										reverseButtons: true
									}).then(function(result) {
										if (result.value) {
											$.ajax({
												url: '<?= base_url() ?>Admin/Data_klinik/Aktivasi_klinik/' + id,
												type: 'DELETE',
												error: function() {
														alert('Something is wrong');
												},
												success: function(data) {
													swal.fire(
												'Deleted!',
												'Data Klinik Diaktivasi',
												'success'
											).then(function() {
																location.reload();
														});
												}
										});
											
										} else if (
											// Read more about handling dismissals
											result.dismiss === Swal.DismissReason.cancel
										) {
											swal.fire(
												'Cancelled',
												'Data Klinik Tidak Diaktivasi',
												'error'
											)
										}
									})
				});
			},
				//init
				$.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
		}(window.jQuery),
		//initializing
		function ($) {
						"use strict";
						$.SweetAlert.init()
				}(window.jQuery);
		</script>

<?php } ?>

<?php if ( $footer == 'tambahdataklinik'  ) { ?>

	
	<script src="<?= base_url() ?>assets/admin/plugins/dropify/js/dropify.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/pages/jquery.form-upload.init.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/leaflet/leaflet.js"></script> 
<script src="<?= base_url() ?>assets/admin/pages/jquery.leaflet-maptambah.init.js"></script> 

<script type="text/javascript">
	let passwordInput = document.getElementById('password'),
    toggle = document.getElementById('btnToggle'),
    icon =  document.getElementById('eyeIcon');

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

	function checkInput() {
	}

	toggle.addEventListener('click', togglePassword, false);
	passwordInput.addEventListener('keyup', checkInput, false);
</script>

<?php } ?>

<?php if ( $footer == 'detailklinik'  ) { ?>

<script src="<?= base_url() ?>assets/admin/plugins/leaflet/leaflet.js"></script> 
<script src="<?= base_url() ?>assets/admin/plugins/lightpick/lightpick.js"></script>
<script src="<?= site_url() ?>Admin/Data_klinik/Map_data_byidklinik_admin/<?=  $klinik->id_klinik ?>"></script>
<script src="<?= base_url() ?>assets/admin/pages/jquery.profile.init.js"></script> 
<script src="<?= base_url() ?>assets/admin/plugins/dropify/js/dropify.min.js"></script>
<script src="<?= base_url() ?>assets/admin/pages/jquery.form-upload.init.js"></script>
<script src="<?= base_url() ?>assets/admin/pages/jquery.leaflet-maptambah.init.js"></script> 

<?php } ?>

<?php if ( $footer == 'dataadminklinik'  ) { ?>

	<script src="<?= base_url() ?>assets/admin/plugins/select2/select2.min.js"></script>
	<script src="<?= base_url() ?>assets/admin/pages/jquery.forms-advanced.js"></script>

	<script>
		$('#select2klinik').select2({
        width: '100%',
        dropdownParent: $("#tambah_admin_klinik")
    })	
	</script>


<?php } ?>

<?php if ( $footer == 'dataakunpasien'  ) { ?>

<!-- Sweet-Alert  -->
<script src="<?= base_url() ?>assets/admin/plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/select2/select2.min.js"></script>
<script src="<?= base_url() ?>assets/admin/pages/jquery.forms-advanced.js"></script>

<script type="text/javascript">

		!function ($) {

			var SweetAlert = function () {
				};
			SweetAlert.prototype.init = function () {
				$(".remove").click(function() {
						var id = $(this).parents("tr").attr("id");
						swal.fire({
										title: 'Hapus Data Akun Pasien?',
										text: "Anda tidak akan dapat mengembalikan data ini!",
										type: 'warning',
										showCancelButton: true,
										confirmButtonText: 'Yes, delete it!',
										cancelButtonText: 'No, cancel!',
										reverseButtons: true
									}).then(function(result) {
										if (result.value) {
											$.ajax({
												url: '<?= base_url() ?>Admin/Pasien/Delete_pasien/' + id,
												type: 'DELETE',
												error: function() {
														alert('Something is wrong');
												},
												success: function(data) {
													swal.fire(
												'Deleted!',
												'Data Akun Pasien Dihapus',
												'success'
											).then(function() {
																location.reload();
														});
												}
										});
											
										} else if (
											// Read more about handling dismissals
											result.dismiss === Swal.DismissReason.cancel
										) {
											swal.fire(
												'Cancelled',
												'Data Akun Pasien Aman',
												'error'
											)
										}
									})
				});
			},
				//init
				$.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
		}(window.jQuery),
		//initializing
		function ($) {
						"use strict";
						$.SweetAlert.init()
				}(window.jQuery);
</script>

<?php } ?>

<?php if ( $footer == 'tambahdataakunpasien') { ?>
	<script src="<?= base_url() ?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/select2/select2.min.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
	<script src="<?= base_url() ?>assets/admin/pages/jquery.forms-advanced.js"></script>

	<script type="text/javascript">
		var select = document.getElementById("asuransi_pasien");
		// select = function() {
			if (select.value == "BPJS Kesehatan") {
				document.getElementById("noasuransi_pasien").style.display = "inline";
			} else {
				document.getElementById("noasuransi_pasien").style.display = "none";
			}

		// }
		select.onchange = function() {
			if (select.value == "BPJS Kesehatan") {
				document.getElementById("noasuransi_pasien").style.display = "inline";
			} else {
				document.getElementById("noasuransi_pasien").style.display = "none";
			}

		}
	</script>

<?php } ?>

<?php if ( $footer == 'editdataakunpasien') { ?>
	<script src="<?= base_url() ?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/select2/select2.min.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
	<script src="<?= base_url() ?>assets/admin/pages/jquery.forms-advanced.js"></script>

	<script type="text/javascript">
		var select = document.getElementById("asuransi_pasien");
		// select = function() {
			if (select.value == "BPJS Kesehatan") {
				document.getElementById("noasuransi_pasien").style.display = "inline";
			} else {
				document.getElementById("noasuransi_pasien").style.display = "none";
			}

		// }
		select.onchange = function() {
			if (select.value == "BPJS Kesehatan") {
				document.getElementById("noasuransi_pasien").style.display = "inline";
			} else {
				document.getElementById("noasuransi_pasien").style.display = "none";
			}

		}
	</script>

<?php } ?>

<?php if ( $footer == 'datadokter') { ?>

	<!-- Sweet-Alert  -->
	<script src="<?= base_url() ?>assets/admin/plugins/sweet-alert2/sweetalert2.min.js"></script>

	<script type="text/javascript">

		!function ($) {

			var SweetAlert = function () {
				};
			SweetAlert.prototype.init = function () {
				$(".remove").click(function() {
						var id = $(this).parents("tr").attr("id");
						swal.fire({
										title: 'Hapus Data Dokter?',
										text: "Anda tidak akan dapat mengembalikan data ini!",
										type: 'warning',
										showCancelButton: true,
										confirmButtonText: 'Yes, delete it!',
										cancelButtonText: 'No, cancel!',
										reverseButtons: true
									}).then(function(result) {
										if (result.value) {
											$.ajax({
												url: '<?= base_url() ?>Admin/Data_dokter/Delete_dokter/' + id,
												type: 'DELETE',
												error: function() {
														alert('Something is wrong');
												},
												success: function(data) {
													swal.fire(
												'Deleted!',
												'Data Dokter Dihapus',
												'success'
											).then(function() {
																location.reload();
														});
												}
										});
											
										} else if (
											// Read more about handling dismissals
											result.dismiss === Swal.DismissReason.cancel
										) {
											swal.fire(
												'Cancelled',
												'Data Dokter Aman',
												'error'
											)
										}
									})
				});
			},
				//init
				$.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
		}(window.jQuery),
		//initializing
		function ($) {
						"use strict";
						$.SweetAlert.init()
				}(window.jQuery);
		</script>

<?php } ?>

<?php if ( $footer == 'tambahdatadokter') { ?>
	<script src="<?= base_url() ?>assets/admin/plugins/dropify/js/dropify.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/pages/jquery.form-upload.init.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/select2/select2.min.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
	<script src="<?= base_url() ?>assets/admin/pages/jquery.forms-advanced.js"></script>

<?php } ?>

<?php if ( $footer == 'editdatadokter') { ?>
	<script src="<?= base_url() ?>assets/admin/plugins/dropify/js/dropify.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/pages/jquery.form-upload.init.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/select2/select2.min.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
	<script src="<?= base_url() ?>assets/admin/pages/jquery.forms-advanced.js"></script>

<?php } ?>

<?php if ( $footer == 'datapasien') { ?>

	<!-- Sweet-Alert  -->
	<script src="<?= base_url() ?>assets/admin/plugins/sweet-alert2/sweetalert2.min.js"></script>

	<script type="text/javascript">

		!function ($) {

			var SweetAlert = function () {
				};
			SweetAlert.prototype.init = function () {
				$(".remove").click(function() {
						var id = $(this).parents("tr").attr("id");
						swal.fire({
										title: 'Hapus Data Pasien?',
										text: "Anda tidak akan dapat mengembalikan data ini!",
										type: 'warning',
										showCancelButton: true,
										confirmButtonText: 'Yes, delete it!',
										cancelButtonText: 'No, cancel!',
										reverseButtons: true
									}).then(function(result) {
										if (result.value) {
											$.ajax({
												url: '<?= base_url() ?>Admin/Data_pasien/Delete_pasien/' + id,
												type: 'DELETE',
												error: function() {
														alert('Something is wrong');
												},
												success: function(data) {
													swal.fire(
												'Deleted!',
												'Data Pasien Dihapus',
												'success'
											).then(function() {
																location.reload();
														});
												}
										});
											
										} else if (
											// Read more about handling dismissals
											result.dismiss === Swal.DismissReason.cancel
										) {
											swal.fire(
												'Cancelled',
												'Data Pasien Aman',
												'error'
											)
										}
									})
				});
			},
				//init
				$.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
		}(window.jQuery),
		//initializing
		function ($) {
						"use strict";
						$.SweetAlert.init()
				}(window.jQuery);
		</script>

<?php } ?>

<?php if ( $footer == 'tambahdatapasien') { ?>
	<script src="<?= base_url() ?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/select2/select2.min.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
	<script src="<?= base_url() ?>assets/admin/pages/jquery.forms-advanced.js"></script>

<?php } ?>

<?php if ( $footer == 'editdatapasien') { ?>
	<script src="<?= base_url() ?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/select2/select2.min.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
	<script src="<?= base_url() ?>assets/admin/pages/jquery.forms-advanced.js"></script>

	<script type="text/javascript">
		var select = document.getElementById("asuransi_pasien");
		// select = function() {
			if (select.value == "BPJS Kesehatan") {
				document.getElementById("noasuransi_pasien").style.display = "inline";
			} else {
				document.getElementById("noasuransi_pasien").style.display = "none";
			}

		// }
		select.onchange = function() {
			if (select.value == "BPJS Kesehatan") {
				document.getElementById("noasuransi_pasien").style.display = "inline";
			} else {
				document.getElementById("noasuransi_pasien").style.display = "none";
			}

		}
	</script>

<?php } ?>

<?php if ( $footer == 'datajadwal') { ?>

<!-- Sweet-Alert  -->
<script src="<?= base_url() ?>assets/admin/plugins/sweet-alert2/sweetalert2.min.js"></script>

<script type="text/javascript">

	!function ($) {

		var SweetAlert = function () {
			};
		SweetAlert.prototype.init = function () {
			$(".remove").click(function() {
					var id = $(this).parents("tr").attr("id");
					swal.fire({
									title: 'Hapus Data Jadwal Dokter?',
									text: "Anda tidak akan dapat mengembalikan data ini!",
									type: 'warning',
									showCancelButton: true,
									confirmButtonText: 'Yes, delete it!',
									cancelButtonText: 'No, cancel!',
									reverseButtons: true
								}).then(function(result) {
									if (result.value) {
										$.ajax({
											url: '<?= base_url() ?>Admin/Data_jadwal/Delete_jadwal/' + id,
											type: 'DELETE',
											error: function() {
													alert('Something is wrong');
											},
											success: function(data) {
												swal.fire(
											'Deleted!',
											'Data Jadwal Dokter Dihapus',
											'success'
										).then(function() {
															location.reload();
													});
											}
									});
										
									} else if (
										// Read more about handling dismissals
										result.dismiss === Swal.DismissReason.cancel
									) {
										swal.fire(
											'Cancelled',
											'Data Jadwal Dokter Aman',
											'error'
										)
									}
								})
			});
		},
			//init
			$.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
	}(window.jQuery),
	//initializing
	function ($) {
					"use strict";
					$.SweetAlert.init()
			}(window.jQuery);
	</script>

<?php } ?>

<?php if ( $footer == 'tambahdatajadwal') { ?>
	<script src="<?= base_url() ?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/select2/select2.min.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
	<script src="<?= base_url() ?>assets/admin/pages/jquery.forms-advanced.js"></script>

<?php } ?>

<?php if ( $footer == 'editdatajadwal') { ?>
	<script src="<?= base_url() ?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/select2/select2.min.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
	<script src="<?= base_url() ?>assets/admin/pages/jquery.forms-advanced.js"></script>

<?php } ?>

<?php if ( $footer == 'dataantrean') { ?>

	<script src="<?= base_url() ?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/select2/select2.min.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
	<script src="<?= base_url() ?>assets/admin/pages/jquery.forms-advanced.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/sweet-alert2/sweetalert2.min.js"></script>

<script type="text/javascript"> 
$(document).ready(function() {
	<?php foreach ($dokter as $dkt) { 
		if ($dkt['id_user'] ==  $this->session->userdata('id_user')) { ?>
 	 $('#dataantrean<?= $dkt['id_dokter'] ?>').DataTable();

	<?php } } ?>
    
} );
</script>

<script type="text/javascript">

	!function ($) {

		var SweetAlert = function () {
			};
		SweetAlert.prototype.init = function () {
			$(".remove").click(function() {
					var id = $(this).parents("tr").attr("id");
					swal.fire({
									title: 'Hapus Data Antrean ?',
									text: "Anda tidak akan dapat mengembalikan data ini!",
									type: 'warning',
									showCancelButton: true,
									confirmButtonText: 'Yes, delete it!',
									cancelButtonText: 'No, cancel!',
									reverseButtons: true
								}).then(function(result) {
									if (result.value) {
										$.ajax({
											url: '<?= base_url() ?>Admin/Data_antrean/Delete_antrean/' + id,
											type: 'DELETE',
											error: function() {
													alert('Something is wrong');
											},
											success: function(data) {
												swal.fire(
											'Selesai',
											'Data Antrean Dihapus',
											'success'
										).then(function() {
															location.reload();
													});
											}
									});
										
									} else if (
										// Read more about handling dismissals
										result.dismiss === Swal.DismissReason.cancel
									) {
										swal.fire(
											'Dibatalkan',
											'Data Antrean Aman',
											'error'
										)
									}
								})
			});

			$(".riwayat_antrean").click(function() {
					var id = $(this).parents("tr").attr("id");
					swal.fire({
									title: 'Pasien Sudah Diperiksa ?',
									text: "Anda tidak akan dapat mengembalikan data ini!",
									type: 'warning',
									showCancelButton: true,
									confirmButtonText: 'Sudah Diperiksa',
									cancelButtonText: 'Belum Diperiksa',
									reverseButtons: true
								}).then(function(result) {
									if (result.value) {
										$.ajax({
											url: '<?= base_url() ?>Admin/Data_antrean/Tambah_riwayat_antrean/' + id,
											type: 'DELETE',
											error: function() {
													alert('Something is wrong');
											},
											success: function(data) {
												swal.fire(
											'Deleted!',
											'Pasien Sudah Diperiksa',
											'success'
										).then(function() {
															location.reload();
													});
											}
									});
										
									} else if (
										// Read more about handling dismissals
										result.dismiss === Swal.DismissReason.cancel
									) {
										swal.fire(
											'Cancelled',
											'Pasien Belum Diperiksa',
											'error'
										)
									}
								})
			});
		},
			//init
			$.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
	}(window.jQuery),
	//initializing
	function ($) {
					"use strict";
					$.SweetAlert.init()
			}(window.jQuery);
	</script>

<?php } ?>

<?php if ( $footer == 'tambahdataantrean') { ?>
	<script src="<?= base_url() ?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/select2/select2.min.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
	<script src="<?= base_url() ?>assets/admin/pages/jquery.forms-advanced.js"></script>
	<script>
		$(document).ready(function() {
			$('#nama_dokter').on('change', function() {
			x = $(this).val();
			fetch("<?= base_url('Admin/Data_antrean/Jadwal_praktik/') ?>" + x, {
					method: 'GET',
				})
				.then((response) => response.text())
				.then((data) => {
					$('#jadwal_praktik option:not(:first)').remove();

					$('#jadwal_praktik').append(data); //menambah data option select dari controller
				})
		});
		});
	</script>
	

<?php } ?>
<?php if ( $footer == 'tambahdatapasienantrean') { ?>
	<script src="<?= base_url() ?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/select2/select2.min.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
	<script src="<?= base_url() ?>assets/admin/pages/jquery.forms-advanced.js"></script>

	<script type="text/javascript">
		var select = document.getElementById("asuransi_pasien");
		// select = function() {
			if (select.value == "BPJS Kesehatan") {
				document.getElementById("noasuransi_pasien").style.display = "inline";
			} else {
				document.getElementById("noasuransi_pasien").style.display = "none";
			}

		// }
		select.onchange = function() {
			if (select.value == "BPJS Kesehatan") {
				document.getElementById("noasuransi_pasien").style.display = "inline";
			} else {
				document.getElementById("noasuransi_pasien").style.display = "none";
			}

		}
	</script>

	<script>
		$(document).ready(function() {
			$('#nama_dokter').on('change', function() {
			x = $(this).val();
			fetch("<?= base_url('Admin/Data_antrean/Jadwal_praktik/') ?>" + x, {
					method: 'GET',
				})
				.then((response) => response.text())
				.then((data) => {
					$('#jadwal_praktik option:not(:first)').remove();

					$('#jadwal_praktik').append(data); //menambah data option select dari controller
				})
		});
		});
	</script>

<?php } ?>

<script src="<?= base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap5.min.js"></script>

<script src="<?= base_url() ?>assets/admin/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>




<!-- Buttons examples -->

<script src="<?= base_url() ?>assets/admin/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables/buttons.bootstrap5.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="<?= base_url() ?>assets/admin/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/admin/pages/jquery.datatable.init.js"></script>


<!-- App js -->
<script src="<?= base_url() ?>assets/admin/js/app.js"></script>

</body>

</html>
