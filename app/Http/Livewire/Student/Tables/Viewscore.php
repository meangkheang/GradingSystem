<?php

namespace App\Http\Livewire\Student\Tables;

use App\Models\Score;
use Livewire\Component;
use App\Models\ScoreSubject;
use App\Models\StudentClass;

class Viewscore extends Component
{
    //props
    public $subjects = [];
    public $class_id ;
    public $score = null;


    public function updated($key,$value){

        //get subject with class_tag
        $class = StudentClass::where('class_tag', $value)->first();
        $subject_id = $class->subject_id;

      

        //get score via student id
        $student = session('user.student');

        //get score need user_id
        $this->score = Score::where('student_id',session('user.student.id'))->first();
    }

  

    protected $rules = [

    ];


    public function mount()
    {
        $this->subjects = StudentClass::where('student_id',session('user.student.id'))->get();
    }
    public function render()
    {
        return view('livewire.student.tables.viewscore');
    }
}
