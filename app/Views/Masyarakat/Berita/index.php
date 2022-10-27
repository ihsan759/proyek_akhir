<?= $this->extend('Masyarakat/layout/template_warga'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <!-- DataTales -->
    <div class="card shadow mt-5 mr-3 ml-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Berita</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Judul Berita</th>
                            <th>Tanggal Post Berita</th>
                            <th>Gambar</th>
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
                                <td class="text-center">
                                    <a href="<?= site_url('warga/berita/baca/') . $data['id'] ?>"><i class="fas fa-info-circle"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>

<?= $this->section('plugin'); ?>

<script src="<?= base_url() ?>/DataTables/edittables/dokumen.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/DataTables/datatables.min.js"></script>
<?= $this->endSection(); ?>