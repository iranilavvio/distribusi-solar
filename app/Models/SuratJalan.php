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
}
