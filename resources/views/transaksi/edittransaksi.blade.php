@extends('layout_master.master')

@section('content')
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-12 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Edit Data Transaksi</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-home"></i></a></li>
							<li class="breadcrumb-item"><a href="/transaksi">Transaksi</a></li>
							<li class="breadcrumb-item"><a href="/histori">Histori</a></li>
							<li class="breadcrumb-item active" aria-current="page">Edit Transaksi</li>
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
					<h3 class="mb-0">Edit Data Transaksi</h3>
				</div><br><br>
				<!-- Light table -->
				<div class="col-sm-12">
					<form method="POST" action="/edittransaksi{{$pembayaran->id}}" autocomplete="off">
						@csrf

						<div class="form-group row">
							<label for="inputkd" class="col-sm-4 form-control-label pt-0">Kode Pembayaran</label>
							<div class="col-sm-12">
								<input name="nis" type="text" disabled class="form-control form-control-sm" id="inputkd" value="{{ $pembayaran->kd_bayar }}">
							</div>
						</div>

						<div class="form-group row">
							<label for="inputnamaa" class="col-sm-4 form-control-label pt-0">Nama Siswa</label>
							<div class="col-sm-12">
								<input name="nis" type="text" disabled class="form-control form-control-sm" id="inputnamaa" value="{{ $pembayaran->siswa->nama }}">
							</div>
						</div>

						<div class="form-group row">
							<label for="inputnis" class="col-sm-4 form-control-label pt-0">NIS Siswa</label>
							<div class="col-sm-12">
								<input name="nis" type="text" class="form-control form-control-sm" id="inputnis" value="{{ $pembayaran->siswa->nis }}">
							</div>
						</div>

						<div class="form-group row">
							<label for="inputjenis_tagihan" class="col-sm-4 form-control-label pt-0">Jenis Tagihan</label>
							<div class="col-sm-12">
								<select name="tagihan" id="inputjenis_tagihan" class="form-control form-control-sm" {{ count($tagihan) == 0 ? 'disabled' : '' }} required="">
									@if(count($tagihan) == 0)											
									<option>Pilihan tidak ada</option>
									@else											
									<option value="">Silahkan Pilih</option>											
									@foreach($tagihan as $value) 			
									<option value="{{ $value->id }}" {{ $pembayaran->tagihan_id == $value->id ? 'selected' : '' }}>
										{{ $value->jenis_tagihan }} - {{ $value->bulan }} {{ $value->tahun }}
									</option>
									@endforeach
									@endif	
								</select>
							</div>
						</div>

						<div class="form-group row">
							<label for="inputnama" class="col-sm-4 form-control-label pt-0">Jumlah Bayar</label>
							<div class="col-sm-12">
								<input name="bayar" type="text" class="form-control form-control-sm" id="inputnama" value="{{ $pembayaran->bayar }}">
							</div>
						</div>

						<div class="modal-footer">
							<a href="/profile{{$pembayaran->siswa->id}}" class="btn btn-sm btn-primary"><i class="ni ni-bold-left"></i> Profile</a>
							<a href="/transaksi" class="btn btn-sm btn-primary"><i class="ni ni-bold-left"></i> Transaksi</a>
							<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-plus-square"></i> Edit Data</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
