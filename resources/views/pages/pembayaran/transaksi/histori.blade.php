@extends('layouts.master')

@section('content')
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-12 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">
						<i class="ni ni-money-coins text-green"></i> Histori Transaksi Pembayaran SPP
					</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-home"></i></a></li>
							<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page">Histori</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid mt--6">
	<div class="row">
		<div class="col">
			@foreach($model as $value)
			<div class="card">
				<div class="col-sm-12">
					<div class="card-body">
						<span class="badge badge-success badge-rounded float-right">
							<i class="ni ni-check-bold"></i>
							{{ \Carbon\Carbon::parse($value['updated_at'])->diffForHumans() }}
						</span>
						<h3>
							{{ $value['nama'] .' - '. $value['nama_kelas'] }}
						</h3>
						<h5>Kode Pembayaran <b class="text-capitalize">{{ $value['kd_bayar'] }}</b></h5>
						<h5>Bayar Tagihan <b class="text-capitalize">
							{{ $value['jenis_tagihan'] .' - '. $value['bulan'] .' '. $value['tahun']}}
						</b></h5>
						<h5>Nominal Pembayaran Rp.{{ number_format($spp = $value['nominal']) }}</h5>
						<h5>Bayar Rp. {{ number_format($bayar = $value['bayar']) }}</h5>
						<h5>Tunggakan Rp. {{ number_format($spp - $bayar) }}</h5>
						<h5>
							<i class="ni ni-calendar-grid-58"></i> {{ $value['updated_at'] }}
						</h5>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection
