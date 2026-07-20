<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar';
    protected $primaryKey = 'id_kamar';

    protected $fillable = [
        'nomor_kamar',
        'tipe_kamar',
        'harga',
        'status_kamar',
    ];

    public function bokings()
    {
        return $this->hasMany(Boking::class, 'id_kamar', 'id_kamar');
    }
}
