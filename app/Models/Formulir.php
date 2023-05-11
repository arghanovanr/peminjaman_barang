<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulir extends Model
{
    use HasFactory;
    protected $table = 'formulir';
    protected $fillable = ['user_id','tanggal_pinjam','tanggal_pengembalian','status','alasan'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pinjam_barang()
    {
        return $this->hasMany(PinjamBarang::class, 'barang_id');
    }
}
