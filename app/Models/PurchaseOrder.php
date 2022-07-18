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
}
