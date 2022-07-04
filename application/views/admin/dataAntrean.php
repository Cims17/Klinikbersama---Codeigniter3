<?php echo $this->session->flashdata('berhasil_antrean') ?>
<div class="page-content">
	<div class="container-fluid">
		<!-- Page-Title -->
		<div class="row">
			<div class="col-sm-12">
				<div class="page-title-box">
					<div class="row">
						<div class="col">
							<h4 class="page-title">Data Antrean Pasien <?php echo $this->session->userdata('username') ?></h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item active">Data Antrean Pasien</li>
							</ol>
						</div>
						<!--end col-->
						<!--end col-->
					</div>
					<!--end row-->
				</div>
				<!--end page-title-box-->
			</div>
			<!--end col-->
		</div>

		<div class="row">

			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="row">
							<div class="col-lg-6">
								<h4 class="card-title">Tabel Data Antrean Pasien <?php echo $this->session->userdata('username') ?></h4>
							</div>
							<div class="col-lg-6 d-flex justify-content-end">
								<a href="<?php echo base_url()  ?>Admin/Data_antrean/Tambah_pasien">
									<button type="button" class="btn btn-sm btn-soft-primary me-2">
										<i class="fas fa-plus me-2"></i>Tambah Data Antrean Pasien Baru
									</button>
								</a>
								<a href="<?php echo base_url()  ?>Admin/Data_antrean/Tambah_antrean">
									<button type="button" class="btn btn-sm btn-soft-primary">
										<i class="fas fa-plus me-2"></i>Tambah Data Antrean
									</button>
								</a>
							</div>


						</div>
						<!-- <a class=" btn btn-sm btn-soft-success" href="#" role="button"><i class="fas fa-plus me-2"></i>Tambah Saldo</a> -->
					</div>
					<div class="card-body">
						<?php foreach ($dokter as $dkt) { ?>
							<?php if ($dkt['id_user'] ==  $this->session->userdata('id_user')) { ?>
								<div class="card">
									<div class="card-header d-flex justify-content-between">
										<h4 class="card-title">Dokter <?= $dkt['nama_dokter'] ?> / Spesialis <?= $dkt['spesialis'] ?> </h4>
										<!-- <a class=" btn btn-sm btn-soft-success" href="#" role="button"><i class="fas fa-plus me-2"></i>Tambah Saldo</a> -->
									</div>
									<div class="card-body">
										<table id="dataantrean<?= $dkt['id_dokter'] ?>" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
											<thead>
												<tr>
													<th>Nomor Antrean</th>
													<th>Nama Pasien</th>
													<th>Keluhan</th>
													<th>Cara Bayar</th>
													<th>Aksi</th>
												</tr>
											</thead>


											<tbody>
												<?php
												$i = 1;
												foreach ($antrean as $antr) {
													if ($antr['id_dokter'] == $dkt['id_dokter']) { ?>

														<tr id="<?= $antr['id_antrean'] ?>">
															<td><?= $antr['no_antrean'] ?></td>
															<td><?= $antr['nama_pasien'] ?></td>
															<td><?= $antr['keluhan'] ?></td>
															<td><?= $antr['cara_bayar'] ?></td>
															<td>
																<div class="d-flex">
																		<button type="button" class="btn btn-sm btn-soft-success me-2 riwayat_antrean" id="sa-warning"> 
																			<i class="fas fa-edit me-2"></i>Sudah Diperiksa
																		</button>
																	<button type="button" class="btn btn-sm btn-soft-danger remove" id="sa-warning">
																		<i class="fas fa-times me-2"></i>Hapus
																	</button>
																</div>
															</td>
														</tr>
													<?php } ?>
												<?php } ?>
											</tbody>
										</table>

									</div>
								</div>

							<?php } ?>
						<?php } ?>

					</div>
				</div>
			</div>
		</div>
	</div><!-- container -->
