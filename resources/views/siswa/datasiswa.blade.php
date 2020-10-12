@extends('layout_master.master')

@section('content')
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-8 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Data Siswa</h6>
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
						<li class="nav-item" role="presentation">
							<a class="btn-sm nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-home" aria-selected="true">Daftar Siswa</a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link btn-sm" id="pills-profile-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-profile" aria-selected="false">Tambah Data</a>
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
				<!-- Card header -->
				<div class="card-header border-0">
					<!-- Light table -->

					<div class="tab-content" id="pills-tabContent">

						<div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-home-tab">
							<div class="row">
								<div class="col-sm-6 text-left">
									<h2 class="mb-0">Table Data Siswa</h2>
								</div>
								<div class="col-sm-6 text-right">
									<a href="/siswa/exportexcel" class="btn btn-sm btn-default">
									<i class="ni ni-single-copy-04"></i> Export
									</a>
								</div>
							</div>
							<hr>
							<div class="table-responsive">
								<table class="table align-items-center table-flush" id="datatable-basic">
									<thead class="thead-light">
										<tr>
											<th>No</th>
											<th>Foto</th>
											<th>NIS</th>
											<th>Nama Lengkap</th>
											<th>Kelas</th>
											<th>Angkatan</th>
											<th></th>
										</tr>
									</thead>
									<tbody class="list">
										<?php $no = 1; ?>
										@foreach($siswa as $siswa)
										<tr>
											<td>{{ $no++ }}</td>
											<td>
												<a href="/profile{{ $siswa->id }}">
													<span class="avatar avatar-sm rounded-circle">
														<img alt="Image placeholder" style="width: 40px; height: 40px;" src="{{ $siswa->AvatarDefault() }}">
													</span>		
												</a>										
											</td>
											<td>{{ $siswa->nis }}</td>
											<td>{{ $siswa->nama }}</td>
											<td>{{ $siswa->kelas->nama_kelas }}</td>
											<td>{{ $siswa->angkatan->tahun }}</td>
											<td class="text-right">
												<div class="dropdown">
													<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<i class="fas fa-ellipsis-v"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
														<a class="dropdown-item" href="/profile{{ $siswa->id }}">Edit</a>
														<a class="dropdown-item deleteSiswa" href="#" siswa-id="{{$siswa->id}}" siswa-nama="{{$siswa->nama}}" >Delete</a>
													</div>
												</div>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>

						<div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-profile-tab">
							<form action="/siswa" method="POST" enctype="multipart/form-data" autocomplete="off">
								@csrf

								<div class="form-group row">
									<label for="inputfoto" class="col-sm-2 form-control-label pt-0">Foto Profile</label>
									<div class="col-sm-10">
										<input type="file" name="avatar" class="form-control form-control-sm @error('avatar') is-invalid @enderror" id="inputfoto" value="{{old('avatar')}}">
										<span class="text-danger text-sm">@error('avatar') {{ $message }} @enderror</span>
									</div>
								</div>

								<div class="form-group row">
									<label for="inputnis" class="col-sm-2 form-control-label pt-0">NIS</label>
									<div class="col-sm-10">
										<input name="nis" type="text" class="form-control form-control-sm @error('nis') is-invalid @enderror" id="inputnis" value="{{old('nis')}}">
										<span class="text-danger text-sm">@error('nis') {{ $message }} @enderror</span>
									</div>
								</div>

								<div class="form-group row">
									<label for="inputnama" class="col-sm-2 form-control-label pt-0">Nama</label>
									<div class="col-sm-10">
										<input name="nama" type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" id="inputnama" value="{{old('nama')}}">
										<span class="text-danger text-sm">@error('nama') {{ $message }} @enderror</span>
									</div>
								</div>

								<div class="form-group row">
									<label for="inputkelas" class="col-sm-2 form-control-label pt-0">Kelas</label>
									<div class="col-sm-10">
										<select name="kelas" id="inputkelas" class="form-control form-control-sm @error('kelas') is-invalid @enderror" {{ count($kelas) == 0 ? 'disabled' : '' }}>
											@if(count($kelas) == 0)											
											<option>Pilihan tidak ada</option>
											@else											
											<option value="">Silahkan Pilih</option>											
											@foreach($kelas as $value) 			
											<option value="{{ $value->id }}" {{ $siswa->id_kelas == $value->id ? 'selected' : '' }}>{{ $value->nama_kelas }}</option>
											@endforeach
											@endif	
										</select>
										<span class="text-danger text-sm">@error('kelas') {{ $message }} @enderror</span>
									</div>
								</div>

								<div class="form-group row">
									<label for="inputkelas" class="col-sm-2 form-control-label pt-0">Angkatan</label>
									<div class="col-sm-10">
										<select name="angkatan" id="inputkelas" class="form-control form-control-sm @error('angkatan') is-invalid @enderror" {{ count($angkatan) == 0 ? 'disabled' : '' }}>
											@if(count($angkatan) == 0)											
											<option>Pilihan tidak ada</option>
											@else											
											<option value="">Silahkan Pilih</option>											
											@foreach($angkatan as $value) 			
											<option value="{{ $value->id }}" {{ $siswa->id_angkatan == $value->id ? 'selected' : '' }}>{{ $value->tahun }}</option>
											@endforeach
											@endif	
										</select>
										<span class="text-danger text-sm">@error('angkatan') {{ $message }} @enderror</span>
									</div>
								</div>

								<div class="form-group row">
									<label for="inputnohp" class="col-sm-2 form-control-label pt-0">Nomor Handphone</label>
									<div class="col-sm-10">
										<input name="nohp" type="text" class="form-control form-control-sm @error('nohp') is-invalid @enderror" id="inputnohp" value="{{old('nohp')}}">
										<span class="text-danger text-sm">@error('nohp') {{ $message }} @enderror</span>
									</div>
								</div>

								<div class="form-group row">
									<label for="inputalamat" class="col-sm-2 form-control-label pt-0">Alamat Rumah</label>
									<div class="col-sm-10">
										<textarea name="alamat" class="form-control form-control-sm @error('alamat') is-invalid @enderror" id="inputalamat">{{old('alamat')}}</textarea>
										<span class="text-danger text-sm">@error('alamat') {{ $message }} @enderror</span>
									</div>
								</div>

								<div class="modal-footer">
									<button type="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Tambah Data</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('footer')
<script>
	$(document).ready(function(){
		$('#datatable-basic').DataTable();
	});	

	$('.deleteSiswa').click(function(){
		var siswa_id = $(this).attr('siswa-id');
		var siswa_nama = $(this).attr('siswa-nama');
		Swal.fire({
			title: 'Apakah Kamu Yakin?',
			text: "Ingin Menghapus data Siswa "+siswa_nama+" ini ??",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.isConfirmed) {
				window.location = "/hapus"+siswa_id+""
			}
		})
	});
</script>
@endsection