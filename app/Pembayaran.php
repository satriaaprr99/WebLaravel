<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'siswa_tagihan';
   
    protected $fillable = [
         'kd_bayar', 'tagihan_id', 'siswa_id', 'bayar'
    ];
    // protected $table = 'pembayaran';
   
    // protected $fillable = [
    //      'kd_pembayaran', 'id_user', 'id_tagihan', 'id_siswa', 'jumlah_bayar', 'keterangan'
    // ];

    // public function users()
    // {
    //      return $this->belongsTo(User::class,'id_user', 'id');
    // }

    public function tagihan()
    {
         return $this->belongsTo(Tagihan::class,'tagihan_id', 'id', 'jenis_tagihan');
    }
   
    public function siswa()
    {
         return $this->belongsTo(Siswa::class,'siswa_id','id','nis');
    }
}
