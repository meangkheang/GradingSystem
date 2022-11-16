<?php

namespace App\Http\Livewire\Teacher\Tables;

use App\Models\Score;
use App\Models\SubjectClass;
use Livewire\Component;

class StudentsScore extends Component
{
    public $students = []; 
    public $classes = [];
    public $select_class = '' ;
    public $shift = '1';
    public $grade = 'A';
    public $search = '';
    public $campus = '1';


    public $users= [];

    public function updated($key, $value)
    {
        if($key == 'select_class')
        {
            $this->select_class =  $value;
            $this->filterScoresByClass($this->select_class);
        }
    }   
    function filterScoresByClass($class_tag): void {

        $this->students = Score::whereHas('student',function($query){
            $query->where('campus_id',$this->campus);
        })
        ->where('class_tag',$class_tag)
        ->get();
    }

    public function updatedCampus($value)
    {
        $this->students = Score::whereHas('student',function($query){
            $query->where('campus_id',$this->campus);
        })
        ->where('class_tag',$this->select_class)
        ->get();
    }

    public function updatedSearch($value)
    {
        $this->students = Score::whereHas('student',function($query){
            $query->where('name','like', '%' . $this->search .'%');
        })
        ->where('class_tag',$this->select_class)
        ->get();
    }

    public function updatedGrade(){
        $this->students = Score::whereHas('score_subject',function($query){
            $query->where('grade','like', '%' . $this->grade .'%');
        })
        ->whereHas('student',function($query){
            $query->where('campus_id',$this->campus);
            $query->where('shift_id',$this->shift);
        })
        ->where('class_tag',$this->select_class)
        ->get();
    }

    public function updatedShift(){
        $this->students = Score::whereHas('class',function($query){
            $query->where('shift_id',$this->shift);
        })
        // ->whereHas('student',function($query){
        //     $query->where('campus_id',$this->campus);
        // })   
        ->where('class_tag',$this->select_class)
        ->get();
    }


    public function class_tag(){

        $result = SubjectClass::where('teacher_id',session('user.id'))->first();
        
        if($result != null){
            return $result->class_tag;
        }
        return 0;
    }
    public function mount(){

        if($this->class_tag() == 0) return;

        $this->loadClass();


        //chain with table student
        $class = SubjectClass::where('teacher_id',session('user.id'))->first();
        $this->shift = $class->shift_id; 
        $this->students = Score::where('class_tag',$this->class_tag())->get();
    }
    public function loadClass(){
        $this->classes = SubjectClass::where('teacher_id',session('user.id'))->get();
        
        $this->select_class = $this->class_tag();
    }

    public function render()
    {
        return view('livewire.teacher.tables.students-score');
    }
}
