<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 't_siswa';
    protected $fillable = ['nis','nama','jk','kelas','nohp','alamat'];
}
