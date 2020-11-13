{!! Form::model($model, [
	'route' => ['tagihan.update', $model['id']],
	'method' => 'PUT'
	]) !!}

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="kd_tagihan" class="col-sm-6 form-control-label pt-0">Kode Tagihan</label>
				<div class="col-sm-12 spanerror">
					<input name="kd_tagihan" type="text" class="form-control form-control-sm" id="kd_tagihan" value="{{ $model['kd_tagihan'] }}">
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="jenis_tagihan" class="col-sm-4 form-control-label pt-0">Jenis Tagihan</label>
				<div class="col-sm-12 spanerror">
					<select name="jenis_tagihan" id="jenis_tagihan" class="form-control form-control-sm">
						<option value="">Silahkan Pilih</option>
						<option value="SPP_Bulanan" {{ $model['jenis_tagihan'] == 'SPP_Bulanan' ? 'selected' : '' }}>SPP_Bulanan</option>
						<option value="SPP_Tahunan" {{ $model['jenis_tagihan'] == 'SPP_Tahunan' ? 'selected' : '' }}>SPP_Tahunan</option>
						<option value="Seragam_Sekolah" {{ $model['jenis_tagihan'] == 'Seragam_Sekolah' ? 'selected' : '' }}>Seragam_Sekolah</option>
						<option value="PKL" {{ $model['jenis_tagihan'] == 'PKL' ? 'selected' : '' }}>PKL</option>
						<option value="Bangunan" {{ $model['jenis_tagihan'] == 'Bangunan' ? 'selected' : '' }}>Bangunan</option>
						<option value="Ujian Akhir Semester" {{ $model['jenis_tagihan'] == 'Ujian Akhir Semester' ? 'selected' : '' }}>Ujian Akhir Semester</option>
					</select>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group" id="sppbulan">
				<label for="bulan" class="col-sm-12 form-control-label pt-0">Bulan <i>*optional</i></label>
				<div class="col-sm-12 spanerror">
					<select name="bulan" id="sppbulan" class="form-control form-control-sm">			
						<option value="">Silahkan Pilih</option>
						<option value="Januari" {{ $model['bulan'] == 'Januari' ? 'selected' : '' }}>Januari</option>
						<option value="Februari" {{ $model['bulan'] == 'Februari' ? 'selected' : '' }}>Februari</option>
						<option value="Maret" {{ $model['bulan'] == 'Maret' ? 'selected' : '' }}>Maret</option>
						<option value="April" {{ $model['bulan'] == 'April' ? 'selected' : '' }}>April</option>
						<option value="Mei" {{ $model['bulan'] == 'Mei' ? 'selected' : '' }}>Mei</option>
						<option value="Juni" {{ $model['bulan'] == 'Juni' ? 'selected' : '' }}>Juni</option>
						<option value="Juli" {{ $model['bulan'] == 'Juli' ? 'selected' : '' }}>Juli</option>
						<option value="Agustus" {{ $model['bulan'] == 'Agustus' ? 'selected' : '' }}>Agustus</option>
						<option value="September" {{ $model['bulan'] == 'September' ? 'selected' : '' }}>September</option>
						<option value="Oktober" {{ $model['bulan'] == 'Oktober' ? 'selected' : '' }}>Oktober</option>
						<option value="November" {{ $model['bulan'] == 'November' ? 'selected' : '' }}>November</option>
						<option value="Desember" {{ $model['bulan'] == 'Desember' ? 'selected' : '' }}>Desember</option>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="tahun" class="col-sm-4 form-control-label pt-0">Tahun</label>
				<div class="col-sm-12 spanerror">
					<input name="tahun" type="text" class="form-control form-control-sm" id="tahun" value="{{ $model['tahun'] }}">
				</div>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label for="nominal" class="col-sm-4 form-control-label pt-0">Nominal</label>
		<div class="col-sm-12 spanerror">
			<input name="nominal" type="text" class="form-control form-control-sm" id="nominal" value="{{ $model['nominal'] }}">
		</div>
	</div>

	{!! Form::close() !!}

