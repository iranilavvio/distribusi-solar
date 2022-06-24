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
}
