<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderReal extends Model
{
    use HasFactory;
    
    //protected fillable
    protected $fillable = [
        'customer_id',
        'alamat',
        'receive_po',
        'realisasi',
        'unreal',
        'keterangan',
    ];

    //protected table
    protected $table = 'order_real';
}
