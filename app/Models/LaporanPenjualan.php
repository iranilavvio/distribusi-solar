<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPenjualan extends Model
{
    use HasFactory;

    //protected table
    protected $table = 'lap_penjualan';

    protected $guarded = ['id'];

    //relation with truck
    public function truck()
    {
        return $this->belongsTo(Truck::class, 'truck_id');
    }

    //relation with driver
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    //relation with suratjalan
    public function suratjalan()
    {
        return $this->belongsTo(SuratJalan::class, 'surat_jalan_id');
    }

    //relation with customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
