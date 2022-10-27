<?= $this->extend('Admin/template/template'); ?>
<?= $this->section('konten'); ?>

<h1 class="mt-4">Verifikasi Surat</h1>
<small>Ini adalah halaman untuk memverifikasi surat</small>
<hr>

<u>
	<h3>Detail Surat</h3>
</u>
<br>
<form method="POST" action="/admin/Surat/tolakverif">
	<?= csrf_field() ?>
	<input type="text" name="id" value="<?= $surat['id'] ?>" hidden>
	<div class="mb-3">
		<label for="alasan" class="form-label">Masukkan Alasan Penolakan</label>
		<input type="text" id="alasan" name="alasan" class="form-control" required>
	</div>
	<a href="javascript:window.history.go(-1);" class="btn btn-info">Kembali</a>
	<button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menolak surat ini ?')"> Tolak</button>
	<br><br>
</form>
<h1>Detail Surat</h1>
<div class="mb-3">
	<label for="tgljam" class="form-label">NIK</label>
	<input type="text" id="tgljam" disabled class="form-control" value="<?= $surat['NIK'] ?>">

</div>
<div class="mb-3">
	<label for="jenissurat" class="form-label">Jenis Surat</label>
	<input type="text" class="form-control" value="<?= $surat['jenis_surat'] ?>" id="jenissurat" disabled>
</div>
<div class="mb-3">
	<label for="sp" class="form-label">Surat Pengantar</label>
	<input type="text" id="sp" class="form-control" value="<?= $surat['surat_pengantar'] ?>" disabled>
	<a href="/surat_pengantar/<?= $surat['surat_pengantar'] ?>" download class="btn btn-primary btn-sm mt-2"> Download Surat Pengantar Disini </a>
</div>
<div class="mb-3">
	<label for="tgljam" class="form-label">Tanggal & Jam Pengajuan</label>
	<input type="text" id="tgljam" disabled class="form-control" value="<?= $surat['created_at'] ?>">
</div>
<div class="mb-3">
	<label for="id" class="form-label">ID dan Nama Petugas Pengaju</label>
	<input type="text" id="id" disabled class="form-control" value="<?= $pemohon['id_petugas'] . " - " . $pemohon['nama_petugas'] ?>">
</div>
<?= $this->endSection(); ?>