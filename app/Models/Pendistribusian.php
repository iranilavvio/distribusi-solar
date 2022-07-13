<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendistribusian extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'pendistribusian';   

    public function orderreal()
    {
        return $this->belongsTo(OrderReal::class, 'order_real_id');
    }

    public function suratjalan()
    {
        return $this->belongsTo(SuratJalan::class, 'surat_jalan_id');
    }
}
