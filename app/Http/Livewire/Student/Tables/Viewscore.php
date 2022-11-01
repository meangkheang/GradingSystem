<?php

namespace App\Http\Livewire\Student\Tables;

use App\Models\StudentClass;
use Livewire\Component;

class Viewscore extends Component
{

    public $subjects = [];
    public function mount()
    {
        $this->subjects = StudentClass::where('student_id',session('user.student.id'))->get();
    }
    public function render()
    {
        return view('livewire.student.tables.viewscore');
    }
}
