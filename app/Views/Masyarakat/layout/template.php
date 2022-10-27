<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>/TemplatePetugas/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/TemplatePetugas/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- ckeditor -->
    <script src="<?= base_url('ckeditor/ckeditor.js'); ?>"></script>

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/DataTables/datatables.min.css" />

    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('home') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SINDANGJAYA</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <?php if (session('jabatan')) { ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('home') ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
            <?php } else { ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('warga/home') ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
            <?php } ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Halaman
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <?php if (session('jabatan')) { ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Surat" aria-expanded="true" aria-controls="Surat">
                        <i class="fas fa-fw fa-envelope-open-text"></i>
                        <span>Surat</span>
                    </a>
                    <div id="Surat" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Menu Surat:</h6>
                            <a class="collapse-item" href="<?= base_url('surat') ?>/add">Buat Surat</a>
                            <a class="collapse-item" href="<?= base_url('surat') ?>/index">Surat Proses</a>
                            <a class="collapse-item" href="<?= base_url('surat') ?>/tolak">Surat Tolak</a>
                            <a class="collapse-item" href="<?= base_url('surat') ?>/terima">Surat Terima</a>
                            <a class="collapse-item" href="<?= base_url('surat') ?>/verifikasi">Surat Verifikasi</a>
                        </div>
                    </div>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Surat" aria-expanded="true" aria-controls="Surat">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Surat</span>
                    </a>
                    <div id="Surat" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Menu Surat:</h6>
                            <a class="collapse-item" href="<?= base_url('surat') ?>/add">Buat Surat</a>
                            <a class="collapse-item" href="<?= base_url('surat') ?>/index">Surat Pending</a>
                            <a class="collapse-item" href="<?= base_url('surat') ?>/index">Surat Proses</a>
                            <a class="collapse-item" href="<?= base_url('surat') ?>/tolak">Surat Tolak</a>
                            <a class="collapse-item" href="<?= base_url('surat') ?>/terima">Surat Terima</a>
                        </div>
                    </div>
                </li>
            <?php } ?>

            <?php if (session('jabatan')) : ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Berita" aria-expanded="true" aria-controls="Berita">
                        <i class="fas fa-fw fa-newspaper"></i>
                        <span>Berita</span>
                    </a>
                    <div id="Berita" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Menu Berita:</h6>
                            <a class="collapse-item" href="<?= base_url('berita') ?>/add">Buat Berita</a>
                            <a class="collapse-item" href="<?= base_url('berita') ?>/index">Data Berita</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Masyarakat" aria-expanded="true" aria-controls="Masyarakat">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Masyarakat</span>
                    </a>
                    <div id="Masyarakat" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Menu Masyrakat:</h6>
                            <a class="collapse-item" href="<?= base_url('masyarakat') ?>/upload">Upload Data Masyarakat</a>
                            <a class="collapse-item" href="<?= base_url('masyarakat') ?>/input">Input Berkas</a>
                            <a class="collapse-item" href="<?= base_url('masyarakat') ?>/index">Data Masyarakat</a>
                            <a class="collapse-item" href="<?= base_url('masyarakat') ?>/edit">Edit Berkas</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Dokumen" aria-expanded="true" aria-controls="Dokumen">
                        <i class="fas fa-fw fa-file"></i>
                        <span>Dokumen</span>
                    </a>
                    <div id="Dokumen" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Menu Dokumen:</h6>
                            <a class="collapse-item" href="<?= base_url('dokumen') ?>/upload">Upload Dokumen</a>
                            <a class="collapse-item" href="<?= base_url('dokumen') ?>/index">Data Dokumen</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Akun" aria-expanded="true" aria-controls="Akun">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Akun</span>
                    </a>
                    <div id="Akun" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Menu Akun:</h6>
                            <a class="collapse-item" href="<?= base_url('akun') ?>/add">Buat Akun</a>
                            <a class="collapse-item" href="<?= base_url('akun') ?>/index">Data Akun</a>
                        </div>
                    </div>
                </li>

            <?php endif ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php if (!session('nama')) {
                                        echo "Masyarakat";
                                    } else {
                                        echo session('nama');
                                    } ?></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <?= $this->renderSection('content'); ?>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2022 - E-lurah Sindangjaya</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda ingin logout ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="<?= base_url('logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Alasan Modal -->
    <div class="modal fade" id="modalalasan" tabindex="-1" role="dialog" aria-labelledby="modalalasanLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalalasanLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-break" id="alasan"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Akun -->
    <div class="modal fade" id="modaleditakun" tabindex="-1" role="dialog" aria-labelledby="modaleditakunLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('akun') ?>/update" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="NIK" id="NIK">
                        <div class="form-group">
                            <label for="Password">Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>" id="Password" aria-describedby="emailHelp" name="password" value="<?= old('password') ?>" autofocus>
                            <div class="invalid-feedback">
                                <?= $validation->getError('password'); ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Verifikasi Status -->
    <div class="modal fade" id="modalverifikasi" tabindex="-1" role="dialog" aria-labelledby="modalverifikasiLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('surat') ?>/verifikasi" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id" id="id_surat">
                        <div class="form-group">
                            <label for="status">Status<span class="text-danger">*</span></label>
                            <select class="form-control <?= ($validation->hasError('status')) ? 'is-invalid' : '' ?>" name="status">
                                <option value="Tolak">Tolak</option>
                                <option value="Proses">Terima</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('status'); ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/TemplatePetugas/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/TemplatePetugas/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/TemplatePetugas/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>/TemplatePetugas/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url() ?>/TemplatePetugas/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url() ?>/TemplatePetugas/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>/TemplatePetugas/js/demo/chart-pie-demo.js"></script>

    <?= $this->renderSection('plugin'); ?>


</body>

</html>