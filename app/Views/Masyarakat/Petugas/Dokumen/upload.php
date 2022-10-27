<?= $this->extend('Masyarakat/layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Upload Dokumen</h1>
    </div>

    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Upload Dokumen</h6>
            </div>
            <div class="card-body">
                <form action="<?= base_url('dokumen') ?>/upload" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Dokumen<span class="text-danger">*</span></label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_dokumen')) ? 'is-invalid' : '' ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_dokumen" value="<?= old('judul') ?>" autofocus>
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_dokumen'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Dokumen<span class="text-danger">*</span></label>
                        <input type="file" class="form-control-file <?= ($validation->hasError('file')) ? 'is-invalid' : '' ?>" id="exampleFormControlFile1" name="file" accept=".xls,.xlsx" value="<?= old('file') ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('file'); ?>
                        </div>
                        <small id="exampleFormControlFile1" class="form-text text-muted">Silahkan Upload file dokumen yang ingin diserahkan.</small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>