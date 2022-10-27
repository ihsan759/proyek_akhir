<?= $this->extend('Admin/template/template'); ?>
<?= $this->section('konten'); ?>

<h1 class="mt-4">Edit Berita</h1>
<hr>
<small>Edit Berita Disini ( Judul Berita : <?= $berita['judul']; ?> )</small>
<hr>
<form method="POST" action="/admin/Berita/editberita" enctype="multipart/form-data">
  <?= csrf_field() ?>
  <input type="text" hidden name="id" value="<?= $berita['id']; ?>">
  <div class="mb-3">
    <label for="judul" class="form-label">Judul</label>
    <input type="text" name="judul" class="form-control" id="judul" value="<?= $berita['judul']; ?>">
  </div>
  <div class="mb-3">
    <label for="id_petugas" class="form-label">Author</label>
    <input type="text" name="id_author" value="<?= $author['nama_petugas'] ?>" class="form-control" id="id_petugas" disabled>
  </div>
  <div class="mb-3">
    <label for="caption" class="form-label">Caption</label>
    <input type="text" name="caption" class="form-control" id="caption" value="<?= $berita['caption']; ?>">
  </div>
  <div class="mb-3">
    <label for="isi" class="form-label">Isi</label>
    <textarea id="editor" name="isi"><?= $berita['isi']; ?></textarea>
  </div>
  <a href="javascript:window.history.go(-1);" class="btn btn-danger mr-3">Kembali</a>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br>
<script>
  ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
      console.error(error);
    });
</script>
<?= $this->endSection(); ?>