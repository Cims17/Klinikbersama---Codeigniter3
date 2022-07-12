<div class="menu-content h-100" data-simplebar>
    <ul class="metismenu left-sidenav-menu">
        <li class="menu-label mt-0">Main</li>
		<?php if ($this->session->userdata('role') == '1') { ?>
        <li>
            <a href="<?php echo base_url() ?>Admin/Beranda" > <i class="fas fa-home align-self-center menu-icon"></i><span>Beranda</span></a>
        </li>

		<li class="<?= ($this->uri->segment(2) == 'Data_klinik') ? 'active' : '' ?>">
            <a href="<?php echo base_url() ?>Admin/Data_klinik" class="<?= ($this->uri->segment(2) == 'Data_klinik') ? 'active' : '' ?>"><i class="fas fa-hospital align-self-center menu-icon"></i><span>Data Klinik</span></a>
        </li>

        <li class="<?= ($this->uri->segment(2) == 'Data_dokter') ? 'active' : '' ?>">
            <a href="<?php echo base_url() ?>Admin/Data_dokter" class="<?= ($this->uri->segment(2) == 'Data_dokter') ? 'active' : '' ?>"><i class="fas fa-user-md align-self-center menu-icon"></i><span>Data Dokter</span></a>
        </li>

		<li class="<?= ($this->uri->segment(2) == 'Pasien') ? 'active' : '' ?>">
            <a href="<?php echo base_url() ?>Admin/Pasien" class="<?= ($this->uri->segment(2) == 'Pasien') ? 'active' : '' ?>" ><i class="fas fa-users align-self-center menu-icon"></i><span>Data Akun Pasien</span></a>
        </li>

		<?php } ?>

		<?php if($this->session->userdata('role') == '2' ) { ?>

		
		<li>
            <a href="<?php echo base_url() ?>Admin/Beranda" > <i class="fas fa-home align-self-center menu-icon"></i><span>Beranda</span></a>
        </li>

		<li class="<?= ($this->uri->segment(2) == 'Profil_klinik') ? 'active' : '' ?>">
            <a href="<?php echo base_url() ?>Admin/Profil_klinik" class="<?= ($this->uri->segment(2) == 'Profil_klinik') ? 'active' : '' ?>"> <i class="fas fa-hospital align-self-center menu-icon"></i><span>Profil Klinik</span></a>
        </li>

		<li class="<?= ($this->uri->segment(2) == 'Data_dokter') ? 'active' : '' ?>">
            <a href="<?php echo base_url() ?>Admin/Data_dokter" class="<?= ($this->uri->segment(2) == 'Data_dokter') ? 'active' : '' ?>"><i class="fas fa-user-md align-self-center menu-icon"></i><span>Data Dokter</span></a>
        </li>

		<li class="<?= ($this->uri->segment(2) == 'Data_jadwal') ? 'active' : '' ?>">
            <a href="<?php echo base_url() ?>Admin/Data_jadwal" class="<?= ($this->uri->segment(2) == 'Data_jadwal') ? 'active' : '' ?>"><i class="fas fa-calendar-alt align-self-center menu-icon"></i><span>Data Jadwal Dokter</span></a>
        </li>

		<li class="<?= ($this->uri->segment(2) == 'Data_pasien') ? 'active' : '' ?>">
            <a href="<?php echo base_url() ?>Admin/Data_pasien" class="<?= ($this->uri->segment(2) == 'Data_pasien') ? 'active' : '' ?>"><i class="fas fa-id-card align-self-center menu-icon"></i><span>Data Pasien</span></a>
        </li>

		<li class="<?= ($this->uri->segment(2) == 'Data_antrean') ? 'active' : '' ?>">
            <a href="<?php echo base_url() ?>Admin/Data_antrean/Cari/<?php date_default_timezone_set('Asia/Jakarta'); echo date("Y-m-d") ?>" class="<?= ($this->uri->segment(2) == 'Data_antrean') ? 'active' : '' ?>"><i class="fas fa-users align-self-center menu-icon"></i><span>Data Antrean Pasien</span></a>
        </li>

		<?php } ?>

        <!-- <li>
            <a href="javascript: void(0);"><i data-feather="file-text" class="align-self-center menu-icon"></i><span>Master Data</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>master_data/data_akun"><i class="ti-control-record"></i>Data Akun</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>master_data/saldo_awal"><i class="ti-control-record"></i>Saldo Awal</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>master_data/data_barang"><i class="ti-control-record"></i>Data Barang</a></li>

            </ul>
        </li> -->

        <!-- <li>
            <a href="javascript: void(0);"><i data-feather="shopping-cart" class="align-self-center menu-icon"></i><span>Transaksi</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>transaksi/kas_masuk"><i class="ti-control-record"></i>Kas Masuk</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>transaksi/kas_keluar"><i class="ti-control-record"></i>Kas Keluar</a></li>
            </ul>
        </li> -->

        <!-- <hr class="hr-dashed hr-menu"> -->
        <!-- <li class="menu-label my-2">laporan & pengaturan</li> -->

        <!-- <li>
            <a href="javascript: void(0);"><i data-feather="book" class="align-self-center menu-icon"></i><span>Laporan</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>laporan/jurnal_umum"><i class="ti-control-record"></i>Jurnal Umum</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>laporan/jurnal_penyesuaian"><i class="ti-control-record"></i>Jurnal Penyesuaian</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>laporan/buku_besar"><i class="ti-control-record"></i>Buku Besar</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>laporan/posisi_keuangan"><i class="ti-control-record"></i>Posisi Keuangan</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>laporan/laba_rugi"><i class="ti-control-record"></i>Laba Rugi</a></li>
            </ul>
        </li> -->

        <!-- <li>
            <a href="javascript: void(0);"><i data-feather="settings" class="align-self-center menu-icon"></i><span>Pengaturan Akun</span></a>

        </li> -->
    </ul>
</div>
</div>


<div class="page-wrapper">
    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- Navbar -->
        <nav class="navbar-custom">
            <ul class="list-unstyled topbar-nav float-end mb-0">
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="ms-1 nav-user-name hidden-sm me-2"><?php echo $this->session->userdata('username') ?></span>
                        <img src="<?= base_url() ?>assets/admin/images/users/user-5.jpg" alt="profile-user" class="rounded-circle thumb-xs" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="dropdown-divider mb-0"></div>
                        <a class="dropdown-item" href="<?php echo base_url() ?>Admin/Auth/Login/Logout"><i data-feather="power" class="align-self-center icon-xs icon-dual me-1"></i> Logout</a>
                    </div>
                </li>
            </ul>
            <!--end topbar-nav-->

            <ul class="list-unstyled topbar-nav mb-0">
                <li>
                    <button class="nav-link button-menu-mobile">
                        <i data-feather="menu" class="align-self-center topbar-icon"></i>
                    </button>
                </li>
            </ul>
        </nav>
        <!-- end navbar-->
    </div>
