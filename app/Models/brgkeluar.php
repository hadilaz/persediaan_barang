<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brgkeluar extends Model
{
    use HasFactory;
    protected $table = 'brgkeluars';
    protected $fillable = ['no_brgkeluar','barang_id','user_id','date','jumlah_brgkeluar'];

    public function barang()
    {
        return $this->belongsTo(barang::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
