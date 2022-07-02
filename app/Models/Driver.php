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
}
