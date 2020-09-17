@extends('layout_master.master')

@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
              	<div class="row">
              		<div class="col-sm-6 text-left">
              			<h2 class="card-title">Edit Data Siswa</h2>
              		</div>
              		<div class="col-sm-6">
              	</div>
              </div>
              <div class="card-body">
					  	<form action="/datasiswa/{{$Siswa->id}}/edit" method="post" enctype="multipart/form-data">
					  			@csrf

					  			<div class="form-group row">
								    <label for="inputnis" class="col-sm-2 col-form-label pt-0">NIS</label>
								    <div class="col-sm-10">
								      <input name="nis" type="text" class="form-control" id="inputnis" value="{{ old('Siswa', @$Siswa->nis) }}" required="">
								    </div>
							  	</div>

					  			<div class="form-group row">
								    <label for="inputnama" class="col-sm-2 col-form-label pt-0">Nama</label>
								    <div class="col-sm-10">
								      <input name="nama" type="text" class="form-control" id="inputnama" value="{{ old('Siswa', @$Siswa->nama) }}" required="">
								    </div>
							  	</div>

							  	<fieldset class="form-group">
								    <div class="row">
								      <label class="col-form-label col-sm-2 pt-0">Jenis Kelamin</label>
								      <div class="col-sm-10">
								        <div class="form-check">
								          <input name="jk" class="form-check-input" type="radio" id="gridRadios1" 
								          value="Laki - Laki" {{ old('Siswa', @$Siswa->jk) == 'Laki - Laki' ? 'checked' : '' }} required="">
								          <label class="form-check-label" for="gridRadios1">
								            Laki - Laki
								          </label>
								        </div>
								        <div class="form-check">
								          <input name="jk" class="form-check-input" type="radio" id="gridRadios2" 
								          value="Perempuan" {{ old('Siswa', @$Siswa->jk) == 'Perempuan' ? 'checked' : '' }} required="">
								          <label class="form-check-label" for="gridRadios2">
								            Perempuan
								          </label>
								        </div>
								      </div>
								    </div>
							  	</fieldset>		

							  	<div class="form-group row">
								    <label for="inputkelas" class="col-sm-2 col-form-label pt-0">Kelas</label>
								    <div class="col-sm-10">
								      	<select name="kelas" id="inputkelas" class="form-control" required="">
								        	<option class="form-control" value="" selected>Choose...</option>
								        	<option class="form-control" value="XII RPL 1" {{ old('Siswa', @$Siswa->kelas) == 'XII RPL 1' ? 'selected' : '' }}>XII RPL 1</option>
								        	<option class="form-control" value="XII RPL 2" {{ old('Siswa', @$Siswa->kelas) == 'XII RPL 2' ? 'selected' : '' }}>XII RPL 2</option>
								        	<option class="form-control" value="XII RPL 3" {{ old('Siswa', @$Siswa->kelas) == 'XII RPL 3' ? 'selected' : '' }}>XII RPL 3</option>
							      		</select>
								    </div>
							  	</div>

							  	<div class="form-group row">
								    <label for="inputnohp" class="col-sm-2 col-form-label pt-0">Nomor Handphone</label>
								    <div class="col-sm-10">
								      <input name="nohp" type="text" class="form-control" id="inputnohp" value="{{ old('Siswa', @$Siswa->nohp) }}" required="">
								    </div>
							  	</div>

							  	<div class="form-group row">
								    <label for="inputalamat" class="col-sm-2 col-form-label pt-0">Alamat Rumah</label>
								    <div class="col-sm-10">
								      <textarea name="alamat" class="form-control" id="inputalamat" required="">{{ old('Siswa', @$Siswa->alamat) }}</textarea>
								    </div>
							  	</div>

						      <div class="modal-footer">
						        <button type="submit" class="btn btn-primary"><i class="tim-icons icon-settings"></i> Update Data</button>
							   </form>
						      </div>
					  </div>
              	</div>
            </div>
          </div>
		</div>		
	</div>
</div>
@endsection
