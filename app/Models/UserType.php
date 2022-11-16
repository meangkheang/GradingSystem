<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    protected $fillable = ['type_id','user_id'];

    public function type(){
        return $this->hasOne(Type::class,'id','type_id');
    }

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
