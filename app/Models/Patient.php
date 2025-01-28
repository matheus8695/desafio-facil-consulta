<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Patient extends Model
{
    use HasFactory;
    use SoftDeletes;
}
