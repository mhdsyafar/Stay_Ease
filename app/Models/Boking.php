<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boking extends Model
{
    use HasFactory;

    protected $table = 'boking';
    protected $primaryKey = 'id_boking';

    protected $fillable = [
        'id_kamar',
        'id_user',
        'tanggal_boking',
        'tanggal_check_in',
        'tanggal_check_out',
        'status_boking',
    ];

    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'id_kamar', 'id_kamar');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
 
    public function getNightsCountAttribute()
    {
        $checkIn = new \DateTime($this->tanggal_check_in);
        $checkOut = new \DateTime($this->tanggal_check_out);
        return $checkIn->diff($checkOut)->days;
    }
 
    public function getIsUrgentAttribute()
    {
        $bookingDate = new \DateTime($this->tanggal_boking);
        $checkInDate = new \DateTime($this->tanggal_check_in);
        return $bookingDate->diff($checkInDate)->days <= 3;
    }
}
