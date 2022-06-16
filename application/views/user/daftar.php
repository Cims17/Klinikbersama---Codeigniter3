<!-- Start Breadcrumb 
    ============================================= -->
<div class="breadcrumb-area bg-gradient text-center">
	<!-- Fixed BG -->
	<div class="fixed-bg" style="background-image: url(<?= base_url() ?>assets/user/img/shape/9.png);"></div>
	<!-- Fixed BG -->
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2">
				<?php foreach ($dokter as $dkt) { ?>
					<h1><?= $dkt['nama_dokter'] ?></h1>
					<h1>Dokter <?= $dkt['spesialis'] ?></h1>
				<?php } ?>
				<ul class="breadcrumb">
					<li><a href="<?= base_url() ?>"><i class="fas fa-home"></i> Home</a></li>
					<li><a href="<?= base_url() ?>Klinik">Klinik</a></li>
					<?php foreach ($dokter as $dkt) { ?>
						<li> <a href="<?= base_url() ?>Klinik/Profil/<?= $dkt['id_klinik'] ?>"><?= $dkt['nama_klinik'] ?></a></li>
						<li class="active"><?= $dkt['nama_dokter'] ?></li>
					<?php } ?>
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
		<?php foreach ($dokter as $knk) { ?>
			<div class="row">
				<div class="col-lg-8 info">
					<div class="thumb">
						<img src="<?= base_url() ?>/assets/user/img/2440x1578.png" alt="Thumb">
						<div class="title">
							<h3>Dokter <?= $knk['nama_dokter'] ?></h3>
						</div>
					</div>
					<div class="consultation-area mt-5">
						<div class="form">
							<div class="appoinment-box text-center wow fadeInRight">
								<div class="heading">
									<h4>Make an Appointment</h4>
								</div>
								<form action="#">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input class="form-control" id="f_name" name="name" placeholder="Name" type="text">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<input class="form-control" id="f_phone" name="phone" placeholder="Phone" type="text">
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
												<input class="form-control" id="f_date" name="date" placeholder="Date" type="text">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input class="form-control" id="f_time" name="time" placeholder="Time" type="text">
											</div>
										</div>
										<div class="col-md-12">
											<button type="submit" name="submit" id="f_submit">
												Book Appoinment
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>

				</div>
				<div class="col-lg-4 sidebar">

					<!-- Single Widget -->
					<div class="widget opening-hours">
						<div class="title">
							<h4>Jadwal Praktik</h4>
						</div>
						<ul>
							<li> <span> Mon - Tues : </span>
								<div class="float-right"> 6.00 am - 10.00 pm </div>
							</li>
							<li> <span> Wednes - Thurs :</span>
								<div class="float-right"> 8.00 am - 6.00 pm </div>
							</li>
							<li> <span> Sun : </span>
								<div class="float-right closed"> Closed </div>
							</li>
						</ul>
					</div>
					<!-- End Single Widget -->


				</div>
				<!-- End Widget Items -->

			</div>
		<?php } ?>
	</div>
</div>
</div>
<!-- End Department Single -->
