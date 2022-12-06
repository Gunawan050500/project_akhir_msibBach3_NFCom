<?php

namespace App\Exports;

use App\Models\Donasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DonasiExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Donasi::select("keterangan", "tgl_donasi", "jml_donasi", "donatur_id")->get();
    }
    public function headings(): array
    {
        return ["Keterangan", "Tanggal donasi", "Jumlah Donasi", "Donatur"];
    }
}
