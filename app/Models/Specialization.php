<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Specialization extends Model
{ 
    use HasFactory;
    
    protected $fillable = ['name'];

    /**
     * The doctors that belong to the Specialization
     */
    public function doctors(): BelongsToMany
    {
        return $this->belongsToMany(Doctor::class);
    }
}
