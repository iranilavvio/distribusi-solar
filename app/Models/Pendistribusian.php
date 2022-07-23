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

    public function scopeFilter($query, $params)
    {

        if (@$params['search']) {
            $query
                ->whereHas('surat_jalan', function ($query) use ($params) {
                    $query->where('no_sj', 'LIKE', "%{$params['search']}%");
                })
                ->orWhereHas('customer', function ($query) use ($params) {
                    $query->where('name', 'LIKE', "%{$params['search']}%");
                });
        }
    }
}
