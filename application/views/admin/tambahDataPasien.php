<div class="page-content">
	<div class="container-fluid">
		<!-- Page-Title -->
		<div class="row">
			<div class="col-sm-12">
				<div class="page-title-box">
					<div class="row">
						<div class="col">
							<h4 class="page-title">Tambah Data Pasien <?php echo $this->session->userdata('username') ?></h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a>Data Pasien</a></li>
								<li class="breadcrumb-item active">Tambah Data Pasien</li>
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
						<h4 class="card-title">Form Tambah Data Pasien <?php echo $this->session->userdata('username') ?></h4>
					</div>
					<!--end card-header-->
					<form action="<?php echo base_url() ?>Admin/Data_pasien/Simpan_pasien" method="post" enctype="multipart/form-data">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-6">
									<div class="mb-3">
										<label class="form-label" style="color: black;">Nama Pasien</label>
										<input type="text" class="form-control" name="nama_pasien" placeholder="Masukkan Nama Pasien" required>
									</div>
									<div class="mb-3">
										<label class="form-label" style="color: black;">Nomor Induk Kependudukan</label>
										<input type="text" class="form-control" name="no_identitas" placeholder="Masukkan NIK" required>
									</div>
									<div class="mb-3">
										<label class="form-label" style="color: black;">Tempat Tanggal Lahir</label>
										<div class="row">
											<div class="col-lg-6">
												<input type="text" class="form-control" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" required>
											</div>
											<div class="col-lg-6">
												<div class="input-group">
													<input type="text" class="form-control" id="mdate" name="tanggal_lahir" required>
													<span class="input-group-text"><i class="ti ti-calendar font-16"></i></span>
												</div>
											</div>
										</div>
									</div>
									<div class="mb-3">
										<label class="form-label" style="color: black;">Jenis Kelamin</label>
										<select class="form-control select2 custom-select" name="jenis_kelamin" required>
											<option value="" selected disabled>Pilih Jenis Kelamin</option>
											<option value="Pria">Pria</option>
											<option value="Wanita">Wanita</option>
										</select>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="mb-3">
										<label class="form-label" style="color: black;">Alamat</label>
										<textarea type="text" class="form-control" name="alamat_pasien" required></textarea>
									</div>
									<div class="mb-3">
										<label class="form-label" style="color: black;">Nomor Telepon</label>
										<input type="text" class="form-control" name="notlp_pasien" placeholder="Masukkan Nomor Telepon Pasien" required>
									</div>
									<div class="mb-3">
									<label class="form-label" style="color: black;">Agama Pasien</label>
										<select class="form-control select2 custom-select" name="agama_pasien" required>
											<option value="" selected disabled>Pilih Agama</option>
											<option value="Islam">Islam</option>
											<option value="Protestan">Protestan</option>
											<option value="Katolik">Katolik</option>
											<option value="Hindu">Hindu</option>
											<option value="Buddha">Buddha</option>
											<option value="Khonghucu">Khonghucu</option>
										</select>
									</div>
								</div>
							</div>
							<hr />
							<button type="submit" class="btn btn-primary">Submit</button>
							<button type="reset" class="btn btn-danger">Cancel</button>
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
