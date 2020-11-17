<form action="{{ route('kelas.update', $model['data']['id']) }}" method="PUT">

	@csrf
	{{ method_field('PUT') }}
	
	<div class="form-group">
		<label for="nama_kelas" class="col-md-12 form-control-label pt-0">Nama Kelas</label>
		<div class="col-md-12 spanerror">
			<input name="nama_kelas" type="text" class="form-control form-control-sm" id="nama_kelas" value="{{ $model['data']['nama_kelas'] }}">
		</div>
	</div>

	<div class="form-group">
		<label for="kompetensi_keahlian" class="col-md-12 form-control-label pt-0">Kompetensi Keahlian</label>
		<div class="col-md-12 spanerror">
			<input name="kompetensi_keahlian" type="text" class="form-control form-control-sm" id="kompetensi_keahlian" value="{{ $model['data']['kompetensi_keahlian'] }}">
		</div>
	</div>

</form>