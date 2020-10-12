@extends('layout_master.master')

@section('content')
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-8 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Table Data Angkatan</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
							<li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page">Table Data Angkatan</li>
						</ol>
					</nav>
				</div>
				<div class="col-sm-4">
					<ul class="nav nav-pills mb-3 float-right" id="pills-tab" role="tablist">
						<li class="nav-item" role="presentation">
							<a class="btn-sm nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-home" aria-selected="true">Daftar Angkatan</a>
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

<div class="container-fluid mt--6">
	<div class="row">
		<div class="col">
			<div class="card">
				<!-- Card header -->
				<div class="card-header border-0">
					<div class="row">
						<div class="col-sm-6 text-left">
							<h3 class="mb-0">Table Data Angkatan</h3>
						</div>
					</div>
					<hr>
					<div class="tab-content" id="pills-tabContent">

						<div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-home-tab">
							<div class="table-responsive">
								<table class="table align-items-center table-flush">
									<thead class="thead-light">
										<th>No</th>
										<th>Nama Angkatan</th>
										<th>Tahun Ajaran</th>
										<th>Dibuat</th>
										<th></th>
									</thead>
									<tbody class="list">
										<?php $no = 1; ?>
										@foreach($angkatan as $value)
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $value->nama_angkatan }}</td>
											<td>{{ $value->tahun }}</td>
											<td>{{ $value->created_at->format('d/m/Y') }}</td>
											<td class="text-right">
												<div class="dropdown">
													<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<i class="fas fa-ellipsis-v"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
														<a class="dropdown-item" href="/editangkatan{{ $value->id }}">Edit</a>
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
							<form method="POST" action="/angkatan" autocomplete="off">
								@csrf
								<div class="form-group row">
									<label for="inputnis" class="col-sm-4 form-control-label pt-0">Nama Angkatan</label>
									<div class="col-sm-12">
										<input name="nama_angkatan" type="text" class="form-control form-control-sm" id="inputnis">
									</div>
								</div>

								<div class="form-group row">
									<label for="inputnama" class="col-sm-4 form-control-label pt-0">Tahun</label>
									<div class="col-sm-12">
										<input name="tahun" type="text" class="form-control form-control-sm" id="inputnama">
									</div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-plus-square"></i> Tambah Data</button>
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
