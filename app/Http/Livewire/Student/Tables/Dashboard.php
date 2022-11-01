<?php

namespace App\Http\Livewire\Student\Tables;

use Livewire\Component;
use App\Models\StudentClass;

class Dashboard extends Component
{
    public $classes = [];

    public function mount()
    {
        $this->classes = StudentClass::where('student_id', session('user.student.id'))->get();
    }

    public function RedirectToJoinClassRoute( ){
        
        return redirect()->route('user.class.index');
    }

    public function render()
    {
        return view('livewire.student.tables.dashboard');
    }
}
