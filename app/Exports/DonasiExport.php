<?php

namespace App\Exports;

use App\Models\Donasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class DonasiExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ar_donasi = DB::table('donasi')
        ->join('donatur', 'donatur.id', '=', 'donasi.donatur_id')
        ->select('donasi.keterangan', 'donasi.tgl_donasi', 'donasi.jml_donasi', 'donatur.nama AS donaturs',)
        ->get();
        return $ar_donasi;
    }

    public function headings(): array
    {
        return ["Keterangan", "Tanggal Donasi", "Jumlah DOnasi","Nama Donatur"];
    }
}
