<?php echo $this->session->flashdata('berhasil_jadwal') ?>
<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Data Jadwal Dokter <?php echo $this->session->userdata('username') ?></h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">Data Jadwal Dokter</li>
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
                        <h4 class="card-title">Tabel Data Jadwal Dokter <?php echo $this->session->userdata('username') ?></h4>
						<a href="<?php echo base_url()  ?>Admin/Data_jadwal/Tambah_jadwal">
                        <button type="button" class="btn btn-sm btn-soft-primary">
                            <i class="fas fa-plus me-2"></i>Tambah Data Jadwal Dokter
                        </button>
						</a>
                        <!-- <a class=" btn btn-sm btn-soft-success" href="#" role="button"><i class="fas fa-plus me-2"></i>Tambah Saldo</a> -->
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Nama Dokter</th>
                                    <th>Hari Mulai</th>
                                    <th>Hari Selesai</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                $i = 1;
                                foreach($jadwal as $jdwl) {
									if($jdwl['id_user'] ==  $this->session->userdata('id_user') ) { ?>
									
                                    <tr id="<?= $jdwl['id_jadwal'] ?>">
                                        <td><?= $jdwl['nama_dokter'] ?></td>
                                        <td><?= $jdwl['hari_mulai'] ?></td>
                                        <td><?= $jdwl['hari_selesai'] ?></td>
                                        <td><?= $jdwl['jam_mulai'] ?></td>
                                        <td><?= $jdwl['jam_selesai'] ?></td>
                                        <td>
                                            <div class="d-flex">
												<a href="<?php echo base_url() ?>Admin/Data_jadwal/Edit_jadwal/<?= $jdwl['id_jadwal'] ?>">
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
    </div><!-- container -->
