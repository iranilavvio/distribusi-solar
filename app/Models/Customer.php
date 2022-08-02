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

    public function scopeFilter($query, $params)
    {

        $query->where(function($query) use ($params) {
            if(@$params['search']) {
                $query->where('kode', 'LIKE', "%{$params['search']}%")
                    ->orWhere('name', 'LIKE', "%{$params['search']}%")
                    ->orWhere('alamat', 'LIKE', "%{$params['search']}%");
            }

        });
    }
}
