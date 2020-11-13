@extends('layouts.master')

@section('content')

<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Berita Terkini</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#">Dashboards</a></li>
							<li class="breadcrumb-item active" aria-current="page">Berita Terkini</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid mt--6">
	<div class="row">
		@foreach($berita['articles'] as $data)
		<div class="col-md-12">
			<div class="card mb-3">
				<div class="row no-gutters">
					<div class="col-md-4">
						<img src="{{ $data['urlToImage'] }}" class="card-img" width="300" height="250">
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h5 class="card-title">{{$data['title']}}</h5>
							<p class="card-text">{{ $data['description'] }}</p>
							<p class="card-text">
								<small class="text-muted">
									by <a href="#">{{ $data['source']['name'] }}</a> 
									{{ $data['publishedAt'] }}
								</small>
							</p>
							<a class="btn btn-link px-0" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
								Detail Article
							</a>
						</div>
					</div>
				</div>
				<div class="collapse" id="collapseExample">
					<p class="card-text mt-4 ml-auto">{{ $data['content'] }}</p>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>			

@endsection