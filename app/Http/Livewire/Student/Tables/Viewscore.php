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

        //get score need user_id
        $this->score = Score::where('student_id',session('user.student.id'))->where('class_tag',$value)->first();
    }

  

    protected $rules = [

    ];

    
    public function mount()
    {
        
        $this->subjects = StudentClass::where('student_id',session('user.student.id'))->get();

        

        if(count($this->subjects) >0)
        {
            $this->score = Score::where('class_tag',$this->subjects->first()->class_tag)->where('student_id',session('user.student.id'))->first();
        }

    }
    public function render()
    {
        return view('livewire.student.tables.viewscore');
    }
}
