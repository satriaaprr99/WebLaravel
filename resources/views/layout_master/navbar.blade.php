<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
	<div class="container-fluid">
		<div class="collapse navbar-collapse" id="navbarSupportedContent">

			<div class="form-group mb-0">
				<img src="assets/img/brand/smkn4.png" class="navbar-brand-img" alt="..." style="width: 50px;">
			</div>
			<div class="form-group mb-0">
				<img src="assets/img/brand/smk.png" class="navbar-brand-img" alt="..." style="width: 50px;">
			</div>
			<ul class="navbar-nav align-items-center  ml-md-auto ">
				<li class="nav-item d-xl-none">
					<!-- Sidenav toggler -->
					<div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
						<div class="sidenav-toggler-inner">
							<i class="sidenav-toggler-line"></i>
							<i class="sidenav-toggler-line"></i>
							<i class="sidenav-toggler-line"></i>
						</div>
					</div>
				</li>
				<li class="nav-item d-sm-none">
					<a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
						<i class="ni ni-zoom-split-in"></i>
					</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="ni ni-ungroup"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
						<div class="row shortcuts px-4">
							<a href="/dashboard" class="col-4 shortcut-item">
								<span class="shortcut-media avatar rounded-circle bg-gradient-green">
									<i class="ni ni-tv-2"></i>
								</span>
								<small>Dashboard</small>
							</a>
							<a href="/siswa" class="col-4 shortcut-item">
								<span class="shortcut-media avatar rounded-circle bg-gradient-red">
									<i class="ni ni-paper-diploma"></i>
								</span>
								<small>Siswa</small>
							</a>
							<a href="/kelas" class="col-4 shortcut-item">
								<span class="shortcut-media avatar rounded-circle bg-gradient-orange">
									<i class="ni ni-folder-17"></i>
								</span>
								<small>Kelas</small>
							</a>
							<a href="/tagihan" class="col-4 shortcut-item">
								<span class="shortcut-media avatar rounded-circle bg-gradient-info">
									<i class="ni ni-credit-card"></i>
								</span>
								<small>Tagihan</small>
							</a>
							<a href="/transaksi" class="col-4 shortcut-item">
								<span class="shortcut-media avatar rounded-circle bg-gradient-purple">
									<i class="ni ni-money-coins"></i>
								</span>
								<small>Transaksi</small>
							</a>
							<a href="/history" class="col-4 shortcut-item">
								<span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
									<i class="ni ni-collection"></i>
								</span>
								<small>History</small>
							</a>
						</div>
					</div>
				</li>
			</ul>
			<ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
				<li class="nav-item dropdown">
					<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<div class="media align-items-center">
							<span class="avatar avatar-sm rounded-circle">
								<img alt="Image placeholder" src="uploads/default.png">
							</span>
							<div class="media-body  ml-2  d-none d-lg-block">
								<span class="mb-0 text-sm  font-weight-bold">{{$user->name}}</span>
							</div>
						</div>
					</a>
					<div class="dropdown-menu  dropdown-menu-right ">
						<!-- <div class="dropdown-header noti-title">
							<h6 class="text-overflow m-0">Welcome!</h6>
						</div>
						<a href="#!" class="dropdown-item">
							<i class="ni ni-single-02"></i>
							<span>My profile</span>
						</a>
						<a href="#!" class="dropdown-item">
							<i class="ni ni-settings-gear-65"></i>
							<span>Settings</span>
						</a>
						<a href="#!" class="dropdown-item">
							<i class="ni ni-calendar-grid-58"></i>
							<span>Activity</span>
						</a>
						<a href="#!" class="dropdown-item">
							<i class="ni ni-support-16"></i>
							<span>Support</span>
						</a> -->
						<div class="dropdown-divider"></div>
						<a href="/logout" class="dropdown-item">
							<i class="ni ni-user-run"></i>
							<span>Logout</span>
						</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>