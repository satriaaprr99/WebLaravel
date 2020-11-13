<form action="{{ route('siswa.update', $model['0']['id']) }}" method="PUT" enctype="multipart/form-data">

	@csrf
	{{ method_field('PUT') }}

	<div class="row">

		<div class="col-md-6">
			<div class="form-group">
				<label for="nis" class="col-md-12 form-control-label pt-0">NIS</label>
				<div class="col-md-12 spanerror">
					<input name="nis" type="text" class="form-control form-control-sm" id="nis" value="{{ $model['0']['nis'] }}">
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label for="nama" class="col-md-12 form-control-label pt-0">Nama</label>
				<div class="col-md-12 spanerror">
					<input name="nama" type="text" class="form-control form-control-sm" id="nama" value="{{ $model['0']['nama'] }}">
				</div>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="form-group">
				<label for="kelas" class="col-md-12 form-control-label pt-0">Kelas</label>
				<div class="col-md-12 spanerror">
					<select name="id_kelas" id="kelas" id="kelas" class="form-control form-control-sm">
						<option value="">Silahkan Pilih</option>											
						@foreach($model2 as $value) 			
						<option value="{{ $value['id'] }}" {{ $model['0']['id_kelas'] == $value['id'] ? 'selected' : '' }}>{{ $value['nama_kelas'] }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label for="angkatan" class="col-md-12 form-control-label pt-0">Angkatan</label>
				<div class="col-md-12 spanerror">
					<select name="id_angkatan" id="angkatan" class="form-control form-control-sm">
						<option value="">Silahkan Pilih</option>											
						@foreach($model3 as $value) 			
						<option value="{{ $value['id'] }}" {{ $model['0']['id_angkatan'] == $value['id'] ? 'selected' : '' }}>{{ $value['nama_angkatan'] }} - {{ $value['tahun'] }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
	</div>
	
	<div class="form-group">
		<label for="nohp" class="col-md-12 form-control-label pt-0">Nomor Handphone</label>
		<div class="col-md-12 spanerror">
			<input name="nohp" type="text" class="form-control form-control-sm" id="nohp" value="{{ $model['0']['nohp'] }}">
		</div>
	</div>

	<div class="form-group">
		<label for="alamat" class="col-md-12 form-control-label pt-0">Alamat Rumah</label>
		<div class="col-md-12 spanerror">
			<textarea name="alamat" class="form-control form-control-sm" id="alamat">{{ $model['0']['alamat'] }}</textarea>
		</div>
	</div>

</form>