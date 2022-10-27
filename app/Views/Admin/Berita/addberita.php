<?= $this->extend('Admin/template/template'); ?>
<?= $this->section('konten'); ?>

<h1 class="mt-4">Tambah Berita</h1>
<small>Ini Adalah Halaman Pembuatan Berita</small>
<hr>
<form method="POST" action="/admin/Berita/addberita" enctype="multipart/form-data">
  <?= csrf_field() ?>
  <div class="mb-3">
    <label for="judul" class="form-label">Judul</label>
    <input type="text" name="judul" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ?>" id="judul" placeholder="Masukkan Judul Berita atau Informasi ...">
    <div class="invalid-feedback">
      <?= $validation->getError('judul'); ?>
    </div>
  </div>
  <div class="mb-3">
    <label for="id_petugas" class="form-label">Author</label>
    <input type="text" name="id_petugas" value="<?= session()->get('nama_petugas') ?>" class="form-control" id="id_petugas" disabled>
  </div>
  <div class="mb-3">
    <label for="gambar" class="form-label">Gambar</label>
    <input type="file" accept=".png, .jpg, .jpeg" name="gambar" class="input-file form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : '' ?>" id="gambar" onchange="previmg()">
    <div class="invalid-feedback">
      <?= $validation->getError('gambar'); ?>
    </div>
  </div>
  <div class="mb-3">
    <label for="caption" class="form-label">Caption</label>
    <input type="text" name="caption" class="form-control <?= ($validation->hasError('caption')) ? 'is-invalid' : '' ?>" id="caption">
    <div class="invalid-feedback">
      <?= $validation->getError('caption'); ?>
    </div>
  </div>
  <div class="mb-3">
    <label for="isi" class="form-label">Isi</label>
    <textarea id="editor" name="isi" class="<?= ($validation->hasError('isi')) ? 'is-invalid' : '' ?>"></textarea>
    <div class="invalid-feedback">
      <?= $validation->getError('isi'); ?>
    </div>
  </div>
  <a href="javascript:window.history.go(-1);" class="btn btn-danger mr-3">Kembali</a>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
  ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
      console.error(error);
    });
</script>
<?= $this->endSection(); ?>