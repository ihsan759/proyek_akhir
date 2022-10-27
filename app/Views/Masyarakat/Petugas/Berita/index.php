<?= $this->extend('Masyarakat/layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content-->
<div class="container-fluid">

    <!-- Judul Halaman -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Berita</h1>
    </div>

    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Berita</h6>
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
                            <th>Judul Berita</th>
                            <th>Tanggal Pembuatan</th>
                            <th>Gambar</th>
                            <th>Caption</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($berita as $data) :
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $data['judul'] ?></td>
                                <td class="text-center"><?= $data['updated_at'] ?></td>
                                <td class="text-center"><img src="<?= base_url('/berita/gambar/') ?>/<?= $data['gambar'] ?>" alt="<?= base_url('/berita/gambar/') ?>/<?= $data['gambar'] ?>" width="100px"></td>
                                <td class="text-center"><?= $data['caption'] ?></td>
                                <td class="text-center">
                                    <a href="<?= site_url('berita/delete/') . $data['id'] ?>" class="text-danger" onclick="return confirm('Apakah anda ingin menghapus data ini ?')"><i class="fas fa-trash"></i></a>
                                    <a href="<?= site_url('berita/edit/') . $data['id'] ?>" class="text-info" onclick="return confirm('Apakah anda ingin mengupdate data ini ?')"><i class="fas fa-pen"></i></a>
                                    <a href="<?= site_url('berita/detail/') . $data['id'] ?>"><i class="fas fa-info-circle"></i></a>
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

<script src="<?= base_url() ?>/DataTables/edittables/dokumen.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/DataTables/datatables.min.js"></script>
<?= $this->endSection(); ?>