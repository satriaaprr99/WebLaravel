<form action="{{ route('angkatan.store') }}" method="POST">

	@csrf

	<div class="form-group row">
		<label for="nama_angkatan" class="col-sm-4 form-control-label pt-0">Nama angkatan</label>
		<div class="col-sm-12 spanerror">
			<input name="nama_angkatan" type="text" class="form-control form-control-sm" id="nama_angkatan" value="">
		</div>
	</div>

	<div class="form-group row">
		<label for="tahun" class="col-sm-4 form-control-label pt-0">Tahun Ajaran</label>
		<div class="col-sm-12 spanerror">
			<input name="tahun" type="text" class="form-control form-control-sm" id="tahun" value="">
		</div>
	</div>

</form>