<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlDelivery extends Model
{
    use HasFactory;

    // protected guarded
    protected $guarded = ['id'];

    //protected table
    protected $table = 'control_delivery';

    //relation with surat_jalan
    public function suratjalan()
    {
        return $this->belongsTo(SuratJalan::class, 'surat_jalan_id');
    }
}
