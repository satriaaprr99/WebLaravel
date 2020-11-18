@extends('layouts.master')

@section('content')
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Profile</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#">Data Siswa</a></li>
							<li class="breadcrumb-item active" aria-current="page">profile Siswa</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid mt--6">
	<div class="row">
		<div class="col-xl-4">
			<div class="card card-profile">
				<img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
				<div class="row justify-content-center">
					<div class="col-lg-3 order-lg-2">
						<div class="card-profile-image">
							<a href="#">
								@if( $model['0']['avatar'] == true )
								<img src="http://localhost:8000/uploads/{{$model['0']['avatar']}}" style="width: 130px; height: 130px;" class="rounded-circle">
								@else
								<img src="http://localhost:8000/uploads/default.png" style="width: 130px; height: 130px;" class="rounded-circle">
								@endif
							</a>
						</div>
					</div>
				</div>
				<div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
					<div class="d-flex justify-content-between">
						<a href="#" class="btn btn-sm btn-default">Siswa</a>
						<a href="#" class="btn btn-sm btn-default float-right">{{$model['0']['nama_kelas']}}</a>
					</div>
				</div>
				<div class="card-body pt-0">
					<hr class="my-2" />
					<div class="text-center">
						<h5 class="h3">{{$model['0']['nama']}}</h5>
						<div class="h5 font-weight-300">
							<i class="ni location_pin mr-2"></i>{{$model['0']['nis']}}
						</div>
						<div class="h5 font-weight-300">
							<i class="ni location_pin mr-2"></i>{{$model['0']['alamat']}}
						</div>
						<div class="h5 mt-4">
							<i class="ni business_briefcase-24 mr-2"></i>- {{$model['0']['nohp']}} -
						</div>
						<div>
							<i class="ni education_hat mr-2"></i>SMK Negeri 4 Bandung
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-8">
			<div class="card">
				<div class="card-header">
					<div class="row align-items-center">
						<div class="col-8">
							<h3 class="mb-0">Edit profile Siswa</h3>
						</div>
					</div>
				</div>
				<div class="card-body">
					<form action="{{ route('siswa.update', $model['0']['id']) }}" method="post" enctype="multipart/form-data">

						@csrf
						{{ method_field('PUT') }}

						<div class="row">

							<div class="col-md-12">
								<div class="form-group">
									<label class="form-control-label" for="input-address">Nama Lengkap</label>
									<input name="nama" id="input-address" class="form-control" value="{{ $model['0']['nama'] }}" type="text">
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group">
									<label class="form-control-label" for="input-first-name">NIS</label>
									<input name="nis" type="text" id="input-first-name" class="form-control" value="{{ $model['0']['nis'] }}">
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group">
									<label class="form-control-label" for="input-last-name">Kelas</label>
									<select name="kelas" class="custom-select">
										<option value="">Silahkan Pilih</option>                      
										@foreach($model2 as $value)       
										<option value="{{ $value['id'] }}" {{ $model['0']['id_kelas'] == $value['id'] ? 'selected' : '' }}>{{ $value['nama_kelas'] }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="row">

							<div class="col-md-12">
								<div class="form-group">
									<label class="form-control-label" for="input-address">Nomor Handphone</label>
									<input name="nohp" id="input-address" class="form-control" value="{{ $model['0']['nohp'] }}" type="text">
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group">
									<label class="form-control-label" for="input-first-name">Foto Profile</label>
									<input name="avatar" type="file" id="input-first-name" class="form-control" value="{{ $model['0']['avatar'] }}">
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group">
									<label class="form-control-label" for="input-last-name">Angkatan</label>
									<select name="angkatan" class="custom-select">                    
										<option value="">Silahkan Pilih</option>                      
										@foreach($model3 as $value)       
										<option value="{{ $value['id'] }}" {{ $model['0']['id_angkatan'] == $value['id'] ? 'selected' : '' }}>{{ $value['nama_angkatan'] }} - {{ $value['tahun'] }}</option>
										@endforeach
									</select>
								</div>
							</div> 

							<div class="col-md-12">
								<div class="form-group">
									<label class="form-control-label" for="input-address">Alamat Rumah</label>
									<textarea name="alamat" id="input-address" class="form-control">{{ $model['0']['alamat'] }}</textarea>
								</div>
							</div>

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<div class="row align-items-center">
					<div class="col-6">
						<h3 class="mb-0 form-title">Pembayaran Tagihan</h3>
					</div>
					<div class="col-6 text-right">
						<ul class="nav nav-pills mb-3 float-right" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a href="#" class="btn btn-sm btn-default btn-table-show" title="Table Data Transaksi">Table Transaksi</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('transaksi.siswa', $model['0']['id']) }}" class="btn btn-sm btn-default btn-form-show" title="Create Data Transaksi">Tambah Data Transaksi</a>
							</li>
							<li class="nav-item">
								<a href="/transaksi" class="btn btn-sm btn-default">See All</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="form-data-show" id="form-data-show">
					<div class="form-show" id="form-show">

					</div>

					<div class="form-group float-right" id="form-footer">
						<button type="button" class="btn btn-sm btn-warning btn-table-show" title="Table Data Tagihan" id="btn-kembali">Kembali</button>
						<button type="button" class="btn btn-sm btn-primary mr-3" id="form-btn-save"></button>
					</div>

				</div>
				<div class="table-responsive table-data">
					<table class="table align-items-center table-flush" id="datatable">
						<thead class="thead-light">
							<th>No</th>
							<th>Kd_Bayar</th>
							<th>Jenis Tagihan</th>
							<th>Jumlah Bayar</th>
							<th>Status</th>
							<th>Tanggal Bayar</th>
							<th></th>
						</thead>
						<tbody class="list">

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
				url  : "{{ route('siswa.tableprofile', $model['0']['id']) }}",
				type : 'GET' 
			},
			columns: [
			{data:'DT_RowIndex', name:'id'},
			{data:'kd_bayar', name:'kd_bayar'},
			{data:'jenis_tagihan', name:'jenis_tagihan'},
			{data:'bayarFormat', name:'bayarFormat'},
			{data:'lunas', name:'lunas'},
			{data:'tgl_bayar', name:'tgl_bayar'},
			{data:'aksi', name:'aksi'},
			],
			order: [
			[0, 'asc']
			]
		})
	})
</script>
@endpush
