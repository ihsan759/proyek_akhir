<?= $this->extend('Admin/template/template'); ?>
<?= $this->section('konten'); ?>

<h1 class="mt-4">Tambah User</h1>
<hr>
<small>Tambah User Disini</small>
<hr>
<form method="POST" action="/admin/User/adduser" enctype="multipart/form-data">
  <?= csrf_field() ?>
  <div class="mb-3">
    <label for="nama" class="form-label">Nama Petugas</label>
    <input type="text" name="nama" class="form-control" id="nama" required>
  </div>
  <div class="mb-3">
    <label for="nohp" class="form-label">No HP</label>
    <input type="text" name="nohp" class="form-control" id="id_petugas" required>
  </div>
  <div class="mb-3">
    <label for="roles" class="form-label">Roles</label>
    <select class="form-select" id="roles" name="roles">
      <option selected value="Petugas">Petugas</option>
      <option value="Admin">Admin</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="jabatan" class="form-label">Jabatan</label>
    <select class="form-select" id="jabatan" name="jabatan">
      <option selected value="rt">RT</option>
      <option value="RW">RW</option>
      <option value="Admin">Admin</option>
      <option value="Kades">Kepala Desa</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="rt" class="form-label">RT</label>
    <input type="text" name="rt" class="form-control" id="rt" required>
  </div>
  <div class="mb-3">
    <label for="rw" class="form-label">RW</label>
    <input type="text" name="rw" class="form-control" id="rw" required>
  </div>
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" name="username" class="form-control" id="username" required>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password" required>
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