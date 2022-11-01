<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;
    
    protected $fillable = ['student_id','class_tag'];

    public function subject_class(){
        return $this->hasOne(SubjectClass::class,'class_tag','class_tag');
    }

}
