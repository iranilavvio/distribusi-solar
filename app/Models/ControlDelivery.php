<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlDelivery extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'id_order_real', 'id_delivery', 'status', 'created_at', 'updated_at'
    // ];

    //protected table
    protected $table = 'control_delivery';
}
