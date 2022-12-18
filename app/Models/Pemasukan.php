<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function jenis_penggunaan() {
        $this->belongsTo(JenisUang::class);
    }
}
