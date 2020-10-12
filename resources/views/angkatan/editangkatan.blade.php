@extends('layout_master.master')

@section('content')
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Tables</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#">Tables</a></li>
							<li class="breadcrumb-item active" aria-current="page">Tables</li>
						</ol>
					</nav>
				</div>
				<div class="col-lg-6 col-5 text-right">
					<a href="#" class="btn btn-sm btn-neutral">New</a>
					<a href="#" class="btn btn-sm btn-neutral">Filters</a>
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
				<div class="card-header border-4">
					<h3 class="mb-0">Light table</h3>
				</div><br><br>
				<!-- Light table -->
				<div class="col-sm-12">
					<form method="POST" action="/editangkatan{{$angkatan->id}}" autocomplete="off">
						@csrf
						<div class="form-group row">
							<label for="inputnis" class="col-sm-4 form-control-label pt-0">Nama angkatan</label>
							<div class="col-sm-12">
								<input name="nama_angkatan" type="text" class="form-control form-control-sm" id="inputnis" value="{{ $angkatan->nama_angkatan }}">
							</div>
						</div>

						<div class="form-group row">
							<label for="inputnama" class="col-sm-4 form-control-label pt-0">Tahun Ajaran</label>
							<div class="col-sm-12">
								<input name="kompetensi_keahlian" type="text" class="form-control form-control-sm" id="inputnama" value="{{ $angkatan->tahun }}">
							</div>
						</div>
						<div class="modal-footer">
							<a href="/angkatan" class="btn btn-sm btn-primary"><i class="ni ni-bold-left"></i> Kembali</a>
							<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-plus-square"></i> Edit Data</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
