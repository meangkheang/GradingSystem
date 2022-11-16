<?php

namespace App\Http\Livewire\Teacher\Tables;

use App\Models\RequestStudent;
use App\Models\Student;
use Livewire\Component;
use App\Models\StudentClass;
use Livewire\WithPagination;

class StudentsTable extends Component
{
    use WithPagination;

    public $search = '';
    public $campus_id = '1';
    public $shift_id = '1';
    public $select_class = '';
    public $classes = [];
    public $students = [];


    public function updatedSearch($value){
        $this->search = $value;
        $this->students = Student::search($this->search)
        ->where('shift_id',$this->shift_id)
        ->where('campus_id',$this->campus_id)
        ->get();
    }

    


    public function updated($key, $value)
    {
        if($key == 'select_class')
        {
            $this->select_class = $value;
            // $this->getStudentsByClass($value);
            $this->students = Student::whereHas('student_class',function($query){
                $query->where('class_tag',$this->select_class);
            })->get();

            
        }
        if($key == 'shift_id'){
            $this->students = Student::whereHas('student_class',function($query){
                $query->where('class_tag',$this->select_class);
            })
            ->where('shift_id',$this->shift_id) 
            ->where('campus_id',$this->campus_id)
            ->get(); 
        }
        if($key == 'campus_id'){

            $this->students = Student::whereHas('student_class',function($query){
                $query->where('class_tag',$this->select_class);
            })
            ->where('shift_id',$this->shift_id) 
            ->where('campus_id',$this->campus_id)
            ->get(); 

        
        }

    }
    function getStudentsByClass($class_tag)
    {

        $this->students = Student::whereHas('student_class',function($query) use($class_tag){
            $query->where('class_tag',$class_tag);
        })
        ->get(); 
    }

    public function mount()
    {
        $this->classes = \App\Models\SubjectClass::where('teacher_id',session('user.id'))->get();
        if(count($this->classes) <=0) return ;
        
        $this->select_class = $this->classes->first()->class_tag;

        $this->students = Student::whereHas('student_class',function($query){
            $query->where('class_tag',$this->select_class);
        })->get();
    }

    public function render()
    {
        return view('livewire.teacher.tables.students-table',[
            'students' => Student::search($this->search)
                        ->where('shift_id',$this->shift_id)
                        ->where('campus_id',$this->campus_id)
                        ->simplePaginate(10)
        ]);
    }
}
