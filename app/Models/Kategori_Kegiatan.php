<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_Kegiatan extends Model
{
    use HasFactory;
    //mapping ke tabel
    protected $table = 'kategori_kegiatan';
    //mapping ke kolom/fieldnya
    protected $fillable = ['nama'];
    //relasi one to many ke tabel donasi
    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }
}
