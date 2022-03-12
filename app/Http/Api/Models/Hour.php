<?php

namespace App\Http\Api\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
