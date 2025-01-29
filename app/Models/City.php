<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class City extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'state',
    ];

    public function doctors(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }
}
