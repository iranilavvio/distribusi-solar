<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    //protected table
    protected $table = 'purchase_order';

    //protected guarded
    protected $guarded = ['id'];

    //relationship with customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    //relationship with karyawan
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }

    public function scopeFilter($query, $params)
    {

        if (@$params['search']) {
            $query->whereHas('customer', function ($query) use ($params) {
                    $query->where('name', 'LIKE', "%{$params['search']}%");
                })->orWhere('no_po', 'LIKE', "%{$params['search']}%")
                ->orWhereHas('customer', function ($query) use ($params) {
                    $query->where('alamat', 'LIKE', "%{$params['search']}%");
                });
        }
    }
}
