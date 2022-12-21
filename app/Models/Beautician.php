<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beautician extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [ 'id' ];

    public function appointments() : HasMany {
        return $this->hasMany(Appointment::class);
    }
}
