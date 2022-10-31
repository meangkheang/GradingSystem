<?php

namespace App\Http\Livewire\Student\Tables;

use Livewire\Component;

class Dashboard extends Component
{
    public function RedirectToJoinClassRoute( ){
        
        return redirect()->route('user.class.index');
    }

    public function render()
    {
        return view('livewire.student.tables.dashboard');
    }
}
