<?= $this->extend('Masyarakat/layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content-->
<div class="container-fluid">

    <!-- Judul Halaman -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Dokumen</h1>
    </div>

    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Dokumen</h6>
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
                            <th>Nama Dokumen</th>
                            <th>File Dokumen</th>
                            <th>Tanggal Input</th>
                            <th>Status</th>
                            <?php if (session('jabatan') == 'RT') { ?>
                                <th>Aksi</th>
                            <?php } else { ?>
                                <th>RT</th>
                                <th>RW</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($dokumen as $data) :
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center text-break"><?= $data['nama_dokumen'] ?></td>
                                <td class="text-center"><a href="<?= base_url('/dokumen') ?>/<?= $data['file'] ?>" class="text-primary" download><?= $data['file'] ?></a></td>
                                <td class="text-center"><?= $data['created_at'] ?></td>
                                <td class="text-center"><?= $data['status'] ?></td>
                                <?php if (session('jabatan') == 'RT') { ?>
                                    <td class="text-center"><a href="<?= site_url('dokumen/delete/') . $data['id'] ?>" class="text-danger" onclick="return confirm('Apakah anda ingin menghapus data ini ?')"><i class="fas fa-trash"></i></a></td>
                                <?php } else { ?>
                                    <td class="text-center"><?= $data['rt'] ?></td>
                                    <td class="text-center"><?= $data['rw'] ?></td>
                                <?php } ?>
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

<script src="<?= base_url() ?>/DataTables/edittables/dokumen.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/DataTables/datatables.min.js"></script>
<?= $this->endSection(); ?>