<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $fillable = ['kode','nama'];
    public function pinjam_barang()
    {
        return $this->hasMany(PinjamBarang::class, 'barang_id');
    }

}
