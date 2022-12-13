<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brgmasuk extends Model
{
    use HasFactory;
    protected $table = 'brgmasuks';
    protected $fillable = ['no_brgmasuk','barang_id','date','jumlah_brgmasuk'];

    public function barang()
    {
        return $this->belongsTo(barang::class);
    }


}
