<?php

namespace App\Http\Api\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
