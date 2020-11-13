@if($model['0']['avatar'] == true)
<img src="http://localhost:8000/uploads/{{$model['0']['avatar']}}" class="ml-3 mb-3" width="100" height="100">
@else
<img src="http://localhost:8000/uploads/default.png" class="ml-3 mb-3" width="100" height="100">
@endif
<div class="row text-sm">
	<div class="col-md-4">
		<ul class="list-group list-group-flush">
			<li class="list-group-item">NIS / Nama Lengkap</li>
			<li class="list-group-item">Kelas</li>
			<li class="list-group-item">Angkatan</li>
			<li class="list-group-item">Nomor HP</li>
			<li class="list-group-item">Alamat Rumah</li>
		</ul>
	</div>
	<div class="col-md-8">
		<ul class="list-group list-group-flush">
			<li class="list-group-item">: {{ $model['0']['nis'] }} - {{ $model['0']['nama'] }}</li>
			<li class="list-group-item">: {{ $model['0']['nama_kelas'] }} - {{ $model['0']['kompetensi_keahlian'] }} </li>
			<li class="list-group-item">: {{ $model['0']['nama_angkatan'] }} - {{ $model['0']['tahun'] }}</li>
			<li class="list-group-item">: {{ $model['0']['nohp'] }}</li>
			<li class="list-group-item">: {{ $model['0']['alamat'] }}</li>
		</ul>
	</div>
</div>