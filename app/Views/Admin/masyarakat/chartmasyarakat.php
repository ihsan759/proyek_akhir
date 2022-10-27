<?= $this->extend('Admin/template/template'); ?>
<?= $this->section('konten'); ?>

<h1 class="mt-4">Diagram Masyarakat</h1>
<small>Ini Adalah Halaman Diagram Masyarakat | Detail Masyarakat</small>
<hr>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">- Jenis Kelamin</li>
</ol>
<button class="btn btn-primary" id="barjk">Diagram Batang</button>
<button class="btn btn-primary" id="doughnutjk">Diagram Lingkaran</button>
<div>
    <canvas id="jk"></canvas>
</div>
<br>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">- Usia</li>
</ol>
<button class="btn btn-primary" id="barusia">Diagram Batang</button>
<button class="btn btn-primary" id="lineusia">Diagram Garis</button>
<button class="btn btn-primary" id="doughnutusia">Diagram Lingkaran</button>

<div>
    <canvas id="usia"></canvas>
</div>
<br>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const lineusia = document.getElementById('lineusia');
    const doughnutusia = document.getElementById('doughnutusia');
    const barusia = document.getElementById('barusia');

    lineusia.addEventListener('click', changelineusia);
    doughnutusia.addEventListener('click', changedoughnutusia);
    barusia.addEventListener('click', changebarusia);

    const ctxusia = document.getElementById('usia').getContext('2d');
    const usia = new Chart(ctxusia, {
        type: 'bar',
        data: {
            labels: ['Balita', 'Kanak - Kanak', 'Remaja', 'Dewasa', 'Lanjut Usia'],
            datasets: [{
                label: 'Jumlah',
                data: [<?= countusiamasyarakat(1, 5); ?>, <?= countusiamasyarakat(5, 11); ?>, <?= countusiamasyarakat(12, 25); ?>, <?= countusiamasyarakat(26, 45); ?>, <?= countusiamasyarakat(46, 200); ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        }
    });


    const doughnutjk = document.getElementById('doughnutjk');
    const barjk = document.getElementById('barjk');

    doughnutjk.addEventListener('click', changedoughnutjk);
    barjk.addEventListener('click', changebarjk);

    const ctxjk = document.getElementById('jk').getContext('2d');
    const jk = new Chart(ctxjk, {
        type: 'bar',
        data: {
            labels: ['Laki - Laki', 'Perempuan'],
            datasets: [{
                label: 'Jumlah',
                data: [<?= countdatajeniskelamin('Laki-Laki') ?>, <?= countdatajeniskelamin('Perempuan') ?>],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        }
    });

    function changelineusia() {
        const updatetype = 'line';
        usia.config.type = updatetype;
        usia.update();
    }

    function changedoughnutusia() {
        const updatetype = 'doughnut';
        usia.config.type = updatetype;
        usia.update();
    }

    function changebarusia() {
        const updatetype = 'bar';
        usia.config.type = updatetype;
        usia.update();
    }

    function changedoughnutjk() {
        const updatetype = 'doughnut';
        jk.config.type = updatetype;
        jk.update();
    }

    function changebarjk() {
        const updatetype = 'bar';
        jk.config.type = updatetype;
        jk.update();
    }
</script>
<?= $this->endSection(); ?>