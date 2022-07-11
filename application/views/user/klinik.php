    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area bg-gradient text-center">
    	<!-- Fixed BG -->
    	<div class="fixed-bg" style="background-image: url(<?= base_url()?>assets/user/img/shape/9.png);"></div>
    	<!-- Fixed BG -->
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-8 offset-lg-2">
    				<h1>Klinik</h1>
    				<ul class="breadcrumb">
    					<li><a href="<?= base_url() ?>"><i class="fas fa-home"></i> Home</a></li>
    					<li class="active">Klinik</li>
    				</ul>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Services 
    ============================================= -->
    <div class="department-area carousel-shadow default-padding bg-gray">
    	<div class="container">
    		<div class="department-items text-center">
    			<div class="row">
    				<!-- <div class="col-lg-12"> -->
    				<!-- <div class="department-items department-carousel owl-carousel owl-theme"> -->
    				<?php foreach ($klinik as $knk) { ?>
    					<!-- Single Item -->
						<a href="<?= base_url() ?>Klinik/Profil/<?=  $knk['id_klinik']?>">
    					<div class="single-item col-lg-4 col-md-6" >
    						<div class="item" style="height: 510px;">
    							<div class="thumb">
    								<img src="<?= base_url() ?>assets/admin/images/klinik/<?= $knk['foto_klinik'] ?>" height="200" width="500" alt="Foto Klinik">
    							</div>
    							<div class="info">
    								<h4><a href="<?= base_url() ?>Klinik/Profil/<?=  $knk['id_klinik']?>"><?php echo $knk['nama_klinik'] ?></a></h4>
    								<p>
    									<?php echo $knk['alamat_klinik'] ?>
    								</p>
    								<div class="head-of">
    									<p>
    										<strong>Dokter Penanggung Jawab: </strong> <?php echo $knk['dokter_pj_klinik'] ?>
    									</p>
    								</div>
    								<div class="bottom">
    									<a href="<?= base_url() ?>Klinik/Profil/<?=  $knk['id_klinik']?>"><i class="fas fa-arrow-right"></i></a>
    								</div>
    							</div>
    						</div>
    					</div>
						</a>
    					<!-- End Single Item -->
    				<?php  } ?>

    				<!-- </div> -->
    				<!-- </div> -->
    			</div>
    		</div>
    	</div>
    </div>
    <!-- End Services -->
