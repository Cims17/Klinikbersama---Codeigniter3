<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Data Admin Klinik</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">Data Admin Klinik</li>
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
                        <h4 class="card-title">Tabel Admin Klinik</h4>
                        <a href="<?php echo base_url()?>admin/data_klinik/tambah_klinik">
							<button type="button" class="btn btn-sm btn-soft-primary">
								<i class="fas fa-plus me-2"></i>Tambah Klinik
							</button>
						</a>
                        <!-- <a class=" btn btn-sm btn-soft-success" href="#" role="button"><i class="fas fa-plus me-2"></i>Tambah Saldo</a> -->
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Klinik</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                $i = 1;
                                foreach($klinik as $knk) {?>
                                    <tr id="<?php echo $knk['id_user'] ?>">
                                        <td><?= $i++ ?></td>
                                        <td><?php echo $knk['username'] ?></td>
                                        <td><?php echo $knk['email'] ?></td>
                                        <td><?php echo $knk['nama_klinik'] ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-sm btn-soft-success me-2" data-bs-toggle="modal" data-bs-target="#edit_barang<?php ?>">
                                                    <i class="fas fa-edit me-2"></i>Edit
                                                </button>
                                                <button type="button" class="btn btn-sm btn-soft-danger" data-bs-toggle="modal" data-bs-target="#hapus_barang<?php ?>">
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

        <div class="modal fade bd-example-modal-lg" id="tambah_admin_klinik" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title m-0" id="myLargeModalLabel">Tambah User Admin Klinik</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!--end modal-header-->
                    <form action="<?php ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="mb-2">Username</label>
                                        <input type="text" class="form-control" name="username">
                                    </div>
                                </div>
                            </div>
							<div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="mb-2">Email</label>
                                        <input type="text" class="form-control" name="email">
                                    </div>
                                </div>
                            </div>
							<div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="mb-2">Password</label>
                                        <input type="text" class="form-control" name="password">
                                    </div>
                                </div>
                            </div>
							<div class="row bootstrap-select-1">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="mb-2">Nama Klinik</label>
                                        <select class="form-control select2 custom-select" id="select2klinik" name="klinik" required>
                                            <option value="" selected disabled>Pilih Nama Klinik</option>
                                            <?php foreach ($klinik as $knk) : ?>
                                            <option value="<?= $knk['id_klinik'] ?>"><?= $knk['nama_klinik'] ?></option>
                                            <?php endforeach ?>
							            </select>
                                    </div>
                                </div>
                            </div>
							<div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="mb-2">Role</label>
                                        <input type="text" class="form-control" name="password">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--end modal-body-->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-check me-1"></i>
                                Tambah
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">
                                <i class="fas fa-times me-1"></i>
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
        <?php  ?>
            <div class="modal fade bd-example-modal-lg" id="edit_barang<?php ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title m-0" id="myLargeModalLabel">Edit Barang</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!--end modal-header-->
                        <form action="<?php ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="mb-2">Kode Barang</label>
                                            <input type="text" class="form-control" value="<?php ?>" name="idBarang" hidden>
                                            <input type="text" class="form-control" value="<?php ?>" name="kodeBarang">
                                        </div>

                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="mb-2">Satuan</label>
                                            <input type="text" class="form-control" value="<?php ?>" name="satuan">
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="mb-2">Nama Barang</label>
                                            <input type="text" class="form-control" value="<?php ?>" name="nama">
                                        </div>

                                    </div>
                                    <!--end col-->
                                </div>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group mb-2">
                                            <label class="mb-2">Harga Jual</label>
                                            <input type="text" class="form-control" value="<?php ?>" name="harga">
                                        </div>

                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="form-group mb-2">
                                            <label class="mb-2">Stok</label>
                                            <input type="text" class="form-control" value="<?php ?>" name="stok">
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
        <?php ?>
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


