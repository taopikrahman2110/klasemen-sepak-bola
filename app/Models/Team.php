<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'kota',
    ];

    public function matches()
    {
        return $this->hasMany(Mat::class);
    }

    public function standings()
    {
        return $this->hasMany(Standing::class);
    }
}
