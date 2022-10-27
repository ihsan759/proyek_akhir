<?php

function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
$sekarang = tgl_indo(date("Y-m-d"));
$tanggal = tgl_indo($masyarakat['Tanggal_kelahiran']);
// $tanggal = date('d F Y',strtotime($tgl));
$file_names = $masyarakat['NIK']."_".$surat['jenis_surat']."_".$sekarang;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pengantar SKCK</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<style type="text/css">
		.justify{
			text-align: justify;
		}
		p
		{
			text-indent: 40px
		}
		.td1
		{
			width:20%;
		}
		.td3{
			width: 100%;
		}
		.td2 {
			padding : 0 4px;
		}
		table {
			text-align: left;
		}
	</style>
</head>
<body>
<button class="btn btn-primary mx-4 my-4" onclick="Export2Doc('exportContent', '<?=$file_names?>');">Download Disini</button>
<a onclick="window.close()" class = "btn btn-primary">Kembali</a>
<div id="exportContent" class="container">
<center>
	<h2>PEMERINTAH KOTA BANDUNG</h2>
	<h1>KELURAHAN SINDANGJAYA</h1>
	<hr>

	<h3><u><strong>SURAT KETERANGAN BERKELAKUAN BAIK</strong></u></h3>
	<h3>NO : ...............................................</h3>
</center>

<div class="justify">
	<p style="text-indent: 40px">Yang bertanda tangan dibawah ini, ...................................................................<.Isi Dengan Penanda Tangan.>................................................. dengan ini menerangkan bahwa : </p>

</div>
<center>
	<table style="width : 50vw;">
		<tr>
			<td class="td1">Nama</td>
			<td class="td2">:</td>
			<td class="td3"><?= $masyarakat['Nama'] ?></td>
		</tr>
		<tr>
			<td class="td1">Jenis Kelamin</td>
			<td class="td2"> : </td>
			<td class="td3"><?= $masyarakat['Jenis_kelamin'] ?></td>
		</tr>
		<tr>
			<td class="td1">Tempat/Tgl.Lahir</td>
			<td class="td2">:</td>
			<td class="td3"><?= $masyarakat['Tempat_lahir'].", ". $tanggal ?></td>
		</tr>
		<tr>
			<td class="td1">Pekerjaan</td>
			<td class="td2"> : </td>
			<td class="td3"><?= $masyarakat['Pekerjaan'] ?></td>
		</tr>
		<tr>
			<td class="td1">Agama</td>
			<td class="td2">:</td>
			<td class="td3"><?= $masyarakat['Agama'] ?></td>
		</tr>
		<tr >
			<td class="td1">Alamat</td>
			<td class="td2">:</td>
			<td class="td3"><?= $masyarakat['Alamat'] ?></td>
		</tr>
	</table>
</center>
<br>
<div class="justify">
	<p style="text-indent: 40px"><.Badan Surat Silahkan Di Isi Secara Manual Di Ms.Word.></p>
	<p style="text-indent: 40px">Demikian surat keterangan ini kami buat, untuk dapat dipergunakan sebagaimana mestinya</p>
</div>
<div class="right" style="float: right; width: 50%; text-align: right;">
  	<h4>Sindangjaya, <?= $sekarang ?><br>
  		Kepala Desa Sindangjaya
  	</h4>
  	<br><br><br>
  	<u><strong>(Isi Dengan Nama Kepala Desa)</strong></u>
</div>
</div>

<script>
function Export2Doc(element, filename = ''){
var preHtml = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'></head><body>";
var postHtml = "</body></html>";
var html = preHtml+document.getElementById(element).innerHTML+postHtml;

var blob = new Blob(['\ufeff', html],{
    type: 'application/msword'
});

var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html)

filename = filename?filename+'.doc': 'document.doc';

var downloadLink = document.createElement("a");

document.body.appendChild(downloadLink);

if(navigator.msSaveOrOpenBlob){
    navigator.msSaveOrOpenBlob(blob, filename);
}else{
    downloadLink.href = url;

    downloadLink.download = filename;

    downloadLink.click();
}

document.body.removeChild(downloadLink);
}
</script>
</body>
</html>