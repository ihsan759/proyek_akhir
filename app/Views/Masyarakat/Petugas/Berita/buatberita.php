<?= $this->extend('Masyarakat/layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Buat Berita</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Pembuatan Berita</h6>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="<?= base_url('berita') ?>/add">
                <?= csrf_field() ?>
                <input type="hidden" name="id_author" value="<?= session('id_petugas') ?>">
                <div class="form-group">
                    <label for="exampleInputEmail1">Judul Berita<span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="judul" value="<?= old('judul') ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= $validation->getError('judul'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Gambar Berita<span class="text-danger">*</span></label>
                    <input type="file" class="form-control-file <?= ($validation->hasError('gambar')) ? 'is-invalid' : '' ?>" id="exampleFormControlFile1" name="gambar" value="<?= old('gambar') ?>" accept="png,.jpg,.jpeg">
                    <div class="invalid-feedback">
                        <?= $validation->getError('gambar'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Caption Gambar<span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= ($validation->hasError('caption')) ? 'is-invalid' : '' ?>" id="exampleInputEmail1" aria-describedby="emailHelp" name="caption" value="<?= old('caption') ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('caption'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ckeditor">Isi Berita<span class="text-danger">*</span></label>
                    <textarea class="form-control <?= ($validation->hasError('isi')) ? 'is-invalid' : '' ?>" id="ckeditor" name="isi"><?= old('isi') ?></textarea>
                    <script>
                        CKEDITOR.replace('isi');
                    </script>
                    <div class="invalid-feedback">
                        <?= $validation->getError('isi'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>