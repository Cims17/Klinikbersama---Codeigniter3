<div class="page-content">
	<div class="container-fluid">
		<!-- Page-Title -->
		<div class="row">
			<div class="col-sm-12">
				<div class="page-title-box">
					<div class="row">
						<div class="col">
							<h4 class="page-title">Tambah Data Antrean Pasien <?php echo $this->session->userdata('username') ?></h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a>Data Antrean Pasien</a></li>
								<li class="breadcrumb-item active">Tambah Data Antrean</li>
							</ol>
						</div>
						<!--end col-->
					</div>
					<!--end row-->
				</div>
				<!--end page-title-box-->
			</div>
			<!--end col-->
		</div>
		<!--end row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Form Tambah Data Antrean <?php echo $this->session->userdata('username') ?></h4>
					</div>
					<!--end card-header-->
					<form action="<?php echo base_url() ?>Admin/Data_antrean/Simpan_antrean" method="post" enctype="multipart/form-data">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-6">
									<div class="mb-3">
										<label class="form-label" style="color: black;">Nama Pasien / NIK</label>
										<select class="form-control select2 custom-select" name="id_pasien" >
											<option value="" selected disabled>Pilih Pasien / NIK</option>
											<?php foreach ($pasien as $psn) { ?>
												<option value="<?= $psn['id_pasien'] ?>"><?= $psn['nama_pasien'] ?> / <?= $psn['no_identitas'] ?> </option>
											<?php } ?>
										</select>
									</div>
									<div class="mb-3">
										<label class="form-label" style="color: black;">Nama Dokter / Spesialis</label>
										<select class="form-control select2 custom-select" name="id_dokter" >
											<option value="" selected disabled>Pilih Dokter / Spesialis</option>
											<?php foreach ($dokter as $dkt) { ?>
												<?php if ($dkt['id_user'] ==  $this->session->userdata('id_user')) { ?>
													<option value="<?= $dkt['id_dokter'] ?>"><?= $dkt['nama_dokter'] ?> / <?= $dkt['spesialis'] ?> </option>
												<?php } ?>
											<?php } ?>
										</select>
									</div>
									<div class="mb-3">
										<label class="form-label" style="color: black;">Jadwal Praktik</label>
										<select class="form-control select2 custom-select" name="id_jadwal" >
											<option value="" selected disabled>Pilih Jadwal Praktik</option>
											<?php foreach ($dokter as $dkt) { ?>
												<?php if ($dkt['id_user'] ==  $this->session->userdata('id_user')) { ?>
													<option value="<?= $dkt['id_dokter'] ?>"><?= $dkt['nama_dokter'] ?> / <?= $dkt['spesialis'] ?> </option>
												<?php } ?>
											<?php } ?>
										</select>
									</div>
									<div class="mb-3">
										<label class="form-label" style="color: black;">Tanggal Berobat</label>
										<div class="input-group">
											<input type="text" class="form-control" id="mdateperiksa" name="tanggal_berobat" placeholder="Pilih Tanggal Periksa" >
											<span class="input-group-text"><i class="ti ti-calendar font-16"></i></span>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="mb-3">
										<label class="form-label" style="color: black;">Keluhan</label>
										<textarea type="text" class="form-control" name="keluhan"></textarea>
									</div>
									<div class="mb-3">
										<label class="form-label" style="color: black;">Cara Bayar</label>
										<select class="form-control select2 custom-select" id="cara_bayar" name="cara_bayar">
											<option value="" selected disabled>Pilih Cara Bayar</option>
											<option value="Bayar Mandiri">Bayar Mandiri</option>
											<option value="BPJS Kesehatan">BPJS Kesehatan</option>
										</select>
									</div>
								</div>
							</div>
							<hr />
							<button type="submit" name="submit" class="btn btn-primary">Submit</button>
							<button type="cancel" name="cancel" class="btn btn-danger">Cancel</button>
						</div>
						<!--end card-body-->
					</form>
				</div>
				<!--end card-->
			</div>
			<!--end col-->
		</div>
		<!--end row-->


	</div><!-- container -->
