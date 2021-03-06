<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $table = 'students';

    /**
     * The attributes that are not mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function userCreatures() {
        return $this->hasMany(UserCreature::class, 'student_id');
    }

    public function evolutions() {
        return $this->hasMany(UserEvolution::class, 'student_id');
    }

    public function stat(){
        return $this->hasOne(UserStat::class, 'student_id');
    }

    public function logs() {
        return $this->hasMany(Log::class, 'student_id');
    }
}
