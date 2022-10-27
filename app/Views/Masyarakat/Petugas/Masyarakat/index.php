<?= $this->extend('Masyarakat/layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content-->
<div class="container-fluid">

    <!-- Judul Halaman -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Masyarakat</h1>
    </div>

    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Masyarakat</h6>
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
                            <th>Jenis Kelamin</th>
                            <th>Hubungan Dengan Kepala Keluarga</th>
                            <th>Tanggal Kelahiran</th>
                            <th>Tempat Lahir</th>
                            <th>Provinsi</th>
                            <th>Status Perkawinan</th>
                            <th>Agama</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>No SBKRI</th>
                            <th>Tanggal SBKRI</th>
                            <th>Pendidikan Terakhir</th>
                            <th>Kemampuan Bahasa</th>
                            <th>Pekerjaan</th>
                            <th>Tanggal Mulai Tinggal</th>
                            <th>Tanggal Kepindahan</th>
                            <th>Nama Bapak</th>
                            <th>Nama Ibu</th>
                            <th>Golongan Darah</th>
                            <th>Akseptop KB</th>
                            <th>Catat Menurut Jenis</th>
                            <th>Keterangan Lain-lain</th>
                            <?php if (session('jabatan') == 'RT') : ?>
                                <th>Aksi</th>
                            <?php endif ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($masyarakat as $data) :
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $data['NIK'] ?></td>
                                <td><?= $data['Nama'] ?></td>
                                <td><?= $data['Jenis_kelamin'] ?></td>
                                <td><?= $data['Hubungan_kepala_keluarga'] ?></td>
                                <td><?= $data['Tanggal_kelahiran'] ?></td>
                                <td><?= $data['Tempat_lahir'] ?></td>
                                <td><?= $data['Provinsi'] ?></td>
                                <td><?= $data['Status_perkawinan'] ?></td>
                                <td><?= $data['Agama'] ?></td>
                                <td><?= $data['rt'] ?></td>
                                <td><?= $data['rw'] ?></td>
                                <td><?= $data['No_SBKRI'] ?></td>
                                <td><?= $data['Tanggal_SBKRI'] ?></td>
                                <td><?= $data['Pendidikan_terakhir'] ?></td>
                                <td><?= $data['Kemampuan_bahasa'] ?></td>
                                <td><?= $data['Pekerjaan'] ?></td>
                                <td><?= $data['Tanggal_mulai_tinggal'] ?></td>
                                <td><?= $data['Tanggal_kepindahan'] ?></td>
                                <td><?= $data['Nama_bapak'] ?></td>
                                <td><?= $data['Nama_ibu'] ?></td>
                                <td><?= $data['Golongan_darah'] ?></td>
                                <td><?= $data['Akseptor_KB'] ?></td>
                                <td><?= $data['Catat_menurut_jenis'] ?></td>
                                <td><?= $data['Keterangan_lain-lain'] ?></td>
                                <?php if (session('jabatan') == 'RT') : ?>
                                    <td class="text-center"><a href="<?= site_url('masyarakat/delete/') . $data['NIK'] ?>" class="text-danger" onclick="return confirm('Apakah anda ingin menghapus data ini ?')"><i class="fas fa-trash"></i></a></td>
                                <?php endif ?>
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

<script src="<?= base_url() ?>/DataTables/edittables/masyarakat.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/DataTables/datatables.min.js"></script>
<?= $this->endSection(); ?>