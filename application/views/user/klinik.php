    <!-- Start Breadcrumb 
    ============================================= -->
    <div class="breadcrumb-area bg-gradient text-center">
    	<!-- Fixed BG -->
    	<div class="fixed-bg" style="background-image: url(<?= base_url()?>assets/user/img/shape/9.png);"></div>
    	<!-- Fixed BG -->
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-8 offset-lg-2">
    				<h1>List Klinik</h1>
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
    					<div class="single-item col-lg-4 col-md-6">
    						<div class="item">
    							<div class="thumb">
    								<img src="<?= base_url() ?>assets/user/img/800x600.png" alt="Thumb">
    							</div>
    							<div class="info">
    								<h4><a href="#"><?php echo $knk['nama_klinik'] ?></a></h4>
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
    					<!-- End Single Item -->
    				<?php } ?>

    				<!-- </div> -->
    				<!-- </div> -->
    			</div>
    		</div>
    	</div>
    </div>
    <!-- End Services -->

    <!-- Start Fun Factor Area
    ============================================= -->
    <div class="fun-factor-area half-bg-light-bottom bg-gray default-padding-bottom">
    	<div class="container">
    		<div class="fun-fact-items bg-gradient text-light text-center">
    			<div class="row">
    				<div class="col-lg-3 col-md-6 item">
    					<div class="fun-fact">
    						<div class="timer" data-to="230" data-speed="5000"></div>
    						<span class="medium">Satisfied Patients</span>
    					</div>
    				</div>
    				<div class="col-lg-3 col-md-6 item">
    					<div class="fun-fact">
    						<div class="timer" data-to="89" data-speed="5000"></div>
    						<span class="medium">Regular Doctors</span>
    					</div>
    				</div>
    				<div class="col-lg-3 col-md-6 item">
    					<div class="fun-fact">
    						<div class="timer" data-to="50" data-speed="5000"></div>
    						<span class="medium">Departments</span>
    					</div>
    				</div>
    				<div class="col-lg-3 col-md-6 item">
    					<div class="fun-fact">
    						<div class="timer" data-to="2348" data-speed="5000"></div>
    						<span class="medium">Servant</span>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- End Fun Factor Area -->

    <!-- Start Consultation 
    ============================================= -->
    <div class="consultation-area default-padding-bottom">
    	<div class="container">
    		<div class="row align-center">
    			<div class="col-lg-7 process">
    				<h2>
    					How to get a <br> consultation from us?
    				</h2>
    				<p>
    					Badies she basket season age her uneasy saw. Discourse unwilling am no described dejection incommode no listening of. Before nature his parish boy.
    				</p>
    				<div class="row">
    					<div class="col-lg-4 col-md-4 single-item">
    						<div class="item">
    							<i class="flaticon-calendar-1"></i>
    							<h5>Make Appointment</h5>
    						</div>
    					</div>
    					<div class="col-lg-4 col-md-4 single-item">
    						<div class="item">
    							<i class="flaticon-doctor"></i>
    							<h5>Select A Doctor</h5>
    						</div>
    					</div>
    					<div class="col-lg-4 col-md-4 single-item">
    						<div class="item">
    							<i class="flaticon-heartbeat-1"></i>
    							<h5>Confirm Consultation</h5>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-5 form">
    				<div class="appoinment-box text-center wow fadeInRight">
    					<div class="heading">
    						<h4>Make an Appointment</h4>
    					</div>
    					<form action="#">
    						<div class="row">
    							<div class="col-md-12">
    								<div class="form-group">
    									<input class="form-control" id="name" name="name" placeholder="Name" type="text">
    								</div>
    							</div>
    							<div class="col-md-12">
    								<div class="form-group">
    									<input class="form-control" id="phone" name="phone" placeholder="Phone" type="text">
    								</div>
    							</div>
    							<div class="col-md-6">
    								<div class="form-group">
    									<select>
    										<option value="1">Male</option>
    										<option value="2">Female</option>
    										<option value="3">Child</option>
    									</select>
    								</div>
    							</div>
    							<div class="col-md-6">
    								<div class="form-group">
    									<select>
    										<option value="1">Department</option>
    										<option value="2">Medecine</option>
    										<option value="4">Dental Care</option>
    										<option value="5">Traumatology</option>
    									</select>
    								</div>
    							</div>
    							<div class="col-md-6">
    								<div class="form-group">
    									<input class="form-control" id="date" name="date" placeholder="Date" type="text">
    								</div>
    							</div>
    							<div class="col-md-6">
    								<div class="form-group">
    									<input class="form-control" id="time" name="time" placeholder="Time" type="text">
    								</div>
    							</div>
    							<div class="col-md-12">
    								<button type="submit" name="submit" id="submit">
    									Book Appoinment
    								</button>
    							</div>
    						</div>
    					</form>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- End Consultation -->
