<?= $this->extend('Admin/template/template'); ?>
<?= $this->section('konten'); ?>

<h1 class="mt-4">List Berita</h1>
<small>Ini Adalah Halaman List Semua Berita Yang Sudah Dibuat</small>
<hr>
<small>Jumlah Berita Dibuat : <?php echo countdata('berita'); ?></small>
<hr>
<div class="scroll">
  <table class="table" id="tabelberita">
    <thead style="text-align: center;">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Judul</th>
        <th scope="col">Author</th>
        <th scope="col">Caption</th>
        <th scope="col">Gambar</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody style="text-align: center;">
      <?php if ($berita == null) : ?>
        <tr>
          <td colspan="6">
            <center>Tidak Ada Berita Yang Dibuat</center>
          </td>
        </tr>
      <?php endif ?>
      <?php $no = 1;
      foreach ($berita as $berita) :
      ?>
        <tr>
          <th><?= $no++ ?></th>
          <td><?= $berita['judul'] ?></td>
          <td><?= $berita['id_author'] ?></td>
          <td><?= $berita['caption'] ?></td>
          <td><?= $berita['gambar'] ?></td>
          <td>
            <a href="/admin/Berita/haleditberita/<?php echo $berita['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
            <a href="/admin/Berita/delberita/<?php echo $berita['id'] ?>" onclick="return confirm('Apakah anda ingin menghapus berita ini ?')" class="btn btn-danger btn-sm">Delete</a>
            <a href="/admin/Berita/haldetailberita/<?php echo $berita['id'] ?>" class="btn btn-warning btn-sm">Detail</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
<?= $pager->links('berita', 'berita_pagination') ?>
<?= $this->endSection(); ?>