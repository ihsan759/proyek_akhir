<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title ?></title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url() ?>/TemplateMasyarakat/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">Sindangjaya</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#about">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="#surat">Cek Surat</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url("warga/berita/baca") ?>">Berita</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url("login") ?>">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">E-Lurah Kelurahan Sindangjaya</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Aplikasi kelurahan sindangajaya berbasis web</p>
                    <a class="btn btn-primary btn-xl" href="#about">Tentang kami</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="page-section bg-primary" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">E-Lurah Kelurahan Sindangjaya</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">E-Lurah Kelurahan Sindangjaya merupakan aplikasi kelurahan berbasis web yang digunakan untuk mencari informasi seputar kelurahan Sindangjaya, mengajukan surat permohonan dan melakukan pengolahan data kependudukan seputar kelurahan Sindangjaya</p>
                </div>
            </div>
        </div>
    </section>

    <!-- cek surat -->
    <section class="page-section bg-success" id="surat">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8">
                    <h2 class="text-white mt-0 text-center">Cek Status Surat</h2>
                    <hr class="divider divider-light" />
                    <?php if (isset($surat)) : ?>
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <?php if ($count != 0) { ?>
                                    <?php foreach ($surat as $data) : ?>
                                        <p>status surat <?= $data['jenis_surat'] ?> : <?= $data['status'] ?></p><br>
                                    <?php endforeach ?>
                                <?php } else { ?>
                                    <p>Data tidak ditemukan</p>
                                <?php } ?>
                            </div>
                        </div>
                    <?php endif ?>
                    <form action="<?= base_url('#surat') ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="Jenissurat">Jenis Surat<span class="text-danger">*</span></label>
                            <select class="form-control <?= ($validation->hasError('jenis_surat')) ? 'is-invalid' : '' ?>" name="jenis_surat" value="<?= old('jenis_surat') ?>">
                                <option>Surat Pengantar SKCK</option>
                                <option>Surat Pengantar Izin Keramaian</option>
                                <option>Surat Keterangan Kematian</option>
                                <option>Surat Kelahiran</option>
                                <option>Surat SKTM Pendidikan</option>
                                <option>Surat SKTM Kesehatan</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('jenis_surat'); ?>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="nik">NIK</label>
                            <input type="number" class="form-control <?= ($validation->hasError('NIK')) ? 'is-invalid' : '' ?>" id="nik" name="NIK" value="<?= old('NIK') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('NIK'); ?>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="tanggal">Tanggal Pembuatan</label>
                            <input type="date" class="form-control <?= ($validation->hasError('date')) ? 'is-invalid' : '' ?>" id="tanggal" name="date" value="<?= old('date') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('date'); ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section class="page-section bg-secondary" id="contact">
        <div class="container px-4 px-lg-5">
            <div class="gx-4 gx-lg-5 justify-content-center">
                <div class="text-center">
                    <h2 class="text-white mt-0">Kontak Kami</h2>
                    <hr class="divider divider-light mb-5" />
                    <div class="row justify-content-between">
                        <div class="col-lg-4">
                            <h3 class="text-white-75 mb-3">Alamat</h3>
                            <p class="text-white-75">Jl. Arcamanik No.43, Pasir Impun, Kec. Mandalajati, Kota Bandung, Jawa Barat 40293</p>
                        </div>
                        <div class="col-lg-4">
                            <h3 class="text-white-75 mb-3">Nomor Telepon</h3>
                            <h5 class="text-white-75">(022) 7815675</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Copyright &copy; 2022 - E-lurah Sindangjaya</div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>