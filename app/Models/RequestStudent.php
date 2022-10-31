<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','phone','name','email','major_id','is_accepted','sex','pob','dob','shift_id','campus_id'
    ];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function major(){
        return $this->hasOne(Major::class,'id','major_id');
    }

    public function shift(){
        return $this->hasOne(Shift::class,'id','shift_id');
    }

    public function campus(){
        return $this->hasOne(Campus::class,'id','campus_id');
    }
}
