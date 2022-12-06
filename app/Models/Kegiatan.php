<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    //mapping ke tabel
    protected $table = 'kegiatan';
    //mapping ke kolom/fieldnya
    protected $fillable = ['nama', 'tgl_kegiatan', 'deskripsi', 'kategori_id', 'foto',];
    //tabel relasi merujuk/merefer ke tabel master (donatur)
    public function kategori_kegiatan()
    {
        return $this->belongsTo(Kategori_Kegiatan::class);
    }
}
