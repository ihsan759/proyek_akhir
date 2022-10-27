<?= $this->extend('Admin/template/template'); ?>
<?= $this->section('konten'); ?>

<h1 class="mt-4">Dokumen Masyarakat</h1>
<small>Ini Adalah Halaman Dokumen Masyarakat</small>
<hr>
<small>Jumlah Dokumen Dikirim : <?php echo countdata('dokumen'); ?></small>
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
        <th scope="col">Nama Dokumen</th>
        <th scope="col">Dikirim Tanggal</th>
        <th scope="col">ID Petugas</th>
        <th scope="col">Status</th>
        <th scope="col">Download</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody style="text-align: center;">
      <?php if ($dokumen == null) : ?>
        <tr>
          <td colspan="5">
            <center>Tidak Ada Surat Yang Selesai</center>
          </td>
        </tr>
      <?php endif ?>
      <?php $no = 1;
      foreach ($dokumen as $d) :
      ?>
        <tr>
          <th><?= $no++ ?></th>
          <td><?= $d['nama_dokumen'] ?></td>
          <td><?= $d['created_at'] ?></td>
          <td><?= $d['id_petugas'] ?></td>
          <td><?= $d['status'] ?></td>
          <td><a href="/dokumen/<?= $d['file'] ?>" download class="btn btn-primary btn-sm"> Download Dokumen</a></td>
          <?php if ($d['status'] == "Pending") : ?>
            <td><a href="/admin/masyarakat/verifdokumen/<?= $d['id'] ?>" onclick="return confirm('Apakah Anda Sudah Menerima Dokumen Ini ? ')" class="btn btn-primary btn-sm">Terima</a></td>
          <?php endif ?>
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