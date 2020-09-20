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
<!-- Page content -->
<div class="container-fluid mt--6">
	<div class="row">
		<div class="col">
			<div class="card">
				<!-- Card header -->
				<div class="card-header border-0">
					<div class="row">
						<div class="col-sm-6 text-left">
							<h3 class="mb-0">Table Data Siswa</h3>
						</div>
						<div class="col-sm-6">
							<ul class="nav nav-pills mb-3 float-right" id="pills-tab" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="btn-sm nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-home" aria-selected="true">Daftar Siswa</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link btn-sm" id="pills-profile-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-profile" aria-selected="false">Tambah Data</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link btn-sm" id="pills-contact-tab" data-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-contact" aria-selected="false">Cari Data</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- Light table -->

					<div class="tab-content" id="pills-tabContent">

						<div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-home-tab">
							<div class="table-responsive">
								<table class="table align-items-center table-flush">
									<thead class="thead-light">
										<tr>
											<th>No</th>
											<th>Foto</th>
											<th>NIS</th>
											<th>Nama Lengkap</th>
											<th>Kelas</th>
											<th>Tahun Ajaran</th>
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
											<td>{{ $siswa->spp->tahun }}</td>
											<td class="text-right">
												<div class="dropdown">
													<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<i class="fas fa-ellipsis-v"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
														<a class="dropdown-item" href="/profile{{ $siswa->id }}">Edit</a>
														<a class="dropdown-item" href="/hapus{{ $siswa->id }}">Delete</a>
													</div>
												</div>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<!-- Card footer -->
							<div class="card-footer py-4">
								<nav aria-label="...">
									<ul class="pagination justify-content-end mb-0">
										<li class="page-item disabled">
											<a class="page-link" href="#" tabindex="-1">
												<i class="fas fa-angle-left"></i>
												<span class="sr-only">Previous</span>
											</a>
										</li>
										<li class="page-item active">
											<a class="page-link" href="#">1</a>
										</li>
										<li class="page-item">
											<a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
										</li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item">
											<a class="page-link" href="#">
												<i class="fas fa-angle-right"></i>
												<span class="sr-only">Next</span>
											</a>
										</li>
									</ul>
								</nav>
							</div>
						</div>

						<div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-profile-tab">
							<form action="/siswa" method="POST" autocomplete="off">
								@csrf

								<div class="form-group row">
									<label for="inputfoto" class="col-sm-2 form-control-label pt-0">Foto Profile</label>
									<div class="col-sm-10">
										<input type="file" name="avatar" class="form-control form-control-sm" id="inputfoto">
									</div>
								</div>

								<div class="form-group row">
									<label for="inputnis" class="col-sm-2 form-control-label pt-0">NIS</label>
									<div class="col-sm-10">
										<input name="nis" type="text" class="form-control form-control-sm" id="inputnis" required="">
									</div>
								</div>

								<div class="form-group row">
									<label for="inputnama" class="col-sm-2 form-control-label pt-0">Nama</label>
									<div class="col-sm-10">
										<input name="nama" type="text" class="form-control form-control-sm" id="inputnama" required="">
									</div>
								</div>

								<div class="form-group row">
									<label for="inputkelas" class="col-sm-2 form-control-label pt-0">Kelas</label>
									<div class="col-sm-10">
										<select name="kelas" id="inputkelas" class="form-control form-control-sm" {{ count($kelas) == 0 ? 'disabled' : '' }} required="">
											@if(count($kelas) == 0)											
											<option>Pilihan tidak ada</option>
											@else											
											<option value="">Silahkan Pilih</option>											
											@foreach($kelas as $value) 			
											<option value="{{ $value->id }}">{{ $value->nama_kelas }}</option>
											@endforeach
											@endif	
										</select>
									</div>
								</div>

								<div class="form-group row">
									<label for="inputnohp" class="col-sm-2 form-control-label pt-0">Nomor Handphone</label>
									<div class="col-sm-10">
										<input name="nohp" type="text" class="form-control form-control-sm" id="inputnohp" required="">
									</div>
								</div>

								<div class="form-group row">
									<label for="inputalamat" class="col-sm-2 form-control-label pt-0">Alamat Rumah</label>
									<div class="col-sm-10">
										<textarea name="alamat" class="form-control form-control-sm" id="inputalamat" required=""></textarea>
									</div>
								</div>

								<div class="form-group row">
									<label for="inputspp" class="col-sm-2 form-control-label pt-0">SPP</label>
									<div class="col-sm-10">
										<select name="spp" id="inputspp" class="form-control form-control-sm" {{ count($spp) == 0 ? 'disabled' : '' }} required="">
											@if(count($spp) == 0)											
											<option>Pilihan tidak ada</option>
											@else											
											<option value="">Silahkan Pilih</option>											
											@foreach($spp as $value) 			
											<option value="{{ $value->id }}">{{ 'Tahun '.$value->tahun.' - '.'Rp.' .number_format($value->nominal) }}</option>
											@endforeach
											@endif	
										</select>
									</div>
								</div>

								<div class="modal-footer">
									<button type="submit" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah Data</button>
								</form>
							</div>
						</div>

						<div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-contact-tab">

							<form method="GET" action="/datasiswa" autocomplete="off">
								<div class="form-group row">
									<label for="inputnis" class="col-sm-2 col-form-label pt-0">NIS</label>
									<div class="col-sm-10">
										<input name="nis" type="text" class="form-control" id="inputnis">
									</div>
								</div>

								<div class="form-group row">
									<label for="inputnama" class="col-sm-2 col-form-label pt-0">Nama</label>
									<div class="col-sm-10">
										<input name="nama" type="text" class="form-control" id="inputnama">
									</div>
								</div>
								<button class="btn btn-primary" type="submit">Search</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>		
</div>
</div>
@endsection
