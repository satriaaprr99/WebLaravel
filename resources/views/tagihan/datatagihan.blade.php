@extends('layout_master.master')

@section('content')
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Table Data Tagihan</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
							<li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page">Table Data Tagihan</li>
						</ol>
					</nav>
				</div>
				<div class="col-sm-6">
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
					<div class="tab-content" id="pills-tabContent">

						<div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-home-tab">
							<div class="table-responsive">
								<table class="table align-items-center table-flush" id="datatable-basic">
									<thead class="thead-light">
										<th>No</th>
										<th>Kode Tagihan</th>
										<th>Jenis Tagihan</th>
										<th>Bulan</th>
										<th>Tahun</th>
										<th>Nominal</th>
										<th>Dibuat</th>
										<th></th>
									</thead>
									<tbody class="list">
										<?php $no = 1; ?>
										@foreach($tagihan as $value)
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $value->kd_tagihan }}</td>
											<td>{{ $value->jenis_tagihan }}</td>
											<td>{{ $value->bulan }}</td>
											<td>{{ $value->tahun }}</td>
											<td>Rp. {{ number_format($value->nominal) }}</td>
											<td>{{ $value->created_at->format('d/m/Y') }}</td>
											<td class="text-right">
												<div class="dropdown">
													<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<i class="fa fa-ellipsis-v"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
														<a class="dropdown-item" href="/edittagihan{{ $value->id }}">Edit</a>
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
							<form method="POST" action="/tagihan" autocomplete="off">
								@csrf

								<div class="form-group row">
									<label for="inputnis" class="col-sm-4 form-control-label pt-0">Kode Tagihan</label>
									<div class="col-sm-12">
										<input name="kd_tagihan" type="text" class="form-control form-control-sm" id="inputnis">
									</div>
								</div>

								<div class="form-group row">
									<label for="inputnis" class="col-sm-4 form-control-label pt-0">Jenis Tagihan</label>
									<div class="col-sm-12">
										<select name="jenis_tagihan" id="inputjenis_tagihan" class="form-control form-control-sm">
											<option value="">Silahkan Pilih</option>
											<option value="SPP_Bulanan">SPP_Bulanan</option>
											<option value="SPP_Tahunan">SPP_Tahunan</option>
											<option value="Seragam_Sekolah">Seragam_Sekolah</option>
											<option value="PKL">PKL</option>
											<option value="Bangunan">Bangunan</option>
										</select>
									</div>
								</div>

								<div hidden class="form-group row" id="sppbulan">
									<label for="inputspp_bulanan" class="col-sm-4 form-control-label pt-0">Bulan</label>
									<div class="col-sm-12">
										<select name="bulan" id="sppbulan" class="form-control form-control-sm">			
											<option value="">Silahkan Pilih</option>
											<option value="Januari">Januari</option>
											<option value="Februari">Februari</option>
											<option value="Maret">Maret</option>
											<option value="April">April</option>
											<option value="Mei">Mei</option>
											<option value="Juni">Juni</option>
											<option value="Juli">Juli</option>
											<option value="Agustus">Agustus</option>
											<option value="September">September</option>
											<option value="Oktober">Oktober</option>
											<option value="November">November</option>
											<option value="Desember">Desember</option>
										</select>
									</div>
								</div>

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

@section('footer')
<script>
	$(window).load(function(){
		$("#inputjenis_tagihan").change(function() {
			console.log($("#inputjenis_tagihan").val());
			if ($("#inputjenis_tagihan").val() == "SPP_Bulanan") {
				$('#sppbulan').prop('hidden', false);
			} else {
				$('#sppbulan').prop('hidden', true);
			}
		});
	});
	$(document).ready(function(){
		$('#datatable-basic').DataTable();
	});	
</script>
@endsection