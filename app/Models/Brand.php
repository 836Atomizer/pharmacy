<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable= [
        'name'
    ];

    public function getNameAttribute($value): string
    {
        return strtoupper($value);
    }
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
}
