<?php

namespace App\Http\Livewire\Admin\Tables;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $users =[];

    //props
    public $search = '';
    public $type = '1';

    public function updatedType()
    {
        $this->users = User::whereHas('usertype',function($query){

            $query->where('type_id',$this->type);

        })->get();
    }

    public function updatedSearch()
    {
        $this->users = User::where('name','like','%' . $this->search . '%')->get();
    }


    //mount
    public function mount()
    {
        $this->users = User::whereHas('usertype',function($query){

            $query->where('type_id',$this->type);

        })->get();
    }

    public function render()
    {
        return view('livewire.admin.tables.users');
    }
}
