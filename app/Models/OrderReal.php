<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderReal extends Model
{
    use HasFactory;
    
    //protected fillable
    protected $fillable = [
        'no_order',
        'customer_id',
        'alamat',
        'receive_po',
        'realisasi',
        'unreal',
        'keterangan',
    ];

    //protected table
    protected $table = 'order_real';

    //relationship with customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function pendistribusian()
    {
        return $this->hasMany(Pendistribusian::class, 'order_real_id');
    }
}
