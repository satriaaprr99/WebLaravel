@extends('layouts.master')

@section('content')

<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-10 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Corona Info</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#">Dashboards</a></li>
							<li class="breadcrumb-item active" aria-current="page">Corona Info</li>
						</ol>
					</nav>
				</div>
				<div class="col-lg-2 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">
						Last Update {{ $indo['penambahan']['tanggal'] }}
					</h6>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-xl-2 ml-md-5 mb-2">
					<h1 class="text-white d-inline-block mb-0">Global</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-4 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase mb-0">Confirmed</h5>
									<span class="h2 font-weight-bold mb-0">
										{{ number_format($global['Global']['TotalConfirmed']) }}
									</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
										<i class="fa fa-users"></i>
									</div>
								</div>
							</div>
							<p class="mt-1 mb-0 text-sm">
								<span class="text-success mr-2"><i class="fa fa-arrow-up"></i>
									{{ number_format($global['Global']['NewConfirmed']) }}
								</span>
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase mb-0">Recovered</h5>
									<span class="h2 font-weight-bold mb-0">
										{{ number_format($global['Global']['TotalRecovered']) }}
									</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-purple text-white rounded-circle shadow">
										<i class="fa fa-search-dollar"></i>
									</div>
								</div>
							</div>
							<p class="mt-1 mb-0 text-sm">
								<span class="text-success mr-2"><i class="fa fa-arrow-up"></i>
									{{ number_format($global['Global']['NewRecovered']) }}
								</span>
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase mb-0">Deaths</h5>
									<span class="h2 font-weight-bold mb-0">
										{{ number_format($global['Global']['TotalDeaths']) }}
									</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-purple text-white rounded-circle shadow">
										<i class="fa fa-search-dollar"></i>
									</div>
								</div>
							</div>
							<p class="mt-1 mb-0 text-sm">
								<span class="text-success mr-2"><i class="fa fa-arrow-up"></i>
									{{ number_format($global['Global']['NewDeaths']) }}
								</span>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-xl-2 mb-2">
					<h1 class="text-white d-inline-block mb-0">Indonesia</h1>
				</div>
			</div>
			<div class="row ">	
				<div class="col-xl-3 col-md-6 ">
					<div class="card card-stats">
						<!-- Card body -->
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase mb-0">Positif</h5>
									<span class="h2 font-weight-bold mb-0">
										{{ number_format($indo['total']['positif']) }}
									</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-yellow text-white rounded-circle shadow">
										<i class="fa fa-users"></i>
									</div>
								</div>
							</div>
							<p class="mt-1 mb-0 text-sm">
								<span class="text-success mr-2"><i class="fa fa-arrow-up"></i>
									{{ number_format($indo['penambahan']['positif']) }}
								</span>
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase mb-0">Sembuh</h5>
									<span class="h2 font-weight-bold mb-0">
										{{ number_format($indo['total']['sembuh']) }}
									</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
										<i class="ni ni-money-coins"></i>
									</div>
								</div>
							</div>
							<p class="mt-1 mb-0 text-sm">
								<span class="text-success mr-2"><i class="fa fa-arrow-up"></i>
									{{ number_format($indo['penambahan']['sembuh']) }}
								</span>
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase mb-0">Meninggal</h5>
									<span class="h2 font-weight-bold mb-0">
										{{ number_format($indo['total']['meninggal']) }}
									</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-pink text-white rounded-circle shadow">
										<i class="fa fa-money-check"></i>
									</div>
								</div>
							</div>
							<p class="mt-1 mb-0 text-sm">
								<span class="text-success mr-2"><i class="fa fa-arrow-up"></i>
									{{ number_format($indo['penambahan']['meninggal']) }}
								</span>
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase mb-0">Dirawat</h5>
									<span class="h2 font-weight-bold mb-0">
										{{ number_format($indo['total']['dirawat']) }}
									</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-pink text-white rounded-circle shadow">
										<i class="fa fa-money-check"></i>
									</div>
								</div>
							</div>
							<p class="mt-1 mb-0 text-sm">
								<span class="text-success mr-2"><i class="fa fa-arrow-up"></i>
									{{ number_format($indo['penambahan']['dirawat']) }}
								</span>
							</p>
						</div>
					</div>
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
					<!-- Light table -->

					<div class="tab-content" id="pills-tabContent">

						<div class="row">
							<div class="col-sm-6 text-left">
								<h2 class="mb-0">Table Data Covid19</h2>
							</div>
							<div class="col-sm-6 text-right">
								<ul class="nav nav-pills mb-3 float-right" id="pills-tab" role="tablist">
									<li class="nav-item" role="presentation">
										<a class="btn-sm btn btn-default active" id="pills-home-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-home" aria-selected="true">Global</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="btn btn-sm btn-default" id="pills-profile-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-profile" aria-selected="false">Indonesia</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-home-tab">
							<hr>
							<div class="table-responsive">
								<table class="table align-items-center table-flush" id="datatable-basic">
									<thead class="thead-light">
										<tr>
											<th>No</th>
											<th>Country</th>
											<th>Confirmed</th>
											<th>Deaths</th>
											<th>Recovered</th>
										</tr>
									</thead>
									<tbody class="list">
										<?php $no = 1; ?>
										@foreach($global['Countries'] as $data)
										<tr class="font-weight-bold">
											<td>{{ $no++ }}</td>
											<td>{{ $data['Country'] }}</td>
											<td class="text-success">{{ $data['TotalConfirmed'] }}</td>
											<td class="text-danger">{{ $data['TotalDeaths'] }}</td>
											<td class="text-blue">{{ $data['TotalRecovered'] }}</td>
										</tr>	
										@endforeach
									</tbody>
								</table>
							</div>
						</div>

						<div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-profile-tab">
							<hr>
							<div class="table-responsive">
								<table class="table align-items-center table-flush" id="datatable-basic2">
									<thead class="thead-light">
										<tr>
											<th>No</th>
											<th>Provinsi</th>
											<th>Positif</th>
											<th>Sembuh</th>
											<th>Meninggal</th>
										</tr>
									</thead>
									<tbody class="list">
										<?php $no = 1; ?>
										@foreach($indo2 as $data)
										<tr class="font-weight-bold">
											<td>{{ $no++ }}</td>
											<td>{{ $data['attributes']['Provinsi'] }}</td>
											<td class="text-success">{{ $data['attributes']['Kasus_Posi'] }}</td>
											<td class="text-danger">{{ $data['attributes']['Kasus_Semb'] }}</td>
											<td class="text-blue">{{ $data['attributes']['Kasus_Meni'] }}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
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
	$(document).ready(function(){
		$('#datatable-basic2').DataTable();
	});	
</script>
@endsection