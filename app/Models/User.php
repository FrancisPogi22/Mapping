<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';

    protected $primaryKey = 'user_id';
    protected $fillable = [
        'account_number', 
        'full_name', 
        'position',  
        'gender', 
        'address', 
        'birthday', 
        'password'   
    ];

    public function login()
    {
        return $this->hasOne(LoginUserModel::class, 'account_number', 'account_number');
    }
}
