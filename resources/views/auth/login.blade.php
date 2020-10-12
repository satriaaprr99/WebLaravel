<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
	<meta name="author" content="Creative Tim">
	<title>Login WebLaravel</title>
	<!-- Favicon -->
	<link rel="icon" href="../assets/img/brand/smkn4.png" type="image/png">
	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
	<!-- Icons -->
	<link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
	<link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
	<!-- Argon CSS -->
	<link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body class="bg-default">
	<!-- Navbar -->
	<nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
		<div class="container">
			<a class="navbar-brand" href="/dashboard">
				<h2 class="navbar-brand-img"><i>SMKN</i> <b class="h1 text-white">4</b> Bandung</h2>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a href="/dashboard" class="nav-link">
							<span class="nav-link-inner--text">Dashboard</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="/login" class="nav-link">
							<span class="nav-link-inner--text">Login</span>
						</a>
					</li>
				</ul>
				<hr class="d-lg-none" />
				<ul class="navbar-nav align-items-lg-center ml-lg-auto">
					<li class="nav-item">
						<a class="nav-link nav-link-icon" href="#" target="_blank" data-toggle="tooltip" data-original-title="SMK Negeri 4 Bandung">
							<img src="assets/img/brand/smkn4.png" class="navbar-brand-img" alt="..." style="width: 30px;">
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link nav-link-icon" href="#" target="_blank" data-toggle="tooltip" data-original-title="SMK Bisa">
							<img src="assets/img/brand/smk.png" class="navbar-brand-img" alt="..." style="width: 30px;">
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Main content -->
	<div class="main-content">
		<!-- Header -->
		<div class="header bg-gradient-primary py-5 py-lg-6 pt-lg-7">
			<div class="container">
				<div class="header-body text-center mb-7">
					<div class="row justify-content-center">
						<div class="col-xl-5 col-lg-6 col-md-8 px-5">
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Page content -->
		<div class="container mt--8 pb-5">
			<div class="row justify-content-center">
				<div class="col-lg-5 col-md-7">
					<div class="card bg-secondary border-0 mb-0">
						<div class="card-body px-lg-5 py-lg-5">
							<div class="text-center mb-4">
								<h2>Login Admin</h2>
							</div>
							<form action="{{ route('postlogin') }}" method="POST" autocomplete="off">
								@csrf

								<div class="form-group mb-3">
									<div class="input-group input-group-merge input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ni ni-circle-08"></i></span>
										</div>
										<input name="username" class="form-control" placeholder="Username" type="text">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group input-group-merge input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
										</div>
										<input name="password" class="form-control" placeholder="Password" type="password">
									</div>
								</div>
								<div class="text-center">
									<button type="submit" class="btn btn-primary btn-block my-4">Login</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Argon Scripts -->
	<!-- Core -->
	<script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
	<script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/vendor/js-cookie/js.cookie.js"></script>
	<script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
	<script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
	<!-- Argon JS -->
	<script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>