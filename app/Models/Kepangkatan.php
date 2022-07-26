<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepangkatan extends Model
{
    use HasFactory;

    protected $table = 'kepangkatan';
    protected $guarded = ['id'];
}
