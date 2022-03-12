<?php

namespace App\Http\Api\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'doctor_id',
        'hour_id',
        'appointment_date',
        'is_cancelled',
        'is_completed'
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function hour(){
        return $this->belongsTo(Hour::class);
    }
}
