<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    public function arsip()
    {
       return $this->hasMany(arsip::class);
    }
}
