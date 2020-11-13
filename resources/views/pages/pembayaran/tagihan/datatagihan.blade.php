@extends('layouts.master')

@section('content')
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-8 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">
						<i class="ni ni-money-coins text-red"></i> Data Tagihan
					</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
							<li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page">Table Data Tagihan</li>
						</ol>
					</nav>
				</div>
				<div class="col-sm-4 col-5 text-right">
					<a href="{{ route('tagihan.create') }}" class="btn btn-white modal-show" title="Create Data Tagihan">Tambah Data Tagihan</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid mt--6">
	<div class="row">
		<div class="col">
			<div class="card">
				<!-- Card header -->
				<div class="card-header border-0">
					<div class="table-responsive">
						<table class="table align-items-center table-flush" id="datatable">
							<thead class="thead-light">
								<th>No</th>
								<th>Kode Tagihan</th>
								<th>Jenis Tagihan</th>
								<th>Bulan</th>
								<th>Tahun</th>
								<th>Nominal</th>
								<th></th>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<script>
	$(window).load(function(){
		$("#jenis_tagihan").change(function() {
			console.log($("#jenis_tagihan").val());
			if ($("#jenis_tagihan").val() == "SPP_Bulanan") {
				$('#sppbulan').prop('hidden', false);
			} else {
				$('#sppbulan').prop('hidden', true);
			}
		});
	});
</script>
@push('scripts')
<script>
	$(document).ready(function(){
		$('#datatable').DataTable({
			responsive: true,
			processing: true,
			serverside: true,
			ajax: {
				url  : "{{ route('tagihan.table') }}",
				type : 'GET' 
			},
			columns: [
			{data:'DT_RowIndex', name:'id'},
			{data:'kd_tagihan', name:'kd_tagihan'},
			{data:'jenis_tagihan', name:'jenis_tagihan'},
			{data:'bulan', name:'bulan'},
			{data:'tahun', name:'tahun'},
			{data:'nominalFormat', name:'nominalFormat'},
			{data:'aksi', name:'aksi'}
			],
			order: [
			[0, 'asc']
			]
		})
	})
</script>
@endpush