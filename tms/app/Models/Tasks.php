<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Employees;

class Tasks extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'file',
        'voice',
    ];

    public function employee_name(){
        return $this->hasOne(Employees::class,'id','employee_id');
    }

    public function creator_name(){
        return $this->hasOne(User::class,'id','creator_id');
    }

}
