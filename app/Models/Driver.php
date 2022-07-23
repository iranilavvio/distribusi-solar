<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    //protected fillable
    protected $fillable = [
        'karyawan_id',
        'truck_id',
    ];

    //protected table
    protected $table = 'driver';

    //relationship with karyawan
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }

    //relationship with truck
    public function truck()
    {
        return $this->belongsTo(Truck::class, 'truck_id');
    }

    //relationship with suratjalan
    public function suratjalan()
    {
        return $this->hasMany(SuratJalan::class, 'driver_id');
    }

    //relationship with laporanpenjualan
    public function laporanpenjualan()
    {
        return $this->hasMany(LaporanPenjualan::class, 'driver_id');
    }

    public function scopeFilter($query, $params)
    {

        if (@$params['search']) {
            $query
                ->whereHas('karyawan', function ($query) use ($params) {
                    $query->where('name', 'LIKE', "%{$params['search']}%");
                })
                ->orWhereHas('truck', function ($query) use ($params) {
                    $query->where('name', 'LIKE', "%{$params['search']}%");
                });
        }
    }
}
