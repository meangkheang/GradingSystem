<?php

namespace App\Http\Livewire\Teacher\Tables;

use App\Models\Score;
use Livewire\Component;

class StudentsScore extends Component
{
    public $students = []; 
    
    public $shift = '1';
    public $grade = 'A';
    public $search = '';
    public $campus = '1';


    public $users= [];


    public function updatedCampus($value)
    {
        $this->students = Score::whereHas('student',function($query){

            $query->where('campus_id',$this->campus)
                  ->where('shift_id', $this->shift);

        })->get();
    }

    public function updatedSearch($value)
    {
        $this->students = Score::whereHas('student',function($query){

            $query->where('name','like', '%' . $this->search .'%');

        })->get();
    }

    public function updatedGrade(){
        $this->students = Score::whereHas('score_subject',function($query){

            $query->where('grade','like', '%' . $this->grade .'%');

        })->get();
    }

    public function updatedShift(){
        $this->students = Score::whereHas('student',function($query){

            $query->where('shift_id',$this->shift);

        })->get();
    }



    public function mount(){

        //chain with table student
        $this->students = Score::whereHas('student',function ($query){

            $query->where('shift_id',$this->shift)
                  ->where('campus_id',$this->campus);

        })

        //chain with scores_subject table
        ->whereHas('score_subject',function($query){
            $query->where('grade',$this->grade);

        })
        ->get();
        
    }

    public function render()
    {
        return view('livewire.teacher.tables.students-score');
    }
}
