<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sponsorship extends Model
{
    use HasFactory;

    protected $fillable = ['start_date', 'end_date', 'success'];

    /**
     * The doctors that belong to the Sponsorship
     */
    public function doctors(): BelongsToMany
    {
        return $this->belongsToMany(Doctor::class);
    }
}
