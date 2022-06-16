<div class="page-content">
	<div class="container-fluid">
		<!-- Page-Title -->
		<div class="row">
			<div class="col-sm-12">
				<div class="page-title-box">
					<div class="row">
						<div class="col">
							<h4 class="page-title">Edit Data Pasien <?php echo $this->session->userdata('username') ?></h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a>Data Pasien</a></li>
								<li class="breadcrumb-item active">Edit Data Pasien</li>
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
						<h4 class="card-title">Form Edit Data Pasien</h4>
					</div>
					<!--end card-header-->
					<form action="<?php echo base_url() ?>Admin/Data_pasien/Update_pasien/<?= $pasien->id_pasien ?>" method="post" enctype="multipart/form-data">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-6">
									<div class="mb-3">
										<label class="form-label" style="color: black;">Nama Pasien</label>
										<input type="text" class="form-control" name="nama_pasien" value="<?= $pasien->nama_pasien ?>" placeholder="Masukkan Nama Pasien" required>
									</div>
									<div class="mb-3">
										<label class="form-label" style="color: black;">Nomor Induk Kependudukan</label>
										<input type="text" class="form-control" name="no_identitas" value="<?= $pasien->no_identitas ?>" placeholder="Masukkan NIK" required>
									</div>
									<div class="mb-3">
										<label class="form-label" style="color: black;">Tempat Tanggal Lahir</label>
										<div class="row">
											<div class="col-lg-6">
												<input type="text" class="form-control" name="tempat_lahir" value="<?= $pasien->tempat_lahir ?>" placeholder="Masukkan Tempat Lahir" required>
											</div>
											<div class="col-lg-6">
												<div class="input-group">
													<input type="text" class="form-control" id="mdate" name="tanggal_lahir" value="<?= $pasien->tanggal_lahir ?>" required>
													<span class="input-group-text"><i class="ti ti-calendar font-16"></i></span>
												</div>
											</div>
										</div>
									</div>
									<div class="mb-3">
										<label class="form-label" style="color: black;">Jenis Kelamin</label>
										<select class="form-control select2 custom-select" name="jenis_kelamin" required>
											<option value="" selected disabled>Pilih Jenis Kelamin</option>
											<option value="Pria" <?= ($pasien->jenis_kelamin === 'Pria') ? 'selected' : '' ?>>Pria</option>
											<option value="Wanita" <?= ($pasien->jenis_kelamin === 'Wanita') ? 'selected' : '' ?>>Wanita</option>
										</select>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="mb-3">
										<label class="form-label" style="color: black;">Alamat</label>
										<textarea type="text" class="form-control" name="alamat_pasien" required><?= $pasien->alamat_pasien ?></textarea>
									</div>
									<div class="mb-3">
										<label class="form-label" style="color: black;">Nomor Telepon</label>
										<input type="text" class="form-control" name="notlp_pasien" value="<?= $pasien->no_telepon ?>" placeholder="Masukkan Nomor Telepon Pasien" required>
									</div>
									<div class="mb-3">
										<label class="form-label" style="color: black;">Agama Pasien</label>
										<select class="form-control select2 custom-select" name="agama_pasien" required>
											<option value="" selected disabled>Pilih Agama</option>
											<option value="Islam" <?= ($pasien->agama_pasien === 'Islam') ? 'selected' : '' ?>>Islam</option>
											<option value="Protestan" <?= ($pasien->agama_pasien === 'Protestan') ? 'selected' : '' ?>>Protestan</option>
											<option value="Katolik" <?= ($pasien->agama_pasien === 'Katolik') ? 'selected' : '' ?>>Katolik</option>
											<option value="Hindu" <?= ($pasien->agama_pasien === 'Hindu') ? 'selected' : '' ?>>Hindu</option>
											<option value="Buddha" <?= ($pasien->agama_pasien === 'Buddha') ? 'selected' : '' ?>>Buddha</option>
											<option value="Khonghucu" <?= ($pasien->agama_pasien === 'Khonghucu') ? 'selected' : '' ?>>Khonghucu</option>
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
