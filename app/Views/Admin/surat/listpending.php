<?= $this->extend('Admin/template/template'); ?>
<?= $this->section('konten'); ?>

<h1 class="mt-4">List Surat Pending</h1>
<small>Ini adalah list surat yang belum diverifikasi</small>
<hr>
<small>Jumlah Surat Pending : <?php echo countdatasurat('surat', 'proses'); ?></small>
<hr>
<div class="row g-3 align-items-center">
  <div class="col-auto">
    <i class="fas fa-search"></i>
  </div>
  <div class="col-auto">
    <input type='text' id='txt_searchall' placeholder='Enter search text' class="form-control">
  </div>
</div>

<br>
<div class="scroll">
  <table class="table">
    <thead style="text-align: center;">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Jenis Surat</th>
        <th scope="col">Surat Pengantar</th>
        <th scope="col">Diajukan Tanggal</th>
        <th scope="col">Pemohon</th>
        <th scope="col">NIK</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody style="text-align: center;">
      <?php if ($status == null) : ?>
        <tr>
          <td colspan="8">
            <center>Tidak Ada Surat Pending</center>
          </td>
        </tr>
      <?php endif ?>
      <?php $no = 1;
      foreach ($status as $s) :
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
          <td><a class="btn btn-primary" href="/admin/Surat/halverifsurat/<?= $s['id'] ?>">Verif</a></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type='text/javascript'>
  $(document).ready(function() {

    // Search all columns
    $('#txt_searchall').keyup(function() {
      // Search Text
      var search = $(this).val();

      // Hide all table tbody rows
      $('table tbody tr').hide();

      // Count total search result
      var len = $('table tbody tr:not(.notfound) td:contains("' + search + '")').length;

      if (len > 0) {
        // Searching text in columns and show match row
        $('table tbody tr:not(.notfound) td:contains("' + search + '")').each(function() {
          $(this).closest('tr').show();
        });
      } else {
        $('.notfound').show();
      }

    });

    // Search on name column only
    $('#txt_name').keyup(function() {
      // Search Text
      var search = $(this).val();

      // Hide all table tbody rows
      $('table tbody tr').hide();

      // Count total search result
      var len = $('table tbody tr:not(.notfound) td:nth-child(2):contains("' + search + '")').length;

      if (len > 0) {
        // Searching text in columns and show match row
        $('table tbody tr:not(.notfound) td:contains("' + search + '")').each(function() {
          $(this).closest('tr').show();
        });
      } else {
        $('.notfound').show();
      }

    });

  });

  // Case-insensitive searching (Note - remove the below script for Case sensitive search )
  $.expr[":"].contains = $.expr.createPseudo(function(arg) {
    return function(elem) {
      return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
    };
  });
</script>

<?= $this->endSection(); ?>