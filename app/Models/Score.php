<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id','score_tag','class_participation','hw','midterm','slidehandbook','major_assignment','presentation','final','total','is_grade','class_tag'
    ];

    public static function search($search){

        return empty($search) ? static::query():
         static::query()->where('id','like','%' . $search . '%')
                        ->orWhere('id','like','%' . $search . '%');
      }

    public function student(){
        return $this->hasOne(Student::class,'id','student_id');
    } 

    public function score_subject(){

        return $this->hasOne(ScoreSubject::class,'score_id','id');
    }

    public function CalculateGrade():string{

        $total = $this->total;
        $grade = '';

        if($total <50 ){
            $grade = 'F';
        }
        if($total>=0&&$total<=50)
            $grade="E";
        if($total>50&&$total<=70)
            $grade="D";
        if($total>70&&$total<=80)
            $grade="C";
        if($total>80&&$total<=90)
            $grade="B";
        if($total>90 && $total <= 100)
            $grade="A";

        return $grade;
    }

    public function class(){
        return $this->hasOne(SubjectClass::class,'class_tag','class_tag');
    }
  
    
}
