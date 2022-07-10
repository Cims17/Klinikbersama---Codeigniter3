<?= $this->session->flashdata('berhasil_antrean') ?>
	<!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area bg-gradient text-center">
    	<div class="fixed-bg" style="background-image: url(<?= base_url() ?>assets/user/img/shape/9.png);"></div>
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-8 offset-lg-2">
    				<h1>Antrean</h1>
    				<ul class="breadcrumb">
    					<li><a href="<?= base_url() ?>"><i class="fas fa-home"></i> Home</a></li>
    					<li class="active">Antrean</li>
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
				<?php foreach($antrean as $antr) { ?>
    			<div class="col-lg-12 info mb-3">
    				<div class="card">
    					<div class="card-header bg-gradient">
    						<h4 class="card-title text-light">Antrean Klinik <?= $antr['nama_klinik'] ?></h4>
    					</div>
    					<!--end card-header-->
    					<div class="card-body">
    						<div class="form-group row">
    							<h5 class="col-xl-4 col-lg-4 text-end mb-lg-0 align-self-center">No Antrean</h5>
    							<div class="col-lg-8 col-xl-8">
    								<h5>: <?= $antr['no_antrean'] ?></h5>
    							</div>
    						</div>
    						<div class="form-group row">
    							<h5 class="col-xl-4 col-lg-3 text-end mb-lg-0 align-self-center">Tanggal Berobat</h5>
    							<div class="col-lg-8 col-xl-8">
    								<h5>: <?= $antr['tanggal_berobat'] ?></h5>
    							</div>
    						</div>
    						<div class="form-group row">
    							<h5 class="col-xl-4 col-lg-3 text-end mb-lg-0 align-self-center">Dokter / Spesialis</h5>
    							<div class="col-lg-8 col-xl-8">
    								<h5>: <?= $antr['nama_dokter'] ?> / <?= $antr['spesialis'] ?></h5>
    							</div>
    						</div>

    						<div class="form-group row">
    							<h5 class="col-xl-4 col-lg-3 text-end mb-lg-0 align-self-center">Keluhan</h5>
    							<div class="col-lg-8 col-xl-8">
    								<h5>: <?= $antr['keluhan'] ?></h5>
    							</div>
    						</div>
    						<div class="form-group row">
    							<h5 class="col-xl-4 col-lg-3 text-end mb-lg-0 align-self-center">Cara Bayar</h5>
    							<div class="col-lg-8 col-xl-8">
    								<h5>: <?= $antr['cara_bayar'] ?></h5>
    							</div>
    						</div>
							<hr />
								<div class="d-flex justify-content-start" >
									<?= anchor('Profil/Edit', '<button class="btn btn-danger">Batalkan</button>') ?>
								</div>
    					</div>
    					<!--end card-body-->
    				</div>
    				<!--end card-->
    			</div>
				<?php } ?>
    		</div>
    	</div>
    </div>
    </div>
    <!-- End Department Single -->
