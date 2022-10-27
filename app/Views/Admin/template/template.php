<?php
if (session()->get('login') == false) {
    echo '
        <div class="position-absolute top-50 start-50 translate-middle" style="border: 2px solid black; text-align: center; border-radius: 20px; padding: 20px; width: 100%">
        Dilarang Masuk Tanpa Login Terima Kasih Klik Link Dibawah Ini Untuk Login <br>
        <strong><a style="font-size: 30px" href=' . base_url() . '>Login</a></strong>
        </div>';
    die();
}
$menu = "";
$warna = "primary";
if (session()->get('jabatan') == 'admin') {
    $warna = 'success';
    $menu = 'admin';
} elseif (session()->get('jabatan') == 'kades') {
    $warna = 'primary';
    $menu = 'kades';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Lurah - Kelurahan Sindang Jaya</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" type="/image/png" href="/assets/logo_bandung.png" />
    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>/TemplatePetugas/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/TemplatePetugas/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- CDN CKEditor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/TemplatePetugas/css/tambahansurat.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <?= $this->renderSection('link'); ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-<?= $warna ?> sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <img src="/assets/logo_bandung.png" style="width: 50px; height: 50px;">
                </div>
                <div class="sidebar-brand-text mx-3">E-LURAH <br>Sindangjaya</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php base_url() ?>/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Fitur Utama
            </div>
            <?php if ($menu == 'admin') : ?>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#berita" aria-expanded="true" aria-controls="berita">
                        <i class="fas fa-newspaper fa-cog"></i>
                        <span>Berita</span>
                    </a>
                    <div id="berita" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?php base_url() ?>/admin/berita">Dashboard</a>
                            <a class="collapse-item" href="<?php base_url() ?>/admin/listberita">List Berita</a>
                            <a class="collapse-item" href="<?php base_url() ?>/admin/buatberita">Buat Berita</a>
                            <a class="collapse-item" href="<?php base_url() ?>/admin/usangberita">Berita Yang Dihapus</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#surat" aria-expanded="true" aria-controls="surat">
                        <i class="fas fa-envelope fa-cog"></i>
                        <span>Surat</span>
                    </a>
                    <div id="surat" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?php base_url() ?>/admin/surat">List Surat</a>
                            <a class="collapse-item" href="<?php base_url() ?>/admin/suratpending">Surat Proses</a>
                            <a class="collapse-item" href="<?php base_url() ?>/admin/suratselesai">Surat Selesai</a>
                            <a class="collapse-item" href="<?php base_url() ?>/admin/suratditolak">Surat Ditolak</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#masyarakat" aria-expanded="true" aria-controls="masyarakat">
                        <i class="fas fa-users"></i>
                        <span>Masyarakat</span>
                    </a>
                    <div id="masyarakat" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?php base_url() ?>/admin/Masyarakat/index">List Masyarakat</a>
                            <a class="collapse-item" href="<?php base_url() ?>/admin/chartmasyarakat">Diagram Masyarakat</a>
                            <a class="collapse-item" href="<?php base_url() ?>/admin/dokumenmasyarakat">Dokumen Masyarakat</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-user"></i>
                        <span>User</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href='<?php base_url() ?>/admin/user'>List User</a>
                            <a class="collapse-item" href='<?php base_url() ?>/admin/adduser'>Tambah User</a>
                        </div>
                    </div>
                </li>
            <?php endif ?>
            <?php if ($menu == 'kades') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php base_url() ?>/admin/rekapsurat">
                        <i class="fas fa-fw fa-envelope"></i>
                        <span>Rekap Surat</span></a>
                </li>
            <?php endif ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Logged As :
            </div>
            <li class="nav-item">
                <a class="nav-link" disable>
                    <i class="fas fa-fw fa-user"></i>
                    <span><?= session()->get('nama_petugas')  ?></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" disable>
                    <i class="fas fa-fw fa-dwadaw"></i>
                    <span><?= ucfirst(session()->get('jabatan')) ?></span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                Logout
            </div>

            <li class="nav-item">
                <a class="nav-link" href="/Login/logout">
                    <i class="fas fa-fw fa-exclamation"></i>
                    <span>Logout</span></a>
            </li>
            <!-- Divider -->
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 ml-3 mt-3">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="container-fluid mt-3">
                    <?= $this->renderSection('konten'); ?>
                </div>
            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <?= $this->renderSection('script'); ?>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/TemplatePetugas/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/TemplatePetugas/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script src="/DataTables/edittables/masyarakat.js"></script>
    <script src="/DataTables/datatables.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/TemplatePetugas/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>/TemplatePetugas/js/sb-admin-2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/js/chartscript.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Datatables -->
    <!-- <script type="text/javascript" src="/DataTables/DataTables-1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/DataTables/DataTables-1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript" src="/DataTables/Buttons-2.2.2/js/buttons.bootstrap5.min.js"></script>
    <script type="text/javascript" src="/DataTables/Buttons-2.2.2/js/buttons.dataTables.min.js"></script>
    <script type="text/javascript" src="/DataTables/Buttons-2.2.2/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="/DataTables/Buttons-2.2.2/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="/DataTables/Buttons-2.2.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="/DataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script> -->
</body>

</html>