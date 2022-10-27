<?= $this->extend('Admin/template/template'); ?>
<?= $this->section('konten'); ?>

<h1 class="mt-4">Dashboard Masyarakat</h1>
<small>Ini Adalah Halaman Dashboard Masyarakat</small>
<hr>
<div class="container-fluid">
    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Masyarakat</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
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
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            lengthChange: true,
            buttons: ['print', 'excel'],
            dom: "<'row'<'col-md-2 mt-2'f><'col-md-5 mt-4'B><'col-md-3'l>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>"
        });

        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
    });
</script>
<?= $this->endSection(); ?>