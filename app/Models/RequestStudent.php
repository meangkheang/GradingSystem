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
}
