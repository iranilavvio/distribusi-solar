<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    //protected fillable
    protected $fillable = [
        'kode',
        'name',
        'alamat',
        'nama_contact',
        'nomor_contact',
    ];

    //protected table
    protected $table = 'customer';

    //relationship with orderreal
    public function orderreal()
    {
        return $this->hasMany(OrderReal::class, 'customer_id');
    }

    //relationship with suratjalan
    public function suratjalan()
    {
        return $this->hasMany(SuratJalan::class, 'customer_id');
    }

    //relationship with laporanpenjualan
    public function laporanpenjualan()
    {
        return $this->hasMany(LaporanPenjualan::class, 'customer_id');
    }

    //relationship with purchaseorder
    public function purchaseorder()
    {
        return $this->hasMany(PurchaseOrder::class, 'customer_id');
    }
}
