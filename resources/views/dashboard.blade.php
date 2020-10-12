@extends('layout_master.master')

@section('content')
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#">Dashboards</a></li>
							<li class="breadcrumb-item active" aria-current="page"></li>
						</ol>
					</nav>
				</div>
			</div>
			<!-- Card stats -->
			<div class="row">
				<div class="col-xl-4 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase text-muted mb-0">Total Siswa</h5>
									<span class="h2 font-weight-bold mb-0">{{ $siswa->count() }}</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
										<i class="fa fa-users"></i>
									</div>
								</div>
							</div>
							<p class="mt-3 mb-0 text-sm">
								<span class="text-nowrap">Since last month</span>
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase text-muted mb-0">Total Kelas</h5>
									<span class="h2 font-weight-bold mb-0">{{ $kelas->count() }}</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
										<i class="fa fa-users"></i>
									</div>
								</div>
							</div>
							<p class="mt-3 mb-0 text-sm">
								<span class="text-nowrap">Since last month</span>
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase text-muted mb-0">Total Data SPP</h5>
									<span class="h2 font-weight-bold mb-0">{{ $ctagihan->count() }}</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-purple text-white rounded-circle shadow">
										<i class="fa fa-search-dollar"></i>
									</div>
								</div>
							</div>
							<p class="mt-3 mb-0 text-sm">
								<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 2017 - 2021</span>
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase text-muted mb-0">Total Uang Tagihan</h5>
									<span class="h2 font-weight-bold mb-0">Rp. {{ number_format($tagihan) }}</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
										<i class="ni ni-chart-pie-35"></i>
									</div>
								</div>
							</div>
							<p class="mt-3 mb-0 text-sm">
								<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 2017 - 2021</span>
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase text-muted mb-0">Pemasukan</h5>
									<span class="h2 font-weight-bold mb-0">Rp. {{ number_format($bayar) }}</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
										<i class="ni ni-money-coins"></i>
									</div>
								</div>
							</div>
							<p class="mt-3 mb-0 text-sm">
								<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
								<span class="text-nowrap">Since last month</span>
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase text-muted mb-0">Pengeluaran</h5>
									<span class="h2 font-weight-bold mb-0">Rp. 0</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-pink text-white rounded-circle shadow">
										<i class="fa fa-money-check"></i>
									</div>
								</div>
							</div>
							<p class="mt-3 mb-0 text-sm">
								<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
								<span class="text-nowrap">Since last month</span>
							</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
	<div class="row">
		<div class="col-xl-6">
			<div class="card">
				<div class="card-header border-0">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="mb-0">Pemasukan Terbaru</h3>
						</div>
						<div class="col text-right">
							<a href="/transaksi" class="btn btn-sm btn-primary">See all</a>
						</div>
					</div>
				</div>
				<div class="table-responsive">
					<!-- Projects table -->
					<table class="table align-items-center table-flush">
						<thead class="thead-light">
							<tr>
								<th scope="col">Siswa</th>
								<th scope="col">Kelas</th>
								<th scope="col">Bayar Tagihan</th>
							</tr>
						</thead>
						<tbody>
							@foreach($pembayaran as $value)
							<tr>
								<th scope="row">
									<a href="/profile{{ $value->siswa->id }}">
										{{ $value->siswa->nama }}
									</a>
								</th>
								<td>{{ $value->siswa->kelas->nama_kelas }}</td>
								<td>
									<i class="fas fa-arrow-up text-success mr-3"></i>
									Rp. {{ number_format($value->bayar) }}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-xl-6">
			<div class="card">
				<div class="card-header border-0">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="mb-0">Pengeluaran</h3>
						</div>
						<div class="col text-right">
							<a href="/transaksi" class="btn btn-sm btn-primary">See all</a>
						</div>
					</div>
				</div>
				<div class="table-responsive">
					<!-- Projects table -->
					<table class="table align-items-center table-flush">
						<thead class="thead-light">
							<tr>
								<th scope="col">Beli</th>
								<th scope="col">Tanggal</th>
								<th scope="col">Uang Keluar</th>
							</tr>
						</thead>
						<tbody>
							<tr class="text-center">
								<th colspan="3">Tidak Ada Pengeluaran!</th>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>	
@endsection
