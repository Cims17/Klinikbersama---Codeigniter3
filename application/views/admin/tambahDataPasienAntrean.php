<div class="page-content">
	<div class="container-fluid">
		<!-- Page-Title -->
		<div class="row">
			<div class="col-sm-12">
				<div class="page-title-box">
					<div class="row">
						<div class="col">
							<h4 class="page-title">Tambah Data Akun Pasien dan Antrean <?php echo $this->session->userdata('username') ?></h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a>Data Antrean Pasien</a></li>
								<li class="breadcrumb-item active">Tambah Data Akun Pasien dan Antrean</li>
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
						<h4 class="card-title">Form Tambah Data Akun Pasien dan Antrean</h4>
					</div>
					<!--end card-header-->
					<form action="<?= base_url() ?>Admin/Data_antrean/Simpan_pasien_antrean/" method="post" enctype="multipart/form-data">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-6">
									<div class="mb-3">
										<label class="form-label" style="color: black;">Nama Pasien</label>
										<input type="text" class="form-control" name="nama_pasien" placeholder="Masukkan Nama Pasien" >
									</div>
									<div class="mb-3">
										<label class="form-label" style="color: black;">Nomor Induk Kependudukan</label>
										<input type="text" class="form-control" name="no_identitas" placeholder="Masukkan NIK" >
									</div>
									<div class="mb-3">
										<label class="form-label" style="color: black;">Tempat Tanggal Lahir</label>
										<div class="row">
											<div class="col-lg-6">
												<input type="text" class="form-control" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" >
											</div>
											<div class="col-lg-6">
												<div class="input-group">
													<input type="text" class="form-control" id="mdate" name="tanggal_lahir" placeholder="Pilih Tanggal Lahir" >
													<span class="input-group-text"><i class="ti ti-calendar font-16"></i></span>
												</div>
											</div>
										</div>
									</div>
									<div class="mb-3">
										<label class="form-label" style="color: black;">Jenis Kelamin</label>
										<select class="form-control select2 custom-select" name="jenis_kelamin" >
											<option value="" selected disabled>Pilih Jenis Kelamin</option>
											<option value="Laki-Laki">Laki-Laki</option>
											<option value="Perempuan">Perempuan</option>
										</select>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="mb-3">
										<label class="form-label" style="color: black;">Agama Pasien</label>
										<select class="form-control select2 custom-select" name="agama_pasien" >
											<option value="" selected disabled>Pilih Agama</option>
											<option value="Islam">Islam</option>
											<option value="Protestan">Protestan</option>
											<option value="Katolik">Katolik</option>
											<option value="Hindu">Hindu</option>
											<option value="Buddha">Buddha</option>
											<option value="Khonghucu">Khonghucu</option>
										</select>
									</div>
									<div class="mb-3">
										<label class="form-label" style="color: black;">Alamat</label>
										<textarea type="text" class="form-control" name="alamat_pasien" ></textarea>
									</div>
									<div class="mb-3">
										<label class="form-label" style="color: black;">Asuransi</label>
										<select class="form-control select2 custom-select" id="asuransi_pasien" name="asuransi_pasien" >
											<option value="" selected disabled>Pilih Asuransi</option>
											<option value="Tidak Ada Asuransi">Tidak Ada Asuransi</option>
											<option value="BPJS Kesehatan">BPJS Kesehatan</option>
										</select>
									</div>
									<div class="mb-3" id="noasuransi_pasien" style="display:none;">
										<label class="form-label" style="color: black;">Nomor Asuransi</label>
										<input type="text" class="form-control" name="no_asuransi" placeholder="Masukkan Nomor Asuransi">
									</div>
								</div>

							</div>
							<hr />
							<div class="row">
								<div class="col-lg-6">
									<div class="mb-3">
										<label class="form-label" style="color: black;">Nomor Whatsapp</label>
										<input type="text" class="form-control" name="no_telepon" placeholder="Masukkan Nomor Whatsapp" >
									</div>

								</div>

								<div class="col-lg-6">
									<div class="mb-3">
										<label class="form-label" style="color: black;">Password</label>
										<input type="text" class="form-control" name="password" >
									</div>
								</div>

							</div>
							<hr />
							<div class="row">
								<div class="col-lg-6">
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
											<input type="text" class="form-control" id="mdateperiksa" name="tanggal_berobat" placeholder="Pilih Tanggal Berobat" >
											<span class="input-group-text"><i class="ti ti-calendar font-16"></i></span>
										</div>
									</div>

								</div>

								<div class="col-lg-6">
									<div class="mb-3">
										<label class="form-label" style="color: black;">Keluhan</label>
										<textarea type="text" class="form-control" name="keluhan" ></textarea>
									</div>
									<div class="mb-3">
										<label class="form-label" style="color: black;">Cara Bayar</label>
										<select class="form-control select2 custom-select" id="cara_bayar" name="cara_bayar" >
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
