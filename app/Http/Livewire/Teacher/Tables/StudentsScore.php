<?php

namespace App\Http\Livewire\Teacher\Tables;

use App\Models\Score;
use App\Models\SubjectClass;
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

        })
        ->whereHas('class',function($query){
            $query->where('class_tag',$this->class_tag());
        })
        ->get();
    }

    public function updatedSearch($value)
    {
        $this->students = Score::whereHas('student',function($query){

            $query->where('name','like', '%' . $this->search .'%');

        })
        ->whereHas('class',function($query){
            $query->where('class_tag',$this->class_tag());
        })
        ->get();
    }

    public function updatedGrade(){
        $this->students = Score::whereHas('score_subject',function($query){

            $query->where('grade','like', '%' . $this->grade .'%');

        })
        ->whereHas('class',function($query){
            $query->where('class_tag',$this->class_tag());
        })
        ->get();
    }

    public function updatedShift(){
        $this->students = Score::whereHas('class',function($query){

            $query->where('shift_id',$this->shift);

        })->get();
    }


    public function class_tag(){
        return $class = SubjectClass::where('teacher_id',session('user.id'))->first()->class_tag;
    }
    public function mount(){

        //chain with table student
        $class = SubjectClass::where('teacher_id',session('user.id'))->first();
        $this->shift = $class->shift_id; 
        $this->students = Score::where('class_tag',$this->class_tag())->get();
    }

    public function render()
    {
        return view('livewire.teacher.tables.students-score');
    }
}
