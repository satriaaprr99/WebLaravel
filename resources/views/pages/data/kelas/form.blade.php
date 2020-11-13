<form action="{{ route('kelas.store') }}" method="POST">

	@csrf

	<div class="form-group">
		<label for="nama_kelas" class="col-md-12 form-control-label pt-0">Nama Kelas</label>
		<div class="col-md-12 spanerror">
			<input name="nama_kelas" type="text" class="form-control form-control-sm" id="nama_kelas" value="">
		</div>
	</div>

	<div class="form-group">
		<label for="kompetensi_keahlian" class="col-md-12 form-control-label pt-0">Kompetensi Keahlian</label>
		<div class="col-md-12 spanerror">
			<input name="kompetensi_keahlian" type="text" class="form-control form-control-sm" id="kompetensi_keahlian" value="">
		</div>
	</div>

</form>