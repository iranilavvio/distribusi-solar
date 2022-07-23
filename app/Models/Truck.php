<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    //protected fillable
    protected $fillable = [
        'no_pol',
        'no_lambung',
        'kuantitas',
    ];

    //protected table
    protected $table = 'truck';

    public function driver()
    {
        return $this->hasOne(Driver::class);
    }

    //relationship with suratjalan
    public function suratjalan()
    {
        return $this->hasMany(SuratJalan::class);
    }

    //relationship with laporanpenjualan
    public function laporanpenjualan()
    {
        return $this->hasMany(LaporanPenjualan::class);
    }

    public function scopeFilter($query, $params)
    {

        $query->where(function($query) use ($params) {
            if(@$params['search']) {
                $query->where('no_pol', 'LIKE', "%{$params['search']}%")
                    ->orWhere('no_lambung', 'LIKE', "%{$params['search']}%");
            }

        });
    }
}
