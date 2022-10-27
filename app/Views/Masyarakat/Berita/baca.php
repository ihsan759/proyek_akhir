<?= $this->extend('Masyarakat/layout/template_warga'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="card shadow mt-5 mr-3 ml-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Preview Berita</h6>
        </div>
        <div class="card-body">
            <a href="<?= base_url('/warga/berita/baca') ?>"><i class="fas fa-arrow-left h2 mb-4 font-weight-bold text-primary-800"></i></a>
            <div class="text-center">
                <img src="<?= base_url('/berita/gambar/') ?>/<?= $berita['gambar'] ?>" alt="<?= base_url('/berita/gambar/') ?>/<?= $berita['gambar'] ?>" class="img-fluid" width="500px">
            </div>
            <p class="text-center text-muted mt-2" style="font-size: small;"><?= $berita['caption'] ?></p>
            <div class="text-center mt-5">
                <h3><?= $berita['judul'] ?></h3>
                <h5 class="card-title">Penulis : <?= $berita['nama_petugas'] ?></h5>
                <h6 class="card-title">Dibuat Tanggal : <?= $berita['created_at'] ?></h6>
            </div>
            <p class="text-break"><?= $berita['isi'] ?></p>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>