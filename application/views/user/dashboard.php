   <!-- Start Banner 
    ============================================= -->
	<?= $this->session->flashdata('berhasil_dashboard') ?>
   <div class="banner-area content-less">
   	<div id="bootcarousel" class="carousel text-large slide carousel-fade animate_text" data-ride="carousel">

   		<!-- Wrapper for slides -->
   		<div class="carousel-inner carousel-zoom">
   			<div class="carousel-item active">
   				<div class="slider-thumb bg-cover" style="background-image: url(assets/user/img/banner/10.png);"></div>
   				<div class="box-table">
   					<div class="box-cell">
   						<div class="container">
   							<div class="row">
   								<div class="col-lg-9">
   									<div class="content">
   										<h2 data-animation="animated slideInRight">Temukan <strong>Dokter Terbaik</strong></h2>
   										<h4 data-animation="animated slideInDown">Dapatkan Perawatan Terbaik</h4>
   										<a data-animation="animated fadeInUp" class="btn btn-md btn-gradient" href="<?= base_url() ?>Dokter"><i class="fas fa-angle-right"></i> Jelajahi</a>
   									</div>
   								</div>
   							</div>
   						</div>
   					</div>
   				</div>
   			</div>
   			<div class="carousel-item">
   				<div class="slider-thumb bg-cover" style="background-image: url(assets/user/img/banner/11.jpg);"></div>
   				<div class="box-table">
   					<div class="box-cell">
   						<div class="container">
   							<div class="row">
   								<div class="col-lg-9">
   									<div class="content">
   										<h2 data-animation="animated slideInRight">Temukan <strong>Klinik Terbaik</strong></h2>
   										<h4 data-animation="animated slideInDown">Dapatkan Pelayanan Terbaik</h4>
   										<a data-animation="animated fadeInUp" class="btn btn-md btn-gradient" href="<?= base_url() ?>Klinik"><i class="fas fa-angle-right"></i> Jelajahi</a>
   									</div>
   								</div>
   							</div>
   						</div>
   					</div>
   				</div>
   			</div>
   		</div>
   		<!-- End Wrapper for slides -->

   		<!-- Left and right controls -->
   		<a class="left carousel-control theme" href="#bootcarousel" data-slide="prev">
   			<i class="fa fa-angle-left"></i>
   			<span class="sr-only">Previous</span>
   		</a>
   		<a class="right carousel-control theme" href="#bootcarousel" data-slide="next">
   			<i class="fa fa-angle-right"></i>
   			<span class="sr-only">Next</span>
   		</a>

   	</div>
   </div>
   <!-- End Banner -->



   <!-- Start Facilities
    ============================================= -->
   <div class="facilites-area default-padding-bottom">
   	<div class="container">
   	</div>
   </div>
   <!-- End Facilities -->

   <!-- Start Choose Us Area 
    ============================================= -->
   <div class="chooseus-area relative default-padding-bottom">
   	<div class="container">
   		<div class="chooseus-box">
   			<div class="row align-center">

   				<div class="col-lg-6 info">
   					<h2>Temukan <strong>layanan kesehatan terbaik</strong></h2>
   					<ul>
   						<li>
   							<h5>Pelayanan kesehatan yang mengutamakan profesionalisme</h5>
   						</li>
   						<li>
   							<h5>Kemudahan pendaftaran via website</h5>
   						</li>
   						<li>
   							<h5>Dokter dan perawat yang ahli dan handal</h5>
   						</li>
   						<li>
   							<h5>Kemudahan mencari dokter dan klinik terdekat</h5>
   						</li>
   					</ul>
   					<a class="btn btn-md btn-gradient" href="<?= base_url() ?>Auth/Registrasi"><i class="fas fa-angle-right"></i> Daftar Calon Pasien</a>
   				</div>

   				<div class="col-lg-6">
   					<!-- <div class="thumb"> -->
   					<img src="<?= base_url() ?>assets/user/img/thumb/4.png" alt="Thumb">
   					<!-- </div> -->
   				</div>

   			</div>
   		</div>
   	</div>
   	<!-- Shape -->
   	<div class="shape-bottom shape">
   		<img src="<?= base_url() ?>assets/user/img/shape/12.png" alt="Shape">
   	</div>
   	<!-- End Shape -->
   </div>
   <!-- End Choose Us Area  -->

   <!-- Start Fun Factor Area
    ============================================= -->
   <div class="fun-factor-area half-bg-gray-bottom bg-gray default-padding-bottom">
   	<div class="container">
   		<div class="fun-fact-items bg-gradient text-light text-center">
   			<div class="row">
   				<div class="col-lg-6 col-md-6 item">
   					<div class="fun-fact">
   						<div class="timer" data-to="<?= $dokter ?>" data-speed="1500"></div>
   						<h2 class="medium">Dokter</h2>
   					</div>
   				</div>
   				<div class="col-lg-6 col-md-6 item">
   					<div class="fun-fact">
   						<div class="timer" data-to="<?= $klinik ?>" data-speed="1500"></div>
   						<h2 class="medium">Klinik</h2>
   					</div>
   				</div>
   			</div>
   		</div>
   	</div>
   </div>
   <!-- End Fun Factor Area -->

   <!-- Start Choose Us Area 
    ============================================= -->
   <div class="chooseus-area relative default-padding-bottom bg-gray">
   	<div class="container">
   		<div class="chooseus-box">
   			<div class="row align-center">

   				<div class="col-lg-6">
   					<img src="<?= base_url() ?>assets/user/img/thumb/6.png" alt="Thumb">
   				</div>

   				<div class="col-lg-6 info">
   					<h2>Mari Bergabung menjadi mitra Klinik <strong>Jadilah bagian dari Mitra Klinik, bersama meningkatkan kualitas layanan kesehatan. </strong></h2>
   					<ul>
   						<li>
   							<h5>Penyediaan sistem antrean online</h5>
   						</li>
   						<li>
   							<h5>Pengelolaan dokter beserta jadwal praktek</h5>
   						</li>
						   <li>
   							<h5>Penyediaan sistem pendaftaran pasien</h5>
   						</li>
						   <li>
   							<h5>Pengelolaan data pasien</h5>
   						</li>
   					</ul>
   					<a class="btn btn-md btn-gradient" href="<?= base_url() ?>Auth/Registrasi/Mitra_klinik"><i class="fas fa-angle-right"></i>Daftar Mitra Klinik</a>
   				</div>

   			</div>
   		</div>
   	</div>
   	<!-- Shape -->
   	<div class="shape-bottom shape">
   		<img src="<?= base_url() ?>assets/user/img/shape/12.png" alt="Shape">
   	</div>
   	<!-- End Shape -->
   </div>
   <!-- End Choose Us Area  -->
