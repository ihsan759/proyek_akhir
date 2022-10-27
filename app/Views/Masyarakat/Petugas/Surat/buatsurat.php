<?= $this->extend('Masyarakat/layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Buat Surat</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Pengajuan Surat</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('surat') ?>/add" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="id_pemohon" value="<?= session('id_petugas') ?>">
                <div class="form-group">
                    <label for="exampleInputEmail1">NIK<span class="text-danger">*</span></label>
                    <select class="js-example-basic-single js-states form-control" name="NIK">
                        <?php foreach ($nik as $data) : ?>
                            <option value="<?= $data['NIK'] ?>"><?= $data['NIK'] . ' - ' . $data['Nama'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('nik'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Jenissurat">Jenis Surat<span class="text-danger">*</span></label>
                    <select class="form-control" name="jenis_surat">
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
                <div class="form-group">
                    <label for="exampleFormControlFile1">Surat Pengantar<span class="text-danger">*</span></label>
                    <input type="file" class="form-control-file <?= ($validation->hasError('surat_pengantar')) ? 'is-invalid' : '' ?>" id="exampleFormControlFile1" name="surat_pengantar">
                    <div class="invalid-feedback">
                        <?= $validation->getError('surat_pengantar'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Surat Pendukung</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" aria-describedby="surat" name="surat_pendukung">
                    <small id="surat" class="form-text text-muted">Masukkan dokumen pendukung jika memerlukan dokumen pendukung</small>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>

<?= $this->section('plugin'); ?>

<script src="<?= base_url() ?>/select2/input.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<?= $this->endSection(); ?>