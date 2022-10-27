<?= $this->extend('Admin/template/template'); ?>
<?= $this->section('link'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css">
<style type="text/css">
  div .dt-button.buttons-columnVisibility.active {
    color: black;
    font-size: 15px;
    background: white;
  }
</style>
<?= $this->endSection(); ?>
<?= $this->section('konten'); ?>
<h1 class="mt-4">Halaman Rekap Surat</h1>
<small>Ini adalah halaman untuk mendownload rekap surat</small>
<hr>

<table id="example" class="display table" style="width:100%">
  <thead style="text-align: center;">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Jenis Surat</th>
      <th scope="col">Surat Pengantar</th>
      <th scope="col">Diajukan Tanggal</th>
      <th scope="col">Pemohon</th>
      <th scope="col">NIK</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody style="text-align: center;">
    <?php if ($surat == null) : ?>
      <tr>
        <td colspan="7">
          <center>Tidak Ada Berita Yang Dihapus</center>
        </td>
      </tr>
    <?php endif ?>
    <?php $no = 1;
    foreach ($surat as $s) :
      $s = get_object_vars($s);
    ?>
      <tr>
        <th><?= $no++ ?></th>
        <td><?= $s['jenis_surat'] ?></td>
        <td><?= $s['surat_pengantar'] ?></td>
        <td><?= $s['created_at'] ?></td>
        <td><?= $s['nama_petugas'] ?></td>
        <td><?= $s['NIK'] ?></td>
        <td><?= $s['status'] ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
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
      buttons: ['print', 'excel', 'pdf'],
      dom: "<'row'<'col-md-2 mt-2'f><'col-md-5 mt-4'B><'col-md-3'l>>" +
        "<'row'<'col-md-12'tr>>" +
        "<'row'<'col-md-5'i><'col-md-7'p>>"
    });

    table.buttons().container()
      .appendTo('#example_wrapper .col-md-6:eq(0)');
  });
</script>
<?= $this->endSection(); ?>