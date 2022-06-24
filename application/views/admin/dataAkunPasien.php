<?php echo $this->session->flashdata('berhasil_akun_pasien') ?>
<div class="page-content">
	<div class="container-fluid">
		<!-- Page-Title -->
		<div class="row">
			<div class="col-sm-12">
				<div class="page-title-box">
					<div class="row">
						<div class="col">
							<h4 class="page-title">Data Akun Pasien</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item active">Data Akun Pasien</li>
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
					<div class="card-header d-flex justify-content-between">
						<h4 class="card-title">Tabel Akun Pasien</h4>
						<a href="<?php echo base_url() ?>Admin/Pasien/Tambah_pasien">
							<button type="button" class="btn btn-sm btn-soft-primary">
								<i class="fas fa-plus me-2"></i>Tambah Akun Pasien
							</button>
						</a>
						<!-- <a class=" btn btn-sm btn-soft-success" href="#" role="button"><i class="fas fa-plus me-2"></i>Tambah Saldo</a> -->
					</div>
					<div class="card-body">
						<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>No WA</th>
									<th>Aksi</th>
								</tr>
							</thead>


							<tbody>
								<?php
								$i = 1;
								foreach ($pasien as $psn) { ?>
									<tr id="<?php echo $psn['id_pasien'] ?>">
										<td><?= $i++ ?></td>
										<td><?php echo $psn['nama_pasien'] ?></td>
										<td><?php echo $psn['alamat_pasien'] ?></td>
										<td><?php echo $psn['no_telepon'] ?></td>
										<td>
											<div class="d-flex">
												<button type="button" class="btn btn-sm btn-soft-primary me-2" data-bs-toggle="modal" data-bs-target="#detail_pasien<?= $psn['id_pasien'] ?>">
													<i class="fas fa-edit me-2"></i>Detail
												</button>
												<a href="<?php echo base_url() ?>Admin/Pasien/Edit_pasien/<?=  $psn['id_pasien'] ?>">
													<button type="button" class="btn btn-sm btn-soft-success me-2">
														<i class="fas fa-edit me-2"></i>Edit
													</button>
												</a>
												<button type="button" class="btn btn-sm btn-soft-danger remove" id="sa-warning">
                                                    <i class="fas fa-times me-2"></i>Hapus
                                                </button>
											</div>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>

		<?php foreach ($pasien as $psn) { ?>
			<div class="modal fade bd-example-modal-lg" id="detail_pasien<?= $psn['id_pasien'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h6 class="modal-title m-0" id="myLargeModalLabel">Detail Akun Pasien</h6>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<!--end modal-header-->
						<div class="modal-body">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label class="mb-2">Nama Pasien</label>
										<input type="text" class="form-control" value="<?= $psn['nama_pasien'] ?>" readonly>
									</div>

								</div>
								<!--end col-->
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label class="mb-2">Nomor Induk Kependudukan</label>
										<input type="text" class="form-control" value="<?= $psn['no_identitas'] ?>" readonly>
									</div>
								</div>
								<!--end col-->
							</div>
							<div class="row">
								<div class="col-lg-8">
									<div class="form-group mb-2">
										<label class="mb-2">Tempat Lahir</label>
										<input type="text" class="form-control" value="<?= $psn['tempat_lahir'] ?>" readonly>
									</div>

								</div>
								<!--end col-->
								<div class="col-lg-4">
									<div class="form-group mb-2">
										<label class="mb-2">Tanggal Lahir</label>
										<input type="text" class="form-control" value="<?= $psn['tanggal_lahir'] ?>" readonly>
									</div>
								</div>
								<!--end col-->
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group mb-2">
										<label class="mb-2">Jenis Kelamin</label>
										<input type="text" class="form-control" value="<?= $psn['jenis_kelamin'] ?>" readonly>
									</div>

								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group mb-2">
										<label class="mb-2">Agama</label>
										<input type="text" class="form-control" value="<?= $psn['agama_pasien'] ?>" readonly>
									</div>

								</div>
							</div>

							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label class="mb-2">Alamat Pasien</label>
										<textarea class="form-control" readonly><?= $psn['alamat_pasien'] ?></textarea>
									</div>
								</div>
								<!--end col-->
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group mb-2">
										<label class="mb-2">Asuransi</label>
										<input type="text" class="form-control" value="<?= $psn['asuransi'] ?>" readonly>
									</div>

								</div>
							</div>
							<?php if ($psn['asuransi'] === 'BPJS Kesehatan') { ?>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group mb-2">
											<label class="mb-2">No Asuransi</label>
											<input type="text" class="form-control" value="<?= $psn['no_asuransi'] ?>" readonly>
										</div>

									</div>
								</div>
							<?php } ?>
							<hr />
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label class="mb-2">Email</label>
										<textarea class="form-control" readonly><?= $psn['email'] ?></textarea>
									</div>
								</div>
								<!--end col-->
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label class="mb-2">Nomor Telepon Pasien</label>
										<input type="text" class="form-control" value="<?= $psn['no_telepon'] ?>" readonly>
									</div>
								</div>
								<!--end col-->
							</div>
						</div>
						<!--end modal-content-->
					</div>
					<!--end modal-dialog-->
				</div>
			</div>
		<?php } ?>

		<?php foreach ($pasien as $psn) { ?>
			<div class="modal fade bd-example-modal-lg" id="edit_pasien<?= $psn['id_pasien'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h6 class="modal-title m-0" id="myLargeModalLabel">Edit Akun Pasien</h6>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<!--end modal-header-->
						<form action="<?php ?>" method="post" enctype="multipart/form-data">
							<div class="modal-body">
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label class="mb-2">Nama Pasien</label>
											<input type="text" class="form-control" value="<?= $psn['nama_pasien'] ?>">
										</div>

									</div>
									<!--end col-->
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label class="mb-2">NIK</label>
											<input type="text" class="form-control" value="<?= $psn['no_identitas'] ?>">
										</div>
									</div>
									<!--end col-->
								</div>
								<div class="row">
									<div class="col-lg-8">
										<div class="form-group mb-2">
											<label class="mb-2">Tempat Lahir</label>
											<input type="text" class="form-control" value="<?= $psn['tempat_lahir'] ?>">
										</div>

									</div>
									<!--end col-->
									<div class="col-lg-4">
										<div class="form-group mb-2">
											<label class="mb-2">Tanggal Lahir</label>
											<input type="date" class="form-control" value="<?= $psn['tanggal_lahir'] ?>">
										</div>
									</div>
									<!--end col-->
								</div>

								<div class="row">
									<div class="col-lg-12">
										<div class="form-group mb-2">
											<label class="mb-2">Jenis Kelamin</label>
											<select class="form-control select2 custom-select" id="select2jeniskelamin<?= $psn['id_user'] ?>" name="jenis_kelamin" required>
												<option value="" selected disabled>Pilih Jenis Kelamin</option>
												<option value="Laki-Laki" <?= ($psn['jenis_kelamin'] === 'Laki-Laki') ? 'selected' : '' ?>>Laki-Laki</option>
												<option value="Perempuan" <?= ($psn['jenis_kelamin'] === 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
											</select>
										</div>

									</div>
								</div>

								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label class="mb-2">Agama</label>
											<select class="form-control select2 custom-select" id="select2agamapasien<?= $psn['id_user'] ?>" name="agama_pasien" required>
												<option value="" selected disabled>Pilih Agama</option>
												<option value="Islam" <?= ($psn['agama_pasien'] === 'Islam') ? 'selected' : '' ?>>Islam</option>
												<option value="Protestan" <?= ($psn['agama_pasien'] === 'Protestan') ? 'selected' : '' ?>>Protestan</option>
												<option value="Katolik" <?= ($psn['agama_pasien'] === 'Katolik') ? 'selected' : '' ?>>Katolik</option>
												<option value="Hindu" <?= ($psn['agama_pasien'] === 'Hindu') ? 'selected' : '' ?>>Hindu</option>
												<option value="Buddha" <?= ($psn['agama_pasien'] === 'Buddha') ? 'selected' : '' ?>>Buddha</option>
												<option value="Khonghucu" <?= ($psn['agama_pasien'] === 'Khonghucu') ? 'selected' : '' ?>>Khonghucu</option>
											</select>
										</div>
									</div>
									<!--end col-->
								</div>


								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label class="mb-2">Alamat Pasien</label>
											<textarea class="form-control"><?= $psn['alamat_pasien'] ?></textarea>
										</div>
									</div>
									<!--end col-->
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group mb-2">
											<label class="mb-2">Asuransi</label>
											<select class="form-control select2 custom-select" id="select2asuransi<?= $psn['id_user'] ?>" name="asuransi" required>
												<option value="" selected disabled>Pilih Asuransi</option>
												<option value="Tidak Ada Asuransi" <?= ($psn['asuransi'] === 'Tidak Ada Asuransi') ? 'selected' : '' ?>>Tidak Ada Asuransi</option>
												<option value="BPJS Kesehatan" <?= ($psn['asuransi'] === 'BPJS Kesehatan') ? 'selected' : '' ?>>BPJS Kesehatan</option>
											</select>
										</div>

									</div>
								</div>
								<?php if ($psn['asuransi'] === 'BPJS Kesehatan') { ?>
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group mb-2">
												<label class="mb-2">No Asuransi</label>
												<input type="text" class="form-control" value="<?= $psn['no_asuransi'] ?>">
											</div>

										</div>
									</div>
								<?php } ?>
								<hr />
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label class="mb-2">Email</label>
											<textarea class="form-control"><?= $psn['email'] ?></textarea>
										</div>
									</div>
									<!--end col-->
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label class="mb-2">Nomor Telepon Pasien</label>
											<input type="text" class="form-control" value="<?= $psn['no_telepon'] ?>">
										</div>
									</div>
									<!--end col-->
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label class="mb-2">Password</label>
											<input type="text" class="form-control" value="">
										</div>
									</div>
									<!--end col-->
								</div>
							</div>
							<!--end modal-body-->
							<div class="modal-footer">
								<button type="submit" class="btn btn-success btn-sm">
									<i class="fas fa-check me-2"></i>
									Simpan
								</button>
								<button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">
									<i class="fas fa-times me-2"></i>
									Close
								</button>
							</div>
						</form>
						<!--end modal-footer-->
					</div>
					<!--end modal-content-->
				</div>
				<!--end modal-dialog-->
			</div>
		<?php } ?>
		<?php ?>
		<div class="modal fade bd-example-modal-sm" id="hapus_barang<?php ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header justify-content-center">
						<h6 class="modal-title m-0" id="myLargeModalLabel">Hapus Barang ?</h6>

					</div>
					<!--end modal-header-->
					<form action="<?php ?> <?php ?>" method="post" enctype="multipart/form-data">
						<div class="modal-footer justify-content-center">
							<button type="submit" class="btn btn-success btn-sm me-3">
								<i class="fas fa-check me-1"></i>
								Hapus
							</button>
							<button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">
								<i class="fas fa-times me-1"></i>
								Batal
							</button>
						</div>
					</form>
					<!--end modal-footer-->
				</div>
				<!--end modal-content-->
			</div>
			<!--end modal-dialog-->
		</div>
		<?php ?>
	</div><!-- container -->
</div>
