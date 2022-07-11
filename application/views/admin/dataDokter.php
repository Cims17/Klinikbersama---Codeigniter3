<?php echo $this->session->flashdata('berhasil_dokter') ?>
<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Data Dokter <?php echo $this->session->userdata('username') ?></h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">Data Dokter</li>
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
                        <h4 class="card-title">Tabel Data Dokter <?php echo $this->session->userdata('username') ?></h4>
						<a href="<?php echo base_url()  ?>Admin/Data_dokter/Tambah_dokter">
                        <button type="button" class="btn btn-sm btn-soft-primary">
                            <i class="fas fa-plus me-2"></i>Tambah Data Dokter
                        </button>
						</a>
                        <!-- <a class=" btn btn-sm btn-soft-success" href="#" role="button"><i class="fas fa-plus me-2"></i>Tambah Saldo</a> -->
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Dokter</th>
                                    <th>Nomor Telepon</th>
                                    <th>Spesialis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                $i = 1;
                                foreach($dokter as $dkt) {
									if($dkt['id_user'] ==  $this->session->userdata('id_user') ) { ?>
									
                                    <tr id="<?= $dkt['id_dokter'] ?>">
                                        <td><?= $i++ ?></td>
                                        <td><?= $dkt['nama_dokter'] ?></td>
                                        <td><?= $dkt['notlp_dokter'] ?></td>
                                        <td><?= $dkt['spesialis'] ?></td>
                                        <td>
                                            <div class="d-flex">
												<button type="button" class="btn btn-sm btn-soft-primary me-2" data-bs-toggle="modal" data-bs-target="#detail_dokter<?= $dkt['id_dokter'] ?>">
                                                    <i class="fas fa-edit me-2"></i>Detail
                                                </button>
												<a href="<?php echo base_url() ?>Admin/Data_dokter/Edit_dokter/<?= $dkt['id_dokter'] ?>">
                                                <button type="button" class="btn btn-sm btn-soft-success me-2" >
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
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <?php foreach($dokter as $dkt) { ?>
            <div class="modal fade bd-example-modal-lg" id="detail_dokter<?= $dkt['id_dokter'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title m-0" id="myLargeModalLabel">Detail Dokter</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!--end modal-header-->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="mb-2">Nama Dokter</label>
                                            <input type="text" class="form-control" value="<?= $dkt['nama_dokter'] ?>" readonly>
                                        </div>

                                    </div>
                                    <!--end col-->
                                </div>
								<div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="mb-2">Spesialis</label>
                                            <input type="text" class="form-control" value="<?= $dkt['spesialis'] ?>" readonly>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
								<div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="mb-2">Nomor SIP</label>
                                            <input type="text" class="form-control" value="<?= $dkt['no_SIP'] ?>" readonly>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
								<div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="mb-2">Nomor Telepon Dokter</label>
                                            <input type="text" class="form-control" value="<?= $dkt['notlp_dokter'] ?>" readonly>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>

								<div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mb-2">
                                            <label class="mb-2">Jenis Kelamin</label>
                                            <input type="text" class="form-control" value="<?= $dkt['jenis_kelamin'] ?>" readonly>
                                        </div>

                                    </div>
								
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group mb-2">
                                            <label class="mb-2">Tempat Lahir</label>
                                            <input type="text" class="form-control" value="<?= $dkt['tempat_lahir'] ?>" readonly>
                                        </div>

                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="form-group mb-2">
                                            <label class="mb-2">Tanggal Lahir</label>
                                            <input type="text" class="form-control" value="<?= $dkt['tanggal_lahir'] ?>" readonly>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
								<div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="mb-2">Alamat Dokter</label>
                                            <textarea class="form-control" readonly><?= $dkt['alamat_dokter'] ?></textarea>
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
			
			</div><!-- container -->
        <?php } ?>
