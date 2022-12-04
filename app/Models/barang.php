<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $fillable = ['nama_barang','kategoris_id','harga','stok'];


    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }
}