<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['phone', 'address', 'photo', 'cv', 'service', 'slug'];

    use HasFactory;
}
