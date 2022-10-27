<?= $this->extend('Masyarakat/layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Buat Akun</h1>
    </div>

    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Pembuatan Akun Masyarakat</h6>
            </div>
            <div class="card-body">
                <form action="<?= base_url('akun') ?>/add" method="POST">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIK<span class="text-danger">*</span></label>
                        <select class="js-example-basic-single js-states form-control <?= ($validation->hasError('NIK')) ? 'is-invalid' : '' ?>" name="NIK">
                            <?php foreach ($nik as $data) : ?>
                                <option value="<?= $data['NIK'] ?>"><?= $data['NIK'] . ' - ' . $data['Nama'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('NIK'); ?>
                        </div>
                    </div>
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
<!-- /.container-fluid -->

<?= $this->endSection(); ?>

<?= $this->section('plugin'); ?>

<script src="<?= base_url() ?>/select2/input.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<?= $this->endSection(); ?>