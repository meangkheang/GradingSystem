<?php

namespace App\Http\Livewire\Tables;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentsTable extends Component
{
    use WithPagination;

    public $search = '';
    public $campus = '1';
    public $shift_id = '1';

    public function render()
    {
        return view('livewire.tables.students-table',[
            'students' => Student::search($this->search)
                        ->where('shift_id',$this->shift_id)
                        ->simplePaginate(10)
        ]);
    }
}
