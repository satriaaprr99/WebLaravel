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
					<form method="POST" action="/spp" autocomplete="off">
						@csrf
						<div class="form-group row">
							<label for="inputnis" class="col-sm-4 form-control-label pt-0">Tahun</label>
							<div class="col-sm-12">
								<input name="tahun" type="text" class="form-control form-control-sm" id="inputnis">
							</div>
						</div>

						<div class="form-group row">
							<label for="inputnama" class="col-sm-4 form-control-label pt-0">Nominal</label>
							<div class="col-sm-12">
								<input name="nominal" type="text" class="form-control form-control-sm" id="inputnama">
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-plus-square"></i> Tambah Data</button>
						</form>
					</div>
				</div>
			</div>

			<div class="card">
				<!-- Card header -->
				<div class="card-header border-4">
					<h3 class="mb-0">Table Data SPP</h3>
				</div><br><br>
				<!-- Light table -->
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table align-items-center table-flush">
							<thead class="thead-light">
								<th>No</th>
								<th>Tahun Ajaran</th>
								<th>Nominal</th>
								<th>Dibuat</th>
								<th></th>
							</thead>
							<tbody class="list">
								<?php $no = 1; ?>
								@foreach($spp as $value)
								<tr>
									<td>{{ $no++ }}</td>
									<td>{{ $value->tahun }}</td>
									<td>Rp. {{ number_format($value->nominal) }}</td>
									<td>{{ $value->created_at }}</td>
									<td class="text-right">
										<div class="dropdown">
											<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="fas fa-ellipsis-v"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
												<a class="dropdown-item" href="/spp{{ $value->id }}">Edit</a>
											</div>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	@endsection
