@extends('layout_master.master')

@section('content')
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Profile</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#">Data Siswa</a></li>
              <li class="breadcrumb-item active" aria-current="page">profile Siswa</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-xl-4 order-xl-2">
      <div class="card card-profile">
        <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
        <div class="row justify-content-center">
          <div class="col-lg-3 order-lg-2">
            <div class="card-profile-image">
              <a href="#">
                <img src="{{ $siswa->AvatarDefault() }}" style="width: 130px; height: 130px;" class="rounded-circle">
              </a>
            </div>
          </div>
        </div>
        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
          <div class="d-flex justify-content-between">
            <a href="#" class="btn btn-sm btn-default">Siswa</a>
            <a href="#" class="btn btn-sm btn-default float-right">{{$siswa->kelas->nama_kelas}}</a>
          </div>
        </div>
        <div class="card-body pt-0">
          <hr class="my-2" />
          <div class="text-center">
            <h5 class="h3">{{$siswa->nama}}</h5>
            <div class="h5 font-weight-300">
              <i class="ni location_pin mr-2"></i>{{$siswa->nis}}
            </div>
            <div class="h5 font-weight-300">
              <i class="ni location_pin mr-2"></i>{{$siswa->alamat}}
            </div>
            <div class="h5 mt-4">
              <i class="ni business_briefcase-24 mr-2"></i>- {{$siswa->nohp}} -
            </div>
            <div>
              <i class="ni education_hat mr-2"></i>SMK Negeri 4 Bandung
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-8 order-xl-1">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Edit profile Siswa</h3>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="/profile{{$siswa->id}}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="row">

                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-control-label" for="input-address">Nama Lengkap</label>
                    <input name="nama" id="input-address" class="form-control" value="{{ old('siswa', @$siswa->nama) }}" type="text">
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-first-name">NIS</label>
                    <input name="nis" type="text" id="input-first-name" class="form-control" value="{{ old('siswa', @$siswa->nis) }}">
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-last-name">Kelas</label>
                    <select name="kelas" class="custom-select" {{ count($kelas) == 0 ? 'disabled' : '' }}>
                     @if(count($kelas) == 0)                      
                     <option>Pilihan tidak ada</option>
                     @else                      
                     <option value="">Silahkan Pilih</option>                      
                     @foreach($kelas as $value)       
                     <option value="{{ $value->id }}" {{ $siswa->id_kelas == $value->id ? 'selected' : '' }}>{{ $value->nama_kelas }}</option>
                     @endforeach
                     @endif 
                   </select>
                 </div>
               </div>
             </div>
            <div class="row">

              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label" for="input-address">Nomor Handphone</label>
                  <input name="nohp" id="input-address" class="form-control" value="{{ old('siswa', @$siswa->nohp) }}" type="text">
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-first-name">Foto Profile</label>
                  <input name="avatar" type="file" id="input-first-name" class="form-control" value="{{ old('siswa', @$siswa->avatar) }}">
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-last-name">SPP</label>
                  <select name="spp" id="inputspp" class="custom-select" {{ count($spp) == 0 ? 'disabled' : '' }} required="">
                    @if(count($spp) == 0)                     
                    <option>Pilihan tidak ada</option>
                    @else                     
                    <option value="">Silahkan Pilih</option>                      
                    @foreach($spp as $value)      
                    <option value="{{ $value->id }}" {{ $siswa->id_spp == $value->id ? 'selected' : '' }}>{{ 'Tahun '.$value->tahun.' - '.'Rp.'.$value->nominal }}</option>
                    @endforeach
                    @endif  
                  </select>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label" for="input-address">Alamat Rumah</label>
                  <textarea name="alamat" id="input-address" class="form-control">{{ old('siswa', @$siswa->alamat) }}</textarea>
                </div>
              </div>

            </div>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i class="tim-icons icon-settings"></i> Update Data</button>
          </form>
        </div>
    </div>
  </div>  
</div>
@endsection