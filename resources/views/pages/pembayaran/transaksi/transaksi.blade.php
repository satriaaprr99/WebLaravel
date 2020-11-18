@extends('layouts.master')

@section('content')
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-8 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">
						<i class="ni ni-money-coins text-yellow"></i> Data Transaksi
					</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
							<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page">Table Data Transaksi</li>
						</ol>
					</nav>
				</div>
				<div class="col-sm-4 col-5 text-right">
					<ul class="nav nav-pills mb-3 float-right" id="pills-tab" role="tablist">
						<li class="nav-item">
							<a href="#" class="btn btn-sm btn-white btn-table-show" title="Table Data Transaksi">Table Transaksi</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('transaksi.create') }}" class="btn btn-sm btn-white btn-form-show" title="Create Data Transaksi">Tambah Data</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid mt--6">
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header border-0">
					<div class="row">
						<div class="col-sm-6 text-left">
							<h2 class="mb-0 form-title">Table Data Transaksi</h2>
						</div>
						<div class="col-sm-6 text-right">
							<a href="{{ route('export.pdf') }}" class="btn btn-sm btn-default">
								<i class="ni ni-single-copy-04"></i> Export
							</a>
						</div>
					</div>
					<hr>
					<div class="form-data-show" id="form-data-show">
						<div class="form-show" id="form-show">
							
						</div>

						<div class="form-group float-right" id="form-footer">
							<button type="button" class="btn btn-sm btn-warning btn-table-show" title="Table Data Transaksi" id="btn-kembali">Kembali</button>
							<button type="button" class="btn btn-sm btn-primary mr-3" id="form-btn-save"></button>
						</div>
						
					</div>
					<div class="table-responsive table-data">
						<table class="table align-items-center table-flush" id="datatable">
							<thead class="thead-light">
								<th>No</th>
								<th>Kd_Bayar</th>
								<th>NIS</th>
								<th>Jenis Tagihan</th>
								<th>Tanggal</th>
								<th></th>
								<th>Cetak</th>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>	
	</div>	
</div>		
@endsection

@push('scripts')
<script>
	$(document).ready(function(){
		$('#datatable').DataTable({
			responsive: true,
			processing: true,
			serverside: true,
			ajax: {
				url  : "{{ route('transaksi.table') }}",
				type : 'GET' 
			},
			columns: [
			{data:'DT_RowIndex', name:'id'},
			{data:'kd_bayar', name:'kd_bayar'},
			{data:'nis', name:'nis'},
			{data:'jenis_tagihan', name:'jenis_tagihan'},
			{data:'tgl', name:'tgl'},
			{data:'aksi', name:'aksi'},
			{data:'cetak', name:'cetak'},
			],
			order: [
			[0, 'asc']
			]
		})
	})
</script>
@endpush