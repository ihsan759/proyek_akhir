<?= $this->extend('Admin/template/template'); ?>
<?= $this->section('konten'); ?>

<h1 class="mt-4">Dokumen Masyarakat</h1>
<small>Ini Adalah Halaman Dokumen Masyarakat</small>
<hr>
<small>Jumlah Semua User : <?php echo countdata('user'); ?></small>
<hr>
<br>
<h3>Admin</h3>
<div class="scroll">
  <table class="table">
    <thead style="text-align: center;">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">No HP</th>
        <th scope="col">Roles</th>
        <th scope="col">Jabatan</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody style="text-align: center;">
      <?php if ($admin == null) : ?>
        <tr>
          <td colspan="6">
            <center>Tidak Ada Admin</center>
          </td>
        </tr>
      <?php endif ?>
      <?php $no = 1;
      foreach ($admin as $a) :
        $a = get_object_vars($a);
      ?>
        <tr>
          <th><?= $no++ ?></th>
          <td><?= $a['nama_petugas'] ?></td>
          <td><?= $a['no_hp'] ?></td>
          <td><?= $a['roles'] ?></td>
          <td><?= $a['jabatan'] ?></td>
          <td><a href="/admin/User/haledituser/<?php echo $a['id_petugas'] ?>" class="btn btn-primary btn-sm">Edit</a>
            <a href="/admin/User/deluser/<?php echo $a['id_petugas'] ?>" onclick="return confirm('Apakah anda ingin menghapus user ini ?')" class="btn btn-danger btn-sm">Delete</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
<hr>
<!-- <div class="row g-3 align-items-center">
  <div class="col-auto">
    <i class="fas fa-search"></i>
  </div>
  <div class="col-auto">
    <input type='text' id='txt_searchall' placeholder='Enter search text' class="form-control">
  </div>
</div>
<br> -->
<h3>Petugas</h3>
<div class="scroll">
  <table class="table" id="txt_searchall">
    <thead style="text-align: center;">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">No HP</th>
        <th scope="col">Roles</th>
        <th scope="col">Jabatan</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody style="text-align: center;">
      <?php if ($petugas == null) : ?>
        <tr>
          <td colspan="6">
            <center>Tidak Ada Petugas</center>
          </td>
        </tr>
      <?php endif ?>
      <?php $no = 1;
      foreach ($petugas as $p) :
        $p = get_object_vars($p);
      ?>
        <tr>
          <th><?= $no++ ?></th>
          <td><?= $p['nama_petugas'] ?></td>
          <td><?= $p['no_hp'] ?></td>
          <td><?= $p['roles'] ?></td>
          <td><?= $p['jabatan'] ?></td>
          <td><a href="/admin/User/haledituser/<?php echo $p['id_petugas'] ?>" class="btn btn-primary btn-sm">Edit</a>
            <a href="/admin/User/deluser/<?php echo $p['id_petugas'] ?>" onclick="return confirm('Apakah anda ingin menghapus user ini ?')" class="btn btn-danger btn-sm">Delete</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script') ?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type='text/javascript'>

$(document).ready(function(){

  // Search all columns
  $('#txt_searchall').keyup(function(){
    // Search Text
    var search = $(this).val();

    // Hide all table tbody rows
    $('table tbody tr').hide();

    // Count total search result
    var len = $('table tbody tr:not(.notfound) td:contains("'+search+'")').length;

    if(len > 0){
      // Searching text in columns and show match row
      $('table tbody tr:not(.notfound) td:contains("'+search+'")').each(function(){
        $(this).closest('tr').show();
      });
    }else{
      $('.notfound').show();
    }

  });

  // Search on name column only
  $('#txt_name').keyup(function(){
    // Search Text
    var search = $(this).val();

    // Hide all table tbody rows
    $('table tbody tr').hide();

    // Count total search result
    var len = $('table tbody tr:not(.notfound) td:nth-child(2):contains("'+search+'")').length;

    if(len > 0){
      // Searching text in columns and show match row
      $('table tbody tr:not(.notfound) td:contains("'+search+'")').each(function(){
         $(this).closest('tr').show();
      });
    }else{
      $('.notfound').show();
    }

  });

});

// Case-insensitive searching (Note - remove the below script for Case sensitive search )
$.expr[":"].contains = $.expr.createPseudo(function(arg) {
   return function( elem ) {
     return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
   };
});
</script> -->

<?= $this->endSection(); ?>