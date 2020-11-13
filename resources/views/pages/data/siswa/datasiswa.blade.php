@extends('layouts.master')

@section('content')
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-8 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">
						<i class="ni ni-folder-17 text-red"></i> Data Siswa
					</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
							<li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page">Data Siswa</li>
						</ol>
					</nav>
				</div>
				<div class="col-lg-4 col-5 text-right">
					<ul class="nav nav-pills mb-3 float-right" id="pills-tab" role="tablist">
						<li class="nav-item">
							<a href="{{ route('siswa.create') }}" class="btn btn-white modal-show" title="Create Data Siswa">Tambah Data Siswa</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-header border-0">
					<div class="row">
						<div class="col-sm-6 text-left">
							<h2 class="mb-0">Table Data Siswa</h2>
						</div>
						<div class="col-sm-6 text-right">
							<a href="{{ route('export.excel') }}" class="btn btn-sm btn-default">
								<i class="ni ni-single-copy-04"></i> Export
							</a>
						</div>
					</div>
					<hr>
					<div class="table-responsive">
						<table class="table align-items-center table-flush" id="datatable">
							<thead class="thead-light">
								<tr>
									<th>No</th>
									<th>Avatar</th>
									<th>NIS</th>
									<th>Nama Lengkap</th>
									<th>Kelas</th>
									<th>Tahun Ajaran</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot class="thead-light">
								<tr>
									<th>No</th>
									<th>Avatar</th>
									<th>NIS</th>
									<th>Nama Lengkap</th>
									<th>Kelas</th>
									<th>Tahun Ajaran</th>
									<th></th>
								</tr>
							</tfoot>
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
				url  : "{{ route('siswa.table') }}",
				type : 'GET' 
			},
			columns: [
			{data:'DT_RowIndex', name:'id'},
			{data:'profile', name:'profile'},
			{data:'nis', name:'nis'},
			{data:'nama', name:'nama'},
			{data:'nama_kelas', name:'nama_kelas'},
			{data:'tahun', name:'tahun'},
			{data:'aksi', name:'aksi'},
			],
			order: [
			[0, 'asc']
			]
		})
	})
</script>
@endpush

