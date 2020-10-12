<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>Laporan pembayaran SPP</title>

</head>
<body>

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
		.text-green{
			color: green;
			font-size: 9px;
		}
		.text-red{
			color: red;
			font-size: 9px;
		}
	</style>

	<!-- header -->
	<div class="text-center">
		<img src="{{ public_path('assets/img/brand/java.png') }}" class="img" alt="logo.png" width="90">
		<div style="margin-left:6rem;">
			<span class="text-header text-bold text-danger">
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
			<h3 class="text-center mb-1">Laporan Pembayaran SPP 2020/2021</h3>

			<table class="table-center mb-1">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode</th>
						<th>Siswa</th>
						<th>Kelas</th>
						<th>Jenis Tagihan</th>
						<th>Nominal</th>
						<th>Bayar</th>
						<th>Status</th>
						<th>Tanggal Bayar</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					@foreach($pembayaran as $value)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $value->kd_bayar }}</td>
						<td>{{ $value->siswa->nama }}</td>
						<td>{{ $value->siswa->kelas->nama_kelas }}</td>
						<td>{{ $value->tagihan->jenis_tagihan }} {{$value->tagihan->bulan}}</td>
						<td>Rp. {{ number_format($value->tagihan->nominal) }}</td>
						<td>Rp. {{ number_format($value->bayar) }}</td>
						<td>
							@if($value->tagihan->nominal-$value->bayar == 0)
							<b class="text-green">Lunas</b>
							@else
							<b class="text-red">Belum Lunas</b>
							@endif
						</td>
						<td>{{ $value->created_at->format('d M, Y') }}</td>

					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th colspan="6">Jumlah : </th>
						<th>Rp. {{ number_format($bayar) }}</th>
					</tr>
				</tfoot>
			</table>
			<!-- /content -->

			<!-- footer -->
			<!-- <div>Pembuat : {{ auth()->user()->name }}</div> -->
			<!-- /footer -->
		</body>
		</html>