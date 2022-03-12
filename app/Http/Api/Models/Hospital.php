<?php

namespace App\Http\Api\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'district_id'
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
