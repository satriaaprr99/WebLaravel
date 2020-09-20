<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
  protected $table = 'siswa';
  protected $fillable = [
   'avatar', 'nis', 'username', 'nama', 'id_kelas', 'nohp', 'alamat', 'id_spp'
 ];
 
   /**
   * Belongs To Siswa -> Spp
   *
   * @return void
   */
   public function spp()
   {
     return $this->belongsTo(Spp::class,'id_spp','id');
   }
   
   public function pembayaran(){
    return  $this->hasMany(Pembayaran::class,'id_spp');
  }
  
  public function kelas(){
    return  $this->belongsTo(Kelas::class,'id_kelas');
  }

  public function AvatarDefault(){

   if(!$this->avatar){
    return asset('uploads/default.png');
  }

  return asset('uploads/'.$this->avatar);

}
}
