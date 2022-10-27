<?= $this->extend('Masyarakat/layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Data Masyarakat</h1>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">x</button>
                        <?= session()->getFlashdata('success') ?>
                    </div>
                </div>
            <?php endif ?>
        </div>
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Update Scan KK</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url('masyarakat') ?>/KK" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PUT" />
                        <div class="form-group">
                            <label for="exampleFormControlFile1">No KK</label>
                            <select class="js-example-basic-single js-states form-control" name="No_kk">
                                <?php foreach ($kk as $data) : ?>
                                    <option value="<?= $data['No_kk'] ?>"><?= $data['No_kk'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="KK">Scan KK</label>
                            <input type="file" class="form-control-file <?= ($validation->hasError('file_kk')) ? 'is-invalid' : '' ?>" id="KK" name="file_kk" value="<?= old('file_kk') ?>">
                            <small id="KK" class="form-text text-muted">Silahkan Upload scan KK dalam bentuk pdf, jpg, jpeg, png.</small>
                            <div class="invalid-feedback">
                                <?= $validation->getError('file_kk'); ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Update Scan KTP</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url('masyarakat') ?>/KTP" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PUT" />
                        <div class="form-group">
                            <label for="exampleFormControlFile1">NIK</label>
                            <select class="js-example-basic-single js-states form-control" name="NIK">
                                <?php foreach ($ktp as $data) : ?>
                                    <option value="<?= $data['NIK'] ?>"><?= $data['NIK'] . ' - ' . $data['Nama'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Scan KTP</label>
                            <input type="file" class="form-control-file <?= ($validation->hasError('file_ktp')) ? 'is-invalid' : '' ?>" id="exampleFormControlFile1" name="file_ktp" value="<?= old('file_ktp') ?>">
                            <small id="exampleFormControlFile1" class="form-text text-muted">Silahkan Upload scan KTP dalam bentuk pdf, jpg, jpeg.</small>
                            <div class="invalid-feedback">
                                <?= $validation->getError('file_ktp'); ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">Submit</button>
                    </form>
                </div>
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