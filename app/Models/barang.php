<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $fillable = ['nama_barang','kategori_id','harga','merek','stok','detail'];


    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }

    public function brgmasuk()
    {
        return $this->hasmany(brgmasuk::class);
    }

    public function brgkeluar()
    {
        return $this->hasmany(brgkeluar::class);
    }


}
