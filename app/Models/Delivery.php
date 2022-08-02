<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    //protected table
    protected $table = 'lap_delivery';

    //protected guarded
    protected $guarded = ['id'];

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
                        $query->whereHas('karyawan', function ($query) use ($params) {
                            $query->where('name', 'LIKE', "%{$params['search']}%");
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
