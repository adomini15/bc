<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [ 'id' ];

    public function service() : BelongsTo {
        return $this->belongsTo(Service::class);
    }

    public function customer() : BelongsTo {
        return $this->belongsTo(Customer::class);
    }

    public function beautician() : BelongsTo {
        return $this->belongsTo(Beautician::class);
    }
}
