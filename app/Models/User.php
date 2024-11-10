<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'company_id', 'name', 'surname', 'username', 'email', 
        'password', 'phone', 'profile_photo', 'address', 
        'date_of_birth', 'is_active', 'last_login_at', 'created_by'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var string[]
     */
    protected $hidden = [
        'password',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function otps()
    {
        return $this->hasMany(Otp::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
