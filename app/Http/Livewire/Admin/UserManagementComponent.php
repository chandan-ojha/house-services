<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserManagementComponent extends Component
{
    use WithPagination; 
    public function render()
    {
        $users = User::paginate(15);
        return view('livewire.admin.user-management-component',['users'=>$users])->layout('layouts.admin');
    }
}
