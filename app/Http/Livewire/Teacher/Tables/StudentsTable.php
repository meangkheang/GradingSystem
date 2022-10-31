<?php

namespace App\Http\Livewire\Teacher\Tables;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentsTable extends Component
{
    use WithPagination;

    public $search = '';
    public $campus_id = '1';
    public $shift_id = '1';

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
