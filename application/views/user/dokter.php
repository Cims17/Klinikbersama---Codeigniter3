<?php echo $this->session->flashdata('berhasil_jadwal') ?>
<!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area bg-gradient text-center">
    	<!-- Fixed BG -->
    	<div class="fixed-bg" style="background-image: url(<?= base_url()?>assets/user/img/shape/9.png);"></div>
    	<!-- Fixed BG -->
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-8 offset-lg-2">
    				<h1>List Dokter</h1>
    				<ul class="breadcrumb">
    					<li><a href="#"><i class="fas fa-home"></i> Home</a></li>
    					<li class="active">Doctor</li>
    				</ul>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Team 
    ============================================= -->
    <div class="team-default-area bg-gray default-padding bottom-less">
    	<div class="container">
    		<div class="team-items text-center">
    			<div class="row">
    				<?php foreach ($dokter as $dkt) { ?>
    					<!-- Single Item -->
    					<div class="single-item col-lg-3 col-md-6">
    						<div class="item">
    							<div class="thumb">
    								<img src="<?= base_url() ?>assets/admin/images/dokter/<?= $dkt['foto_dokter'] ?>" alt="Thumb">
    								<div class="contact">
    									<ul>
    										<li>
    											<a href="<?= base_url() ?>Dokter/Daftar/<?= $dkt['id_dokter'] ?>">Daftar</a>
    										</li>
    									</ul>
    								</div>
    							</div>
    							<div class="info">
    								<h5><?= $dkt['nama_dokter'] ?></h5>
    								<span class="text-dark">Spesialis <?= $dkt['spesialis'] ?></span>
									<br>
									<span><?= $dkt['nama_klinik'] ?></span>
    							</div>
    						</div>
    					</div>
    					<!-- End Single Item -->
    				<?php } ?>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- End Team -->
