<?= $this->extend('Admin/template/template'); ?>
<?= $this->section('konten'); ?>

<h1 class="mt-4">Detail Berita</h1>
<small>Ini Adalah Halaman Detail Berita</small>
<hr>
<div class="card mb-3">
  <img src="/berita/gambar/<?= $berita['gambar']; ?>" class="card-img-top" alt="..." style='height: 400px; border-radius: 30px;'>
  <div class="card-body">
    <center>
      <h3><?= $berita['judul'] ?></h5>
        <h5>Author : <?= $author['nama_petugas'] ?></h5>
        <p><?= $berita['created_at'] ?></p>
    </center>
    <p class="card-text"><?= $berita['isi'] ?></p>
  </div>
  <br>
  <a href="javascript:window.history.go(-1);" class="btn btn-primary">Kembali</a>
</div>
<?= $this->endSection(); ?>