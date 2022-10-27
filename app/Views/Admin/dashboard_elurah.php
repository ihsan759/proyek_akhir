<?= $this->extend('Admin/template/template'); ?>
<?= $this->section('konten'); ?>

<h1 class="mt-4">Dashboard</h1>
<!-- Dashboard Surat -->
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">- Surat</li>
</ol>
<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Surat</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= countdata('surat') ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-envelope fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-secondary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                            Surat Proses</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= countdatasurat('surat', 'proses') ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-exclamation fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Surat Selesai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= countdatasurat('surat', 'Selesai') ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Surat Ditolak</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= countdatasurat('surat', 'tolak') ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-trash fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Berita / Informasi -->
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">- Berita / Informasi</li>
    </ol>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Berita</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= countdata('berita') ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Berita Usang</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= countdata('history_berita') ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-trash fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Masyarakat -->
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">- Masyarakat</li>
    </ol>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Masyarakat</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= countdata('kartu_keluarga') ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- User -->
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">- User</li>
    </ol>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah User</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= countdata('user') ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>