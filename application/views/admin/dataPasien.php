<?php echo $this->session->flashdata('berhasil_pasien') ?>
<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Data Pasien Aplikasi Pendaftaran Pasien</h4>
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
                        <h4 class="card-title">Tabel Data Pasien Aplikasi Pendaftaran Pasien</h4>
						<a href="<?php echo base_url()  ?>Admin/Data_pasien/Tambah_pasien">
                        <button type="button" class="btn btn-sm btn-soft-primary">
                            <i class="fas fa-plus me-2"></i>Tambah Data Pasien
                        </button>
						</a>
                        <!-- <a class=" btn btn-sm btn-soft-success" href="#" role="button"><i class="fas fa-plus me-2"></i>Tambah Saldo</a> -->
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Nomor Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($pasien as $psn) { ?>
									
                                    <tr id="<?= $psn['id_pasien'] ?>">
                                        <td><?= $i++ ?></td>
                                        <td><?= $psn['nama_pasien'] ?></td>
                                        <td><?= $psn['no_telepon'] ?></td>
                                        <td>
                                            <div class="d-flex">
												<button type="button" class="btn btn-sm btn-soft-primary me-2" data-bs-toggle="modal" data-bs-target="#detail_pasien<?= $psn['id_pasien'] ?>">
                                                    <i class="fas fa-edit me-2"></i>Detail
                                                </button>
												<a href="<?php echo base_url() ?>Admin/Data_pasien/Edit_pasien/<?= $psn['id_pasien'] ?>">
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

        <?php foreach($pasien as $psn) { ?>
            <div class="modal fade bd-example-modal-lg" id="detail_pasien<?= $psn['id_pasien'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title m-0" id="myLargeModalLabel">Detail Pasien</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!--end modal-header-->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="mb-2">Id Pasien</label>
                                            <input type="text" class="form-control" value="<?= $psn['id_pasien'] ?>" readonly>
                                        </div>

                                    </div>
                                    <!--end col-->
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="mb-2">NIK</label>
                                            <input type="text" class="form-control" value="<?= $psn['no_identitas'] ?>" readonly>
                                        </div>

                                    </div>
                                    <!--end col-->
                                </div>
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
                                            <label class="mb-2">Nomor Telepon Pasien</label>
                                            <input type="text" class="form-control" value="<?= $psn['no_telepon'] ?>" readonly>
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
                                        <div class="form-group">
                                            <label class="mb-2">Alamat Pasien</label>
                                            <textarea class="form-control" readonly><?= $psn['alamat_pasien'] ?></textarea>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
								<div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="mb-2">Agama Pasien</label>
                                            <textarea class="form-control" readonly><?= $psn['agama_pasien'] ?></textarea>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                            </div>
                    </div>
                    <!--end modal-content-->
                </div>
                <!--end modal-dialog-->
            </div>
        <?php } ?>
    </div><!-- container -->
