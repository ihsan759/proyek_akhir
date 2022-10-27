<?= $this->extend('Masyarakat/layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">

        <!-- Surat -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-primary text-uppercase mb-1">
                                Pengajuan Surat</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $surat ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Surat -->

        <!-- Berita -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-warning text-uppercase mb-1">
                                Berita</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $berita ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Berita-->

        <!-- Data Masyarakat  -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-success text-uppercase mb-1">
                                Data Masyarakat</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $masyarakat ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Data Masyarakat-->

        <!-- Dokumen -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-danger text-uppercase mb-1">
                                Dokumen</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dokumen ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Dokumen -->

    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>