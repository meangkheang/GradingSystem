<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','student_id','phone','name','email','major_id','sex','campus_id','shift_id','dob','pob'];

    public static function search($search){

       return empty($search) ? static::query():
        static::query()->where('name','like','%' . $search . '%')
                       ->orWhere('email','like','%' . $search . '%');
     }

    public function shift(){
        return $this->hasOne(Shift::class,'id','shift_id');
    }
    public function campus(){
        return $this->hasOne(Campus::class,'id','campus_id');
    }

    public function StudentCount(){

        return Student::where('user_id',$this->id)->count();
    }

    public function major(){
        return $this->hasOne(Major::class,'id','major_id');
    }

}
