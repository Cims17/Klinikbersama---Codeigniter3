    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area bg-gradient text-center">
    	<div class="fixed-bg" style="background-image: url(<?= base_url() ?>assets/user/img/shape/9.png);"></div>
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-8 offset-lg-2">
    				<h1>Edit Profil</h1>
    				<ul class="breadcrumb">
    					<li><a href="<?= base_url() ?>"><i class="fas fa-home"></i> Home</a></li>
    					<li><a href="<?= base_url() ?>Profil">Profil</a></li>
    					<li class="active">Edit Profil</li>
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
    		<div class="row">
    			<div class="col-lg-12 info">
    				<div class="card">
    					<div class="card-header bg-gradient">
    						<h4 class="card-title text-light">Profil Pengguna</h4>
    					</div>
    					<!--end card-header-->
    					<div class="card-body">
    						<form action="<?= base_url() ?>Profil/Update_profil/<?= $user->id_pasien ?>" method="post" enctype="multipart/form-data">

    							<div class="form-group row ">
    								<div class="col-xl-4 col-lg-4">
    									<h5 class="">Nama Pasien</h5>
    								</div>
    								<div class="col-lg-8 col-xl-8">
    									<input class="form-control" type="text" name="nama_pasien" placeholder="" value="<?= $user->nama_pasien ?>" disabled>
    									<small>* Hubungi Admin Klinik Jika Ingin Mengubah Nama Lengkap</small>
    								</div>
    							</div>
    							<div class="form-group row ">
    								<div class="col-xl-4 col-lg-4 text-end mb-lg-0">
    									<h5>Nomor Induk Kependudukan</h5>
    								</div>
    								<div class="col-lg-8 col-xl-8">
    									<input class="form-control" type="text" name="no_identitas" placeholder="" value="<?= $user->no_identitas ?>" disabled>
    									<small>* Hubungi Admin Klinik Jika Ingin Mengubah Nomor Induk Kependudukan</small>
    								</div>
    							</div>
    							<div class="form-group row ">
    								<div class="col-xl-4 col-lg-4 text-end mb-lg-0">
    									<h5>Nomor Whatsapp</h5>
    								</div>
    								<div class="col-lg-8 col-xl-8">
    									<input class="form-control" type="text" name="no_identitas" placeholder="" value="<?= $user->no_telepon ?>" disabled>
    									<small>* Hubungi Admin Klinik Jika Ingin Mengubah Nomor Whatsapp</small>
    								</div>
    							</div>
    							<div class="form-group row ">
    								<div class="col-xl-4 col-lg-4 text-end mb-lg-0">
    									<h5>Tempat Lahir</h5>
    								</div>
    								<div class="col-lg-8 col-xl-8">
    									<input class="form-control" type="text" name="tempat_lahir" placeholder="" value="<?= $user->tempat_lahir ?>">
    									<span class="d-flex ml-2 text-danger"><?php echo  $this->session->flashdata('err_tempat_lahir') ?></span>
    								</div>
    							</div>
    							<div class="form-group row ">
    								<div class="col-xl-4 col-lg-4 text-end mb-lg-0">
    									<h5>Tanggal Lahir</h5>
    								</div>
    								<div class="col-lg-8 col-xl-8">
    									<input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir" placeholder="" value="<?= $user->tanggal_lahir ?>">
    									<span class="d-flex ml-2 text-danger"><?php echo  $this->session->flashdata('err_tanggal_lahir') ?></span>
    								</div>
    							</div>
    							<div class="form-group row ">
    								<div class="col-xl-4 col-lg-4 text-end mb-lg-0">
    									<h5>Alamat</h5>
    								</div>
    								<div class="col-lg-8 col-xl-8">
    									<input class="form-control" type="text" name="alamat_pasien" placeholder="" value="<?= $user->alamat_pasien ?>">
    									<span class="d-flex ml-2 text-danger"><?php echo  $this->session->flashdata('err_alamat_pasien') ?></span>
    								</div>
    							</div>
    							<div class="form-group row ">
    								<div class="col-xl-4 col-lg-4 text-end mb-lg-0">
    									<h5>Jenis Kelamin</h5>
    								</div>
    								<div class="col-lg-8 col-xl-8">
    									<select name="jenis_kelamin" id="">
    										<option value="" disabled>Pilih Jenis Kelamin</option>
    										<option value="Laki-Laki" <?= ($user->jenis_kelamin === 'Laki-Laki') ? 'selected' : '' ?>>Laki-laki</option>
    										<option value="Perempuan" <?= ($user->jenis_kelamin === 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
    									</select>
    									<span class="d-flex ml-2 text-danger"><?php echo  $this->session->flashdata('err_jenis_kelamin') ?></span>
    								</div>
    							</div>
    							<div class="form-group row ">
    								<div class="col-xl-4 col-lg-4 text-end mb-lg-0">
    									<h5>Agama</h5>
    								</div>
    								<div class="col-lg-8 col-xl-8">
    									<select name="agama_pasien" id="">
    										<option value="" disabled> Pilih Agama</option>
    										<option value="Islam" <?= ($user->agama_pasien === 'Islam') ? 'selected' : '' ?>>Islam</option>
    										<option value="Protestan" <?= ($user->agama_pasien === 'Protestan') ? 'selected' : '' ?>>Protestan</option>
    										<option value="Katolik" <?= ($user->agama_pasien === 'Katolik') ? 'selected' : '' ?>>Katolik</option>
    										<option value="Hindu" <?= ($user->agama_pasien === 'Hindu') ? 'selected' : '' ?>>Hindu</option>
    										<option value="Buddha" <?= ($user->agama_pasien === 'Buddha') ? 'selected' : '' ?>>Buddha</option>
    										<option value="Khonghucu" <?= ($user->agama_pasien === 'Khonghucu') ? 'selected' : '' ?>>Khonghucu</option>
    									</select>
    									<span class="d-flex ml-2 text-danger"><?php echo  $this->session->flashdata('err_agama_pasien') ?></span>
    								</div>
    							</div>
    							<div class="form-group row ">
    								<div class="col-xl-4 col-lg-4 text-end mb-lg-0">
    									<h5>Asuransi</h5>
    								</div>
    								<div class="col-lg-8 col-xl-8">
    									<select name="asuransi_pasien" id="asuransi_pasien">
    										<option value="Tidak Ada Asuransi" <?= ($user->asuransi === 'Tidak Ada Asuransi') ? 'selected' : '' ?>>Tidak Ada Asuransi</option>
    										<option value="BPJS Kesehatan" <?= ($user->asuransi === 'BPJS Kesehatan') ? 'selected' : '' ?>>BPJS Kesehatan</option>
    									</select>
    								</div>										
									<span class="d-flex ml-2 text-danger"><?php echo  $this->session->flashdata('err_noasuransi') ?></span>
    							</div>
    							<div class="form-group row " id="noasuransi_pasien" style="display:none;">
    								<div class="col-xl-4 col-lg-4 text-end mb-lg-0">
    									<h5>Nomor Asuransi</h5>
    								</div>
    								<div class="col-lg-8 col-xl-8">
    									<input class="form-control" type="text" name="no_asuransi" placeholder="" value="<?= $user->no_asuransi ?>">
    								</div>
    							</div>

    							<hr />
    							<div class="d-flex justify-content-end">
    								<button class="btn btn-success" type="submit" name="submit" id="f_submit">
    									<i class="fas fa-edit me-2"></i>
    									Edit
    								</button>
    							</div>

    						</form>
    					</div>
    					<!--end card-body-->
    				</div>
    				<!--end card-->
    			</div>

    		</div>
    	</div>
    </div>
    </div>
    <!-- End Department Single -->

    <script type="text/javascript">
    	var select = document.getElementById("asuransi_pasien");
    	select.onchange = function() {
    		if (select.value == "BPJS Kesehatan") {
    			document.getElementById("noasuransi_pasien").style.display = "flex";
    		} else {
    			document.getElementById("noasuransi_pasien").style.display = "none";
    		}
    	}
    	if (select.value == "BPJS Kesehatan") {
    		document.getElementById("noasuransi_pasien").style.display = "flex";
    	} else {
    		document.getElementById("noasuransi_pasien").style.display = "none";
    	}
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
