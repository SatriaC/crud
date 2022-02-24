<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'email',
        'nomor_telepon',
        'alamat',
        'agama',
    ];


    public function gender()
    {
        # code...
        return $this->belongsTo(Gender::class, 'jenis_kelamin');
    }

    public function religion()
    {
        # code...
        return $this->belongsTo(Religion::class, 'agama');
    }
}
