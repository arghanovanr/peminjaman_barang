<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamBarang extends Model
{
    use HasFactory;
    protected $table = 'pinjam_barang';
    protected $fillable = ['formulir_id','barang_id','jumlah'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function formulir()
    {
        return $this->belongsTo(Formulir::class, 'formulir_id');
    }
}
