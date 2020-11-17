{!! Form::model($model, [
	'route' => ['transaksi.update', $model['0']['id']],
	'method' => 'PUT'
	]) !!}

	<div class="form-group row">
		<label for="siswa_id" class="col-sm-4 form-control-label pt-0">NIS Siswa</label>
		<div class="col-sm-12 spanerror">
			<input name="siswa_id" type="text" class="form-control form-control-sm" id="siswa_id"
			value="{{ $model['0']['nis'] }}">
		</div>
	</div>

	<div class="form-group row">
		<label for="tagihan_id" class="col-sm-4 form-control-label pt-0">Jenis Tagihan</label>
		<div class="col-sm-12 spanerror">
			<select name="tagihan_id" id="tagihan_id" class="form-control form-control-sm">	
				<option value="">Silahkan Pilih</option>											
				@foreach($model2 as $value) 			
				<option value="{{ $value['id'] }}" {{ $model['0']['tagihan_id'] == $value['id'] ? 'selected' : '' }}>
					{{ $value['jenis_tagihan'] }} - {{ $value['bulan'] }} {{ $value['tahun'] }} - Rp. {{ number_format($value['nominal']) }}
				</option>
				@endforeach
			</select>
		</div>
	</div>

	<div class="row">

		<div class="col-md-6">
			<div class="form-group row">
				<label for="tgl_bayar" class="col-md-4 form-control-label pt-0">Tanggal Bayar</label>
				<div class="col-sm-12 spanerror">
					<input name="tgl_bayar" class="form-control form-control-sm datepicker" type="date" id="tgl_bayar" value="{{ $model['0']['tgl_bayar'] }}">
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group row">
				<label for="bayar" class="col-sm-4 form-control-label pt-0">Jumlah Bayar</label>
				<div class="col-sm-12 spanerror">
					<input name="bayar" type="text" class="form-control form-control-sm" id="bayar" value="{{ $model['0']['bayar'] }}">
				</div>
			</div>
		</div>

	</div>

	{!! Form::close() !!}