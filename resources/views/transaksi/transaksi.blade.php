@extends('layout_master.master')

@section('content')
<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-8 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Table Data Transaksi</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
							<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page">Table Data Transaksi</li>
						</ol>
					</nav>
				</div>
				<div class="col-sm-4">
					<ul class="nav nav-pills mb-3 float-right" id="pills-tab" role="tablist">
						<li class="nav-item" role="presentation">
							<a class="btn-sm nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-home" aria-selected="true">Daftar Transaksi</a>
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
				<div class="card-header border-0">
					<div class="row">
						<div class="col-sm-6 text-left">
							<h2 class="mb-0">Table Data Transaksi</h2>
						</div>
						<div class="col-sm-6 text-right">
							<a href="/transaksi/exportpdf" class="btn btn-sm btn-default">
								<i class="ni ni-single-copy-04"></i> Export
							</a>
						</div>
					</div>
					<hr>

					<div class="tab-content" id="pills-tabContent">

						<div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-home-tab">
							<div class="table-responsive">
								<table class="table align-items-center table-flush" id="datatable-basic">
									<thead class="thead-light">
										<th>No</th>
										<th>Kd_Bayar</th>
										<th>NIS</th>
										<th>Jenis Tagihan</th>
										<th>Jumlah Bayar</th>
										<th>Status</th>
										<th>Tanggal Bayar</th>
										<th></th>
									</thead>
									<tbody class="list">
										<?php $no = 1; ?>
										@foreach($pembayaran as $value)
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $value->kd_bayar }}</td>
											<td>{{ $value->siswa->nis }}</td>
											<td>{{ $value->tagihan->jenis_tagihan }}</td>
											<td>Rp. {{ number_format($value->bayar) }}</td>
											<td>
												@if($value->tagihan->nominal-$value->bayar == 0)
												<b class="text-green">Lunas</b>
												@else
												<b class="text-red">Belum Lunas</b>
												@endif
											</td>
											<td>{{ $value->created_at->format('d/m/Y') }}</td>
											<td class="text-right">
												<div class="dropdown">
													<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<i class="fas fa-ellipsis-v"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
														<a class="dropdown-item" href="/edittransaksi{{ $value->id }}">Edit</a>
														<a class="dropdown-item deletePembayaran" href="#" siswa-id="{{$value->id}}" siswa-nama="{{$value->siswa->nama}}" >Delete</a>
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
							<form method="POST" action="/transaksi" autocomplete="off">
								@csrf

								<div class="form-group row">
									<label for="inputnis" class="col-sm-4 form-control-label pt-0">NIS Siswa</label>
									<div class="col-sm-12">
										<input name="nis" type="text" class="form-control form-control-sm" id="inputnis">
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
											<option value="{{ $value->id }}">
												{{ $value->jenis_tagihan }} - {{ $value->bulan }} {{ $value->tahun }} - Rp. {{ number_format($value->nominal) }}
											</option>
											@endforeach
											@endif	
										</select>
									</div>
								</div>

								<div class="form-group row">
									<label for="inputnama" class="col-sm-4 form-control-label pt-0">Jumlah Bayar</label>
									<div class="col-sm-12">
										<input name="bayar" type="text" class="form-control form-control-sm" id="inputnama">
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
	$(document).ready(function(){
		$('#datatable-basic').DataTable();
	});	
	$('.deletePembayaran').click(function(){
		var siswa_id = $(this).attr('siswa-id');
		var siswa_nama = $(this).attr('siswa-nama');
		Swal.fire({
			title: 'Apakah Kamu Yakin?',
			text: "Ingin Menghapus data Pembayaran "+siswa_nama+" ini ??",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.isConfirmed) {
				window.location = "/transaksihapus"+siswa_id+""
			}
		})
	});
</script>
@endsection