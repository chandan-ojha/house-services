<?php

namespace App\Http\Livewire\Admin\ServiceCategory;

use App\Models\ServiceCategory;
use Livewire\Component; 
use Livewire\WithPagination;

class ServiceCategoryComponent extends Component
{
    use WithPagination; 
    public function render()
    {
        $scategories = ServiceCategory::paginate(10);
        return view('livewire.admin.service-category.service-category-component',['scategories'=>$scategories])->layout('layouts.admin');
    }
}
