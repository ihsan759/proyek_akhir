<?= $this->extend('Masyarakat/layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Surat</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan Surat</h6>
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
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama</th>
                            <th>Jenis Surat</th>
                            <th>Status</th>
                            <?php if (isset($proses)) : ?>
                                <th>Perkiraan Selesai diproses</th>
                            <?php endif ?>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($surat as $data) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $data['Nama'] ?></td>
                                <td><?= $data['jenis_surat'] ?></td>
                                <td><?= $data['status'] ?></td>
                                <?php if (isset($proses)) : ?>
                                    <td><?= date('d F Y', strtotime($data['tanggal_selesai'])) ?></td>
                                <?php endif ?>
                                <td class="text-center">
                                    <?php if ($data['status'] == 'Proses') : ?>
                                        <a href="<?= site_url('surat/delete/') . $data['id'] ?>" class="text-danger" onclick="return confirm('Apakah anda ingin menghapus data ini ?')"><i class="fas fa-trash"></i></a>
                                    <?php elseif ($data['alasan'] != null) : ?>
                                        <a href="" class="text-info" data-toggle="modal" data-target="#modalalasan" data-id="<?php echo $data['id']; ?>" data-alasan="<?php echo $data['alasan']; ?>" data-judul="Alasan Penolakan Pembuatan Surat"><i class="fas fa-info-circle"></i></a>
                                    <?php elseif ($data['status'] == 'Pending') : ?>
                                        <a href="" class="text-info" data-toggle="modal" data-target="#modalverifikasi" data-id="<?php echo $data['id']; ?>"><i class="fas fa-info-circle"></i></a>
                                    <?php endif ?>
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

<script src="<?= base_url() ?>/modal/modal_alasan.js"></script>
<script src="<?= base_url() ?>/modal/modal_status.js"></script>
<script src="<?= base_url() ?>/DataTables/edittables/dokumen.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/DataTables/datatables.min.js"></script>

<?= $this->endSection(); ?>