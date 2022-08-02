<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    //protected fillable
    protected $fillable = [
        'name',
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'posisi',
        'no_telp',
    ];
    // protected $guarded = ['id'];
    //protected table
    protected $table = 'karyawan';

    public function scopeFilter($query, $params)
    {

        $query->where(function($query) use ($params) {
            if(@$params['search']) {
                $query->where('name', 'LIKE', "%{$params['search']}%")
                    ->orWhere('no_telp', 'LIKE', "%{$params['search']}%");
            }

        });
    }

    public function driver()
    {
        return $this->hasOne(Driver::class);
    }

    //relationship with suratjalan
    public function suratjalan()
    {
        return $this->hasMany(SuratJalan::class, 'karyawan_id');
    }

    //relationship with purchaseorder
    public function purchaseorder()
    {
        return $this->hasMany(PurchaseOrder::class, 'karyawan_id');
    }
}
