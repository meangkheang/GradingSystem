<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectClass extends Model
{
    use HasFactory;

    protected $fillable = ['class_tag','subject_id','teacher_id','bach','shift_id','year','created_at','updated_at','name'];

    public function subject(){
        return $this->hasOne(Subject::class,'id','subject_id');
    }

    public function teacher()
    {
        return User::find($this->teacher_id);
    }

    public function shift(){
        return $this->hasOne(Shift::class,'id','shift_id');
    }

    public function myclass(){
        return $this->hasOne(StudentClass::class,'class_tag','class_tag');
    }

    public function total_student(){
        return StudentClass::where('class_tag',$this->class_tag)->count();
    }

  

}
