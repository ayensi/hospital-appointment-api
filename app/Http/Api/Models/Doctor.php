<?php

namespace App\Http\Api\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'hospital_id',
        'clinic_id',
        'gender'
    ];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
