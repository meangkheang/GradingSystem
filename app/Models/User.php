<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //check if user has request student

    public function request_student(){

        return $this->hasOne(RequestStudent::class,'user_id','id');

    }

    // public function teacher(){
    //     return $this->hasOne(UserType::class,'','');
    // }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'updated_at',
        'created_at'
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

    public function usertype (){
        return $this->hasOne(UserType::class,'user_id','id');
    }

    public function student()
    {
        return $this->hasOne(Student::class,'user_id','id');
    }
}
