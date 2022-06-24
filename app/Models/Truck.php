<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    //protected fillable
    protected $fillable = [
        'no_pol',
        'no_lambung',
        'kuantitas',
    ];

    //protected table
    protected $table = 'truck';
}
