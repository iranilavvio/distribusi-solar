<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    //protected fillable
    protected $fillable = [
        'karyawan_id',
        'truck_id',
    ];

    //protected table
    protected $table = 'driver';
}
