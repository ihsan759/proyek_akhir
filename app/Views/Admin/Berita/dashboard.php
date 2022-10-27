<?= $this->extend('Admin/template/template'); ?>
<?= $this->section('konten'); ?>

<h1 class="mt-4">Dashboard Berita</h1>
<small>Ini Adalah Halaman Dashboard Berita</small>
<hr>
<form action="" method="get" class="mb-1">
  <h6>Pencarian</h6>
  <div class="input-group">
    <input type="search" class="form-control width-50 p-3" name="judul" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
    <button type="submit" class="btn btn-outline-primary"><img src="/assets/magnifying-glass.png" style="height:20px ; width: 20px;"></button>
  </div>
</form>
<a href="<?= base_url() ?>/admin/berita" class="btn btn-danger mb-4" type="submit">Reset Pencarian</a>
<?php if ($berita == null) : ?>
  <div class="card mb-3">
    <div class="card-body">
      <center>
        <h4>Tidak Ada Berita Ditemukan</h4>
      </center>
    </div>
  </div>
<?php endif ?>
<?php foreach ($berita as $b) : ?>

  <div class="card mb-3">
    <img src="/berita/gambar/<?= $b['gambar']; ?>" class="card-img-top" alt="..." style='height: 300px;'>
    <div class="card-body">
      <h5 class="card-title"><?= $b['judul'] ?></h5>
      <p class="card-text"><?= $b['caption'] ?></p>
      <p class="card-text"><small class="text-muted">Last updated : <?= $b['updated_at'] ?></small></p>
      <a href="/admin/Berita/haldetailberita/<?php echo $b['id'] ?>" class="btn btn-primary">Baca Lebih Lanjut</a>
    </div>
  </div>

<?php endforeach ?>
<?= $pager->links('berita', 'berita_pagination') ?>
<?= $this->endSection(); ?>