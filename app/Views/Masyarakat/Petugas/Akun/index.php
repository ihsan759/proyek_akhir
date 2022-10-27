<?= $this->extend('Masyarakat/layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content-->
<div class="container-fluid">

    <!-- Judul Halaman -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Akun Warga</h1>
    </div>

    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Akun Warga</h6>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">x</button>
                        <?= session()->getFlashdata('success') ?>
                    </div>
                </div>
            <?php endif ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($akun as $data) :
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $data['NIK'] ?></td>
                                <td class="text-center"><?= $data['Nama'] ?></td>
                                <td class="text-center">
                                    <a href="" class="text-info" data-toggle="modal" data-target="#modaleditakun" data-NIK="<?php echo $data['NIK']; ?>"><i class="fas fa-pen"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>

<?= $this->section('plugin'); ?>

<script src="<?= base_url() ?>/modal/modal_edit.js"></script>
<script src="<?= base_url() ?>/DataTables/edittables/dokumen.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/DataTables/datatables.min.js"></script>
<?= $this->endSection(); ?>