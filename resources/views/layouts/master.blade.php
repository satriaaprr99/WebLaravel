<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>WebLaravel</title>

	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Favicon -->
	<link rel="icon" href="assets/img/brand/smkn4.png" type="image/png">
	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
	<!-- Icons -->
	<link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
	<link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
	<!-- Page plugins -->
	<link rel="stylesheet" href="assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
	<link rel="stylesheet" href="assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
	<!-- Argon CSS -->
	<link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">

	@stack('styles')

</head>

<body>
	<!-- Sidenav -->
	@include('layouts.sidebar')
	<!-- Main content -->
	<div class="main-content" id="panel">
		<!-- Topnav -->

		<!-- Navbar links -->
		@include('layouts.navbar')
		
		<!-- Header -->
		@yield('content')

		<!-- Footer -->
	</div>
	
	@include('layouts._modals')
	
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="assets/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- Optional JS -->
<script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Argon JS -->
<script src="assets/js/argon.js?v=1.2.0"></script>
<script src="assets/js/script.js"></script>

<script>
	@if(Session::has('sukses'))
	swal({
		type: 'success',
		title: 'Success!',
		text: '{{ Session::get('sukses') }}'
	});
	@endif
	@if(Session::has('errorr'))
	swal({
		type: 'error',
		title: 'Oops...',
		text: '{{ Session::get('errorr') }}'
	});
	@endif
</script>

@stack('scripts')

@yield('footer')

</body>
</html>
