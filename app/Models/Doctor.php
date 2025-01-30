<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};
use Illuminate\Database\Eloquent\{Builder, Model, SoftDeletes};

class Doctor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function scopeOrderByNameWithoutPrefix(Builder $query): Builder
    {
        return $query->orderByRaw("REGEXP_REPLACE(name, '^Dr(a)?\.\s*', '')");
    }
}
