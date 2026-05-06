<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomor_surat',
        'id_kategori',
        'pengirim',
        'perihal',
        'tanggal_terima',
        'sifat',
        'foto'
    ];
    public function kategori()
    {
      return $this->belongsTo(kategori::class, 'id_kategori');
    }
} 
