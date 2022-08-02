<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratJalan extends Model
{
    use HasFactory;

    //protected table
    protected $table = 'surat_jalan';

    //protected guarded
    protected $guarded = ['id'];

    //relationship with customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    //relationship with driver
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

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

    //relationship with laporanpenjualan
    public function laporanpenjualan()
    {
        return $this->belongsTo(LaporanPenjualan::class, 'lap_penjualan_id');
    }

    public function pendistribusian()
    {
        return $this->hasMany(Pendistribusian::class, 'surat_jalan_id');
    }

    public function delivery()
    {
        return $this->hasMany(Delivery::class, 'surat_jalan_id');
    }

    public function control_delivery()
    {
        return $this->hasMany(ControlDelivery::class, 'surat_jalan_id');
    }

    public function tanda_terima()
    {
        return $this->hasMany(TandaTerima::class, 'surat_jalan_id');
    }

    public function scopeFilter($query, $params)
    {

        if (@$params['search']) {
            $query->whereHas('customer', function ($query) use ($params) {
                    $query->where('name', 'LIKE', "%{$params['search']}%");
                })->orWhereHas('driver', function ($query) use ($params) {
                    $query->whereHas('truck', function ($query) use ($params) {
                        $query->where('no_pol', 'LIKE', "%{$params['search']}%");
                    });
                })
                ->orWhere('no_sj', 'LIKE', "%{$params['search']}%")
                ->orWhere('no_kirim', 'LIKE', "%{$params['search']}%");
        }
    }
}
