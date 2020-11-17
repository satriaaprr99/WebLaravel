<form action="{{ route('siswa.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">

	@csrf

	<div class="row">

		<div hidden="" class="col-md-12">
			<div class="form-group">
				<label for="avatar" class="col-md-12 form-control-label pt-0">Avatar</label>
				<div class="col-md-12 spanerror">
					<input name="avatar" type="file" class="form-control form-control-sm" id="avatar" value="">
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label for="nis" class="col-md-12 form-control-label pt-0">NIS</label>
				<div class="col-md-12 spanerror">
					<input name="nis" type="text" class="form-control form-control-sm" id="nis" value="">
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label for="nama" class="col-md-12 form-control-label pt-0">Nama</label>
				<div class="col-md-12 spanerror">
					<input name="nama" type="text" class="form-control form-control-sm" id="nama" value="">
				</div>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="form-group">
				<label for="id_kelas" class="col-md-12 form-control-label pt-0">Kelas</label>
				<div class="col-md-12 spanerror">
					<select name="id_kelas" id="id_kelas" class="form-control form-control-sm">
						<option value="">Silahkan Pilih</option>											
						@foreach($model2 as $value) 			
						<option value="{{ $value['id'] }}">{{ $value['nama_kelas'] }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label for="id_angkatan" class="col-md-12 form-control-label pt-0">Angkatan</label>
				<div class="col-md-12 spanerror">
					<select name="id_angkatan" id="id_angkatan" class="form-control form-control-sm">
						<option value="">Silahkan Pilih</option>											
						@foreach($model3 as $value) 			
						<option value="{{ $value['id'] }}">{{ $value['nama_angkatan'] }} - {{ $value['tahun'] }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
	</div>
	
	<div class="form-group">
		<label for="nohp" class="col-md-12 form-control-label pt-0">Nomor Handphone</label>
		<div class="col-md-12 spanerror">
			<input name="nohp" type="text" class="form-control form-control-sm" id="nohp" value="">
		</div>
	</div>

	<div class="form-group">
		<label for="alamat" class="col-md-12 form-control-label pt-0">Alamat Rumah</label>
		<div class="col-md-12 spanerror">
			<textarea name="alamat" class="form-control form-control-sm" id="alamat"></textarea>
		</div>
	</div>
	
</form>
	