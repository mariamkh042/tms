<?php

namespace App\Models;

use App\Models\Tasks;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Employees as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employees extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard = 'employee';
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
    ];

/**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function task(){
        return $this->hasMany(Tasks::class);
    }

}
