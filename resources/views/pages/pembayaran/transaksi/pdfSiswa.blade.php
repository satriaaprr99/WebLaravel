<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		.page-break{
			page-break-after:always;
		}
		.text-center{
			text-align:center;
		}
		.text-header {
			font-size:1.1rem;
		}
		.size2 {
			font-size:1.4rem;
		}
		.border-bottom {
			border-bottom:1px black solid;
		}
		.border {
			border: 2px block solid;
		}
		.border-top {
			border-top:1px black solid;
		}
		.float-right {
			float:right;
		}
		.mt-4 {
			margin-top:4px;
		}
		.mx-1 {
			margin:1rem 0 1rem 0;
		}
		.mr-1 {
			margin-right:1rem;
		}
		.mt-1 {
			margin-top:1rem;
		}
		ml-2 {
			margin-left:2rem;
		}
		.ml-min-5 {
			margin-left:-5px;
		}
		.text-uppercase {
			font:uppercase;
		}
		.d1 {
			font-size:2rem;
		}
		.img {
			position:absolute;
		}
		.link {
			font-style:underline;
		}
		.text-desc {
			font-size:14px;
		}
		.text-bold {
			font-style:bold;
		}
		.text-green {
			color: green;
		}
		.text-red {
			color: red;
		}
		.underline {
			text-decoration:underline;
		}

		table {
			font-family: Arial, Helvetica, sans-serif;
			text-shadow: 1px 1px 0px #fff;
			border: #ccc 1px solid;
		}
		table th {
			padding: 2px 5px;
			border-left:1px solid #e0e0e0;
			border-bottom: 1px solid #e0e0e0;
			border-right: 1px solid #e0e0e0;
			background: #ededed;
		}  
		table tr {
			font-size: 10px;
			text-align: center;
			padding-left: 5px;
		}
		table td {
			padding: 2px 5px;
			border-top: 1px solid #ffffff;
			border-bottom: 1px solid #e0e0e0;
			border-left: 1px solid #e0e0e0;
			border-right: 1px solid #e0e0e0;
			background: #fafafa;
			background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
			background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
		}
		.table-center {
			margin-left:auto;
			margin-right:auto;
		}
		.mb-1 {
			margin-bottom:1rem;
		}
		li{
			list-style: none;;
			list-style-type: none;
		}
	</style>
</head>
<body>
	<div class="text-center">
		<img src="{{ public_path('assets/img/brand/java.png') }}" class="img" alt="logo.png" width="90">
		<div style="margin-left:6rem;">
			<span class="text-header text-bold">
				PEMERINTAH DAERAH PROVINSI JAWA BARAT <br> DINAS PENDIDIKAN <br>
				<span class="size2">SEKOLAH MENENGAH KEJURUAN NEGERI 4 BANDUNG</span> <br>
			</span>
			<span class="text-desc">JL. Kliningan Nomor 6 Telepon : (022) - 7303736<br>
				Website : <span class="underline">www.smkn4bdg.sch.id</span> - 
				Email : <span class="underline">info@smkn4bdg.sch.id</span> <br> 
				Bandung - 40264 <br> 
			</span> 
		</div>
		<div>
			<!-- /header -->

			<hr class="border">

			<!-- content -->
			<h3 class="text-center mb-1">Tanda Terima Pembayaran Tagihan Sekolah</h3>
			<br><br>
		</div>
	</div>	
	<ul class="list-group list-group-flush">
		<li class="text-desc mb-1">Tanggal Bayar : {{ $model['0']['created_at'] }}</li>
		<li class="text-desc mb-1">Kode Bayar : {{ $model['0']['kd_bayar'] }}</li>
		<li class="text-desc mb-1">Siswa : {{ $model['0']['nis'] }} / {{ $model['0']['nama'] }}</li>
		<li class="text-desc mb-1">Jenis Pembayaran : 
		{{ $model['0']['jenis_tagihan'] }} {{ $model['0']['bulan'] }} {{ $model['0']['tahun'] }} / Rp. {{ number_format($model['0']['nominal']) }}</li>
		<li class="text-desc mb-1">Bayar : Rp. {{ number_format($model['0']['bayar']) }}</li>
		<li class="text-desc mb-1">Status : 
			@if ($model['0']['nominal']-$model['0']['bayar'] == 0)
			<b class="text-green">Lunas</b>
			@else
			<b class="text-red">Belum Lunas</b>
			@endif
		</li>
	</ul>	
</body>
</html>