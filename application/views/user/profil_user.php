    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area bg-gradient text-center">
    	<div class="fixed-bg" style="background-image: url(<?= base_url() ?>assets/user/img/shape/9.png);"></div>
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-8 offset-lg-2">
    				<h1>Profil</h1>
    				<ul class="breadcrumb">
    					<li><a href="<?= base_url() ?>"><i class="fas fa-home"></i> Home</a></li>
    					<li class="active">Profil</li>
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
    						<div class="form-group row">
    							<h5 class="col-xl-4 col-lg-4 text-end mb-lg-0 align-self-center">Nama Lengkap</h5>
    							<div class="col-lg-8 col-xl-8">
    								<h5>: <?= $user->nama_pasien ?></h5>
    							</div>
    						</div>
    						<div class="form-group row">
    							<h5 class="col-xl-4 col-lg-3 text-end mb-lg-0 align-self-center">Nomor Induk Kependudukan</h5>
    							<div class="col-lg-8 col-xl-8">
    								<h5>: <?= $user->no_identitas ?></h5>
    							</div>
    						</div>
    						<div class="form-group row">
    							<h5 class="col-xl-4 col-lg-3 text-end mb-lg-0 align-self-center">Tempat Lahir</h5>
    							<div class="col-lg-8 col-xl-8">
    								<h5>: <?= $user->tempat_lahir ?></h5>
    							</div>
    						</div>

    						<div class="form-group row">
    							<h5 class="col-xl-4 col-lg-3 text-end mb-lg-0 align-self-center">Tanggal Lahir</h5>
    							<div class="col-lg-8 col-xl-8">
    								<h5>: <?= $user->tanggal_lahir ?></h5>
    							</div>
    						</div>
    						<div class="form-group row">
    							<h5 class="col-xl-4 col-lg-3 text-end mb-lg-0 align-self-center">Alamat</h5>
    							<div class="col-lg-8 col-xl-8">
    								<h5>: <?= $user->alamat_pasien ?></h5>
    							</div>
    						</div>
    						<div class="form-group row">
    							<h5 class="col-xl-4 col-lg-3 text-end mb-lg-0 align-self-center">Jenis Kelamin</h5>
    							<div class="col-lg-8 col-xl-8">
    								<h5>: <?= $user->jenis_kelamin ?></h5>
    							</div>
    						</div>
    						<div class="form-group row">
    							<h5 class="col-xl-4 col-lg-3 text-end mb-lg-0 align-self-center">Agama</h5>
    							<div class="col-lg-8 col-xl-8">
    								<h5>: <?= $user->agama_pasien ?></h5>
    							</div>
    						</div>
    						<div class="form-group row">
    							<h5 class="col-xl-4 col-lg-3 text-end mb-lg-0 align-self-center">Asuransi</h5>
    							<div class="col-lg-8 col-xl-8">
    								<h5>: <?= $user->asuransi ?></h5>
    							</div>
    						</div>
    						<?php if ($user->asuransi == 'BPJS Kesehatan') { ?>
    							<div class="form-group row">
    								<h5 class="col-xl-4 col-lg-3 text-end mb-lg-0 align-self-center">Nomor Asuransi</h5>
    								<div class="col-lg-8 col-xl-8">
    									<h5>: <?= $user->no_asuransi ?></h5>
    								</div>
    							</div>
    						<?php } ?>
    						<hr />
    						<button class="btn btn-success"><i class="fas fa-edit me-2"></i>Edit</button>
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
