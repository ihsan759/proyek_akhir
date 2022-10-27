<?= $this->extend('Masyarakat/layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">

        <!-- Pending -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-primary text-uppercase mb-1">
                                Surat Pending</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pending ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Pending -->

        <!-- Proses -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-warning text-uppercase mb-1">
                                Surat Proses</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $proses ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Proses-->

        <!-- Data Diterima  -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-success text-uppercase mb-1">
                                Surat Diterima</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $terima ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Data Diterima-->

        <!-- Ditolak -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-danger text-uppercase mb-1">
                                Surat Ditolak</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tolak ?></div>
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