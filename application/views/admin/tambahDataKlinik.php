<div class="page-content">
	<div class="container-fluid">
		<!-- Page-Title -->
		<div class="row">
			<div class="col-sm-12">
				<div class="page-title-box">
					<div class="row">
						<div class="col">
							<h4 class="page-title">Tambah Data Klinik</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a>Data Klinik</a></li>
								<li class="breadcrumb-item active">Tambah Data Klinik</li>
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
						<h4 class="card-title">Tambah Marker Klinik Praktik Bersama</h4>
						<p class="text-muted mb-0">Example of Leaflet map.</p>
					</div>
					<!--end card-header-->
					<div class="card-body">
						<div id="Leaf_default_tambah" class="" style="height: 400px"></div>
					</div>
					<!--end card-body-->
				</div>
				<!--end card-->
			</div> <!-- end col -->
		</div> <!-- end row -->

		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Form Tambah Data Klinik dan Admin Klinik</h4>
					</div>
					<!--end card-header-->
					<form action="<?php echo base_url() ?>Admin/Data_klinik/Simpan_klinik" method="post" enctype="multipart/form-data">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-6">
									<div class="mb-3">
										<label class="form-label" for="kode" style="color: black;">Kode Klinik</label>
										<input type="text" class="form-control" name="kode_klinik" aria-describedby="emailHelp" value="<?php echo $kode_klinik ?>" readonly>
									</div>
									<div class="mb-3">
										<label class="form-label" for="nama" style="color: black;">Nama Klinik</label>
										<input type="text" class="form-control"name="nama_klinik" placeholder="Masukkan Nama Klinik" >
									</div>
									<div class="mb-3">
										<label class="form-label" for="dokterpj" style="color: black;">Dokter Penanggung Jawab</label>
										<input type="text" class="form-control" name="dokter_pj_klinik" placeholder="Masukkan Nama Dokter Penanggung Jawab" >
									</div>
									<div class="mb-3">
										<label class="form-label" for="namapemilik" style="color: black;">Nama Pemilik</label>
										<input type="text" class="form-control" name="nama_pemilik" placeholder="Masukkan Nama Nama Pemilik Klinik" >
									</div>
									<div class="mb-3">
										<label class="form-label" for="alamat" style="color: black;">Alamat Klinik</label>
										<textarea type="text" class="form-control" id="alamat_klinik" name="alamat_klinik" ></textarea>
									</div>
									<div class="mb-3">
										<label class="form-label" for="nama" style="color: black;">Link Google Map</label>
										<input type="text" class="form-control" name="link_gmap" placeholder="Masukkan Link Google Map Klinik" >
									</div>
								</div>

								<div class="col-lg-6">
									<div class="mb-3">
										<label class="form-label" for="foto_klinik" style="color: black;">Foto Klinik</label>
										<div class="col-lg-9 col-xl-8">
											<input type="file" name="foto_klinik" id="input-file-now-custom-1" class="dropify" />
										</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="latitude" style="color: black;">Latitude</label>
										<input type="text" class="form-control" id="latitude" name="latitude" readonly >
										<small class="form-text text-muted">Akan terisi otomatis ketika anda memilih tempat di peta</small>
									</div>
									<div class="mb-3">
										<label class="form-label" for="longitude" style="color: black;">Longitude</label>
										<input type="text" class="form-control" id="longitude" name="longitude" readonly >
										<small class="form-text text-muted">Akan terisi otomatis ketika anda memilih tempat di peta</small>
									</div>
								</div>
							</div>
							<hr />
							<div class="row">
								<div class="col-lg-6">
									<div class="mb-3">
										<label class="form-label" for="email" style="color: black;">Email Klinik</label>
										<input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email Klinik" >
									</div>
									<div class="mb-3">
										<label class="form-label" for="notlpklinik" style="color: black;">Nomor Telepon Klinik</label>
										<input type="text" class="form-control" name="no_telepon" placeholder="Masukkan Nomor Telepon Klinik" >
									</div>
								</div>

								<div class="col-lg-6">
									<div class="mb-3">
										<label class="form-label" for="password" style="color: black;">Password Admin</label>
										<div class="input-group">
											<input type="password" class="form-control" id="password" name="password" placeholder="Password Admin Klinik" >
											<button class="btn btn-secondary" type="button" id="btnToggle"><i id="eyeIcon" class="far fa-eye"></i></button>
										</div>
									</div>
								</div>
							</div>
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
