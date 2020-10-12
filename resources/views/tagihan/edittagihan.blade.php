@extends('layout_master.master')

@section('content')
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Edit Data Tagihan</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
							<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page">Edit Tagihan</li>
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
			<div class="card">
				<!-- Card header -->
				<div class="card-header border-4">
					<h3 class="mb-0">Edit Data Tagihan</h3>
				</div><br><br>
				<!-- Light table -->
				<div class="col-sm-12">
					<form method="POST" action="/edittagihan{{$tagihan->id}}" autocomplete="off">
						@csrf

						<div class="form-group row">
							<label for="inputnis" class="col-sm-4 form-control-label pt-0">Kode Tagihan</label>
							<div class="col-sm-12">
								<input name="kd_tagihan" type="text" class="form-control form-control-sm" id="inputnis" value="{{ $tagihan->kd_tagihan }}">
							</div>
						</div>

						<div class="form-group row">
							<label for="inputnis" class="col-sm-4 form-control-label pt-0">Jenis Tagihan</label>
							<div class="col-sm-12">
								<input name="jenis_tagihan" type="text" class="form-control form-control-sm" id="inputnis" value="{{ $tagihan->jenis_tagihan }}">
							</div>
						</div>

						<div class="form-group row">
							<label for="inputnis" class="col-sm-4 form-control-label pt-0">Tahun</label>
							<div class="col-sm-12">
								<input name="tahun" type="text" class="form-control form-control-sm" id="inputnis" value="{{ $tagihan->tahun }}">
							</div>
						</div>

						<div class="form-group row">
							<label for="inputnama" class="col-sm-4 form-control-label pt-0">Nominal</label>
							<div class="col-sm-12">
								<input name="nominal" type="text" class="form-control form-control-sm" id="inputnama" value="{{ $tagihan->nominal }}">
							</div>
						</div>
						<div class="modal-footer">
							<a href="/tagihan" class="btn btn-sm btn-primary"><i class="ni ni-bold-left"></i> Kembali</a>
							<button type="submit" class="btn btn-sm btn-success"><i class="ni ni-settings"></i> Edit Data</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection