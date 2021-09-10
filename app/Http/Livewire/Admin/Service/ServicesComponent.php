<?php

namespace App\Http\Livewire\Admin\Service;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class ServicesComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $services = Service::paginate(10);
        return view('livewire.admin.service.services-component',['services'=> $services ])->layout('layouts.admin');
    }
}
