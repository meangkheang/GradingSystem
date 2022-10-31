<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectClass extends Model
{
    use HasFactory;

    protected $fillable = ['class_tag','subject_id','teacher_id','bach','shift_id','year','created_at','updated_at'];

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
}
