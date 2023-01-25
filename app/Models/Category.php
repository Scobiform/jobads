<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    public function jobs()
    {
        //hasOne, hasMany, belnogsTo, belongsToMany
        return $this->hasMany(Job::class);

    }
}
