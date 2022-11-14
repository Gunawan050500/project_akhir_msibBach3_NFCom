<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    use HasFactory;
    protected $table = 'donatur';
    //mapping kolom atau fieldnya
    protected $fillable = ['nama', 'no_hp'];
    //relasi one to many ke tabel donasi
    public function donatur()
    {
        return $this->hasMany(Donatur::class);
    }
}
