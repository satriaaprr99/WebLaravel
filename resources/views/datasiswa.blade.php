@extends('layout_master.master')

@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
              	<div class="row">
              		<div class="col-sm-6 text-left">
              			<h2 class="card-title">Data Siswa</h2>
              		</div>
              		<div class="col-sm-6">

              			<ul class="nav nav-pills mb-3 float-right" id="pills-tab" role="tablist">
					  <li class="nav-item" role="presentation">
					    <a class="nav-link btn-sm active" id="pills-home-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-home" aria-selected="true">Daftar Siswa</a>
					  </li>&nbsp;&nbsp;
					  <li class="nav-item" role="presentation">
					    <a class="nav-link btn-sm" id="pills-profile-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-profile" aria-selected="false">Tambah Data</a>
					  </li>&nbsp;&nbsp;
					  <li class="nav-item" role="presentation">
					    <a class="nav-link btn-sm" id="pills-contact-tab" data-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-contact" aria-selected="false">Cari Data</a>
					  </li>
					</ul>
              	</div>
              </div>
              <div class="card-body">

              	<div class="tab-content" id="pills-tabContent">
						
					  <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-home-tab">
					  	<div class="table-responsive">
		                  <table class="table tablesorter " id="">
		                    <thead class=" text-primary">
		                      <tr>
		                       	<th>No</th>
		        				<th>NIS</th>
		        				<th>Nama Lengkap</th>
		        				<th>JeKel</th>
		        				<th>Kelas</th>
		        				<th>NomorHp</th>
		        				<th>Alamat</th>
		        				<th>Aksi</th>
		                      </tr>
		                    </thead>
		                    <tbody>
		                     <?php $no = 1; ?>
					        	@foreach($Siswa as $siswa)
					        	<tr>
					        		<td>{{ $no++ }}</td>
					        		<td>{{ $siswa->nis }}</td>
					        		<td>{{ $siswa->nama }}</td>
					        		<td>{{ $siswa->jk }}</td>
					        		<td>{{ $siswa->kelas }}</td>
					        		<td>{{ $siswa->nohp }}</td>
					        		<td>{{ $siswa->alamat }}</td>
					        		<td>
					        			<button type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon">
					        				<a href="/datasiswa/{{ $siswa->id }}/edit" class="btn btn-success btn-sm btn-icon">
					        					<i class="tim-icons icon-settings"></i>
					        				</a>
						                </button>
						                <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon">     
						                    <a href="/datasiswa/{{ $siswa->id }}/hapus" class="btn btn-danger btn-sm btn-icon" onclick="return confirm('Anda yakin akan menghapus data ?');">
						                    	<i class="tim-icons icon-simple-remove"></i>
						                    </a>
						                </button>	
					        		</td>
					        	</tr>
					        	@endforeach
		                    </tbody>
		                  </table>
		                </div>
					  </div>

					  <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-profile-tab">
					  		<form action="/datasiswa" method="POST">
					  			@csrf

					  			<div class="form-group row">
								    <label for="inputnis" class="col-sm-2 col-form-label pt-0">NIS</label>
								    <div class="col-sm-10">
								      <input name="nis" type="text" class="form-control" id="inputnis" required="">
								    </div>
							  	</div>

					  			<div class="form-group row">
								    <label for="inputnama" class="col-sm-2 col-form-label pt-0">Nama</label>
								    <div class="col-sm-10">
								      <input name="nama" type="text" class="form-control" id="inputnama" required="">
								    </div>
							  	</div>

							  	<fieldset class="form-group">
								    <div class="row">
								      <label class="col-form-label col-sm-2 pt-0">Jenis Kelamin</label>
								      <div class="col-sm-10">
								        <div class="form-check">
								          <input class="form-check-input" type="radio" name="jk" id="gridRadios1" value="Laki - Laki" required="">
								          <label class="form-check-label" for="gridRadios1">
								            Laki - Laki
								          </label>
								        </div>
								        <div class="form-check">
								          <input class="form-check-input" type="radio" name="jk" id="gridRadios2" value="Perempuan" required="">
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
								        	<option class="form-control" value="XII RPL 1">XII RPL 1</option>
								        	<option class="form-control" value="XII RPL 2">XII RPL 2</option>
								        	<option class="form-control" value="XII RPL 3">XII RPL 3</option>
							      		</select>
								    </div>
							  	</div>

							  	<div class="form-group row">
								    <label for="inputnohp" class="col-sm-2 col-form-label pt-0">Nomor Handphone</label>
								    <div class="col-sm-10">
								      <input name="nohp" type="text" class="form-control" id="inputnohp" required="">
								    </div>
							  	</div>

							  	<div class="form-group row">
								    <label for="inputalamat" class="col-sm-2 col-form-label pt-0">Alamat Rumah</label>
								    <div class="col-sm-10">
								      <textarea name="alamat" class="form-control" id="inputalamat" required=""></textarea>
								    </div>
							  	</div>

						      <div class="modal-footer">
						        <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah Data</button>
							   </form>
						      </div>
					  </div>

					  <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-contact-tab">

					  		<form method="GET" action="/datasiswa">
                                <div class="form-group row">
								    <label for="inputnis" class="col-sm-2 col-form-label pt-0">NIS</label>
								    <div class="col-sm-10">
								      <input name="nis" type="text" class="form-control" id="inputnis">
								    </div>
							  	</div>

					  			<div class="form-group row">
								    <label for="inputnama" class="col-sm-2 col-form-label pt-0">Nama</label>
								    <div class="col-sm-10">
								      <input name="nama" type="text" class="form-control" id="inputnama">
								    </div>
							  	</div>
                                	<button class="btn btn-primary" type="submit">Search</button>
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
