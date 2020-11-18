<form action="{{ route('tagihan.store') }}" method="POST" autocomplete="off">

	@csrf

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="kd_tagihan" class="col-sm-6 form-control-label pt-0">Kode Tagihan</label>
				<div class="col-sm-12 spanerror">
					<input name="kd_tagihan" type="text" class="form-control form-control-sm" id="kd_tagihan">
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="jenis_tagihan" class="col-sm-4 form-control-label pt-0">Jenis Tagihan</label>
				<div class="col-sm-12 spanerror">
					<select name="jenis_tagihan" id="jenis_tagihan" class="form-control form-control-sm">
						<option value="">Silahkan Pilih</option>
						<option value="SPP_Bulanan">SPP_Bulanan</option>
						<option value="SPP_Tahunan">SPP_Tahunan</option>
						<option value="Seragam_Sekolah">Seragam_Sekolah</option>
						<option value="PKL">PKL</option>
						<option value="Bangunan">Bangunan</option>
						<option value="Iuran Bulanan">Iuran Bulanan</option>
						<option value="Ujian Tengah Semester">Ujian Tengah Semester</option>
						<option value="Ujian Akhir Semester">Ujian Akhir Semester</option>
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
						<option value="Januari">Januari</option>
						<option value="Februari">Februari</option>
						<option value="Maret">Maret</option>
						<option value="April">April</option>
						<option value="Mei">Mei</option>
						<option value="Juni">Juni</option>
						<option value="Juli">Juli</option>
						<option value="Agustus">Agustus</option>
						<option value="September">September</option>
						<option value="Oktober">Oktober</option>
						<option value="November">November</option>
						<option value="Desember">Desember</option>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="tahun" class="col-sm-4 form-control-label pt-0">Tahun</label>
				<div class="col-sm-12 spanerror">
					<input name="tahun" type="text" class="form-control form-control-sm" id="tahun">
				</div>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label for="nominal" class="col-sm-4 form-control-label pt-0">Nominal</label>
		<div class="col-sm-12 spanerror">
			<input name="nominal" type="text" class="form-control form-control-sm" id="nominal">
		</div>
	</div>

</form>