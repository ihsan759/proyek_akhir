<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Custom fonts for this template-->

    <link href="<?= base_url() ?>/TemplatePetugas/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/TemplatePetugas/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/DataTables/datatables.min.css" />

    <!-- <link rel="stylesheet" href="<?= base_url() ?>/berita/css/index.css"> -->
    <title><?= $title ?></title>

    <style>
        body {
            background-color: rgba(228, 222, 222, 0.507);
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-gradient-secondary">
        <a class="navbar-brand text-light font-weight-bold" href="<?= base_url() ?>">Sindangjaya</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-light" href="<?= base_url('/warga/berita/baca') ?>">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="<?= base_url('#about') ?>">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="<?= base_url('#surat') ?>">Cek Surat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="<?= base_url('#contact') ?>">Kontak</a>
                </li>
            </ul>
        </div>
    </nav>

    <?= $this->renderSection('content'); ?>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/TemplatePetugas/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/TemplatePetugas/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/TemplatePetugas/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>/TemplatePetugas/js/sb-admin-2.min.js"></script>

    <?= $this->renderSection('plugin'); ?>

</body>

</html>