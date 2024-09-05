<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    public $table = 'pengumumans';
    use HasFactory;

    protected $fillable = ['judul', 'konten', 'kategori_id', 'gambar'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
