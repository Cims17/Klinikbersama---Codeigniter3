<div class="page-content">
<div class="container-fluid">
	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<div class="row">
					<div class="col">
						<h4 class="page-title">Tambah Data Jadwal Dokter <?php echo $this->session->userdata('username') ?></h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a>Data Jadwal Dokter</a></li>
							<li class="breadcrumb-item active">Tambah Data Jadwal</li>
						</ol>
					</div><!--end col-->
				</div><!--end row-->                                                              
			</div><!--end page-title-box-->
		</div><!--end col-->
	</div><!--end row-->

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Form Tambah Data Jadwal DOkter <?php echo $this->session->userdata('username') ?></h4>
				</div><!--end card-header-->
				<form action="<?php echo base_url() ?>Admin/Data_jadwal/Simpan_jadwal" method="post" enctype="multipart/form-data">
					<div class="card-body">  
						<div class="row">
							<div class="col-lg-6">
								<div class="mb-3">
									<label class="form-label" style="color: black;">Nama Dokter</label>
									<select class="form-control select2 custom-select" name="id_dokter" >
                                            <option value="" selected disabled>Pilih Dokter</option>
											<?php foreach($dokter as $dkt) { ?>
												<?php if($dkt['id_user'] ==  $this->session->userdata('id_user') ) { ?>
											<option value="<?= $dkt['id_dokter'] ?>"><?= $dkt['nama_dokter'] ?></option>
												<?php } ?>
											<?php } ?>
							        </select>
								</div>
								<div class="mb-3">
									<label class="form-label" style="color: black;">Hari Mulai</label>
									<select class="form-control select2 custom-select" name="hari_mulai" >
                                            <option value="" selected disabled>Pilih Hari Mulai</option>
											<option value="Senin">Senin</option>
											<option value="Selasa">Selasa</option>
											<option value="Rabu">Rabu</option>
											<option value="Kamis">Kamis</option>
											<option value="Jumat">Jumat</option>
											<option value="Sabtu">Sabtu</option>
											<option value="Minggu">Minggu</option>
							        </select>
								</div>
								<div class="mb-3">
									<label class="form-label" style="color: black;">Hari Selesai</label>
									<select class="form-control select2 custom-select" name="hari_selesai" >
                                            <option value="" selected disabled>Pilih Hari Selesai</option>
											<option value="Senin">Senin</option>
											<option value="Selasa">Selasa</option>
											<option value="Rabu">Rabu</option>
											<option value="Kamis">Kamis</option>
											<option value="Jumat">Jumat</option>
											<option value="Sabtu">Sabtu</option>
											<option value="Minggu">Minggu</option>
							        </select>
								</div>

								<div class="mb-3">
									<label class="form-label" style="color: black;">Jam Mulai</label>
									<input class="form-control" id="timepicker" name="jam_mulai" placeholder="Pilih Jam Mulai" >
								</div>
								<div class="mb-3">
									<label class="form-label" style="color: black;">Jam Selesai</label>
									<input class="form-control" id="timepicker2" name="jam_selesai" placeholder="Pilih Jam Selesai" >
								</div>  
								<div class="mb-3">
									<label class="form-label" style="color: black;">Maksimal Pasien</label>
									<input class="form-control" type="number" name="maksimal_pasien" placeholder="Masukkan Maksimal Pasien" >
								</div>           
							</div>
						</div>
						<hr />
						<button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <button type="cancel" name="cancel" class="btn btn-danger">Cancel</button>                                                                      
					</div><!--end card-body-->
				</form>
			</div><!--end card-->
		</div><!--end col-->
	</div><!--end row-->
	

</div><!-- container -->
