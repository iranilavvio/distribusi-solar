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

   public function scopeFilter($query, $params)
    {

        if (@$params['search']) {
            $query
                ->whereHas('suratjalan', function ($query) use ($params) {
                    $query->where('no_sj', 'LIKE', "%{$params['search']}%");
                })
                ->orWhereHas('suratjalan', function ($query) use ($params) {
                    $query->whereHas('driver', function ($query) use ($params) {
                        $query->whereHas('truck', function ($query) use ($params) {
                            $query->where('no_pol', 'LIKE', "%{$params['search']}%");
                        });
                    });
                })
                ->orWhereHas('suratjalan', function ($query) use ($params) {
                    $query->whereHas('customer', function ($query) use ($params) {
                        $query->where('name', 'LIKE', "%{$params['search']}%");
                    });
                });
        }
    }
}
