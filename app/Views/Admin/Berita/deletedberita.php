<?= $this->extend('Admin/template/template'); ?>
<?= $this->section('konten'); ?>

<h1 class="mt-4">Berita Usang</h1>
<small>Ini Adalah Halaman Berita Yang Sudah Dihapus</small>
<hr>
<a onclick="confirm('Yakin Ingin Menghapus Semua Berita Usang ?')" href="/admin/Berita/delallusang" class="btn btn-danger">Hapus Semua Berita Usang</a>
<hr>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Judul</th>
      <th scope="col">Author</th>
      <th scope="col">Caption</th>
      <th scope="col">Tanggal Hapus</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($history == null) : ?>
      <tr>
        <td colspan="6">
          <center>Tidak Ada Berita Yang Dihapus</center>
        </td>
      </tr>
    <?php endif ?>
    <?php $no = 1;
    foreach ($history as $h) :
    ?>
      <tr>
        <th><?= $no++ ?></th>
        <td><?= $h['judul'] ?></td>
        <td><?= $h['id_author'] ?></td>
        <td><?= $h['caption'] ?></td>
        <td><?= $h['tgl_hapus'] ?></td>
        <td><?= $h['status'] ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?= $pager->links('berita', 'berita_pagination') ?>
<?= $this->endSection(); ?>