<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
  protected $table = 'siswa';
  protected $fillable = [
   'avatar', 'nis', 'username', 'nama', 'id_kelas', 'id_angkatan', 'nohp', 'alamat'
 ];
   
   public function tagihan(){
    return  $this->belongsToMany(Tagihan::class)->withPivot(['id', 'kd_bayar', 'bayar', 'created_at'])->withTimeStamps();
  }

  
  public function kelas(){
    return  $this->belongsTo(Kelas::class,'id_kelas');
  }

  public function angkatan(){
    return  $this->belongsTo(Angkatan::class,'id_angkatan');
  }

  public function AvatarDefault(){

     if(!$this->avatar){
      return asset('uploads/default.png');
    }

    return asset('uploads/'.$this->avatar);

  }

  public function nama_kelas(){
    return $this->kelas->nama_kelas;
  }

  public function tahun_angkatan(){
    return $this->angkatan->tahun;
  }

}
