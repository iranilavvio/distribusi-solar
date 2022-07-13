<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TandaTerima extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'tanda_terima';

   //relationship with surat_jalan
   public function suratjalan()
   {
       return $this->belongsTo(SuratJalan::class, 'surat_jalan_id');
   }
}
