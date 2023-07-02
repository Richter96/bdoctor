<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    protected $fillable = ['phone', 'address', 'photo', 'cv', 'service', 'slug', 'specialization_id'];

    use HasFactory;

    /**
     * Get all of the reviews for the Doctor
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get all of the messages for the Doctor
     */
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    /**
     * The specilizations that belong to the Doctor
     */
    public function specializations(): BelongsToMany
    {
        return $this->belongsToMany(Specialization::class);
    }

    /**
     * The sponsorships that belong to the Doctor
     */
    public function sponsorships(): BelongsToMany
    {
        return $this->belongsToMany(Sponsorship::class);
    }

    /**
     * The votes that belong to the Doctor
     */
    public function votes(): BelongsToMany
    {
        return $this->belongsToMany(Vote::class);
    }

    /**
     * Get the user that owns the Doctor
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
