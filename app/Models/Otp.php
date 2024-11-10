<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    protected $fillable = [
        'user_id', 'otp', 'is_used', 'start_date', 'expire_time'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
