<?php

namespace App\Exports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Siswa::all();
    }

    public function map($siswa): array
    {	

        return [
        	$siswa->id,
            $siswa->nis,
            $siswa->nama,
            $siswa->nama_kelas(),
            $siswa->tahun_angkatan(),
            $siswa->nohp,
            $siswa->alamat,
        ];
    }

    public function headings(): array
    {
        return [
            'NO',
            'NIS',
            'NAMA LENGKAP',
            'KELAS',
            'ANGKATAN',
            'NOHP',
            'ALAMAT',
        ];
    }

}
