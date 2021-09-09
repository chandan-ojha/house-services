<?php

namespace App\Http\Livewire\Admin\ServiceCategory;

use App\Models\ServiceCategory;
use Livewire\Component; 
use Livewire\WithPagination;

class ServiceCategoryComponent extends Component
{
    use WithPagination; 

    public function deleteServiceCategory($id)
    {
      $scategory = ServiceCategory::find($id);
      if($scategory->image)
      {
          unlink('images/categories'.'/'.$scategory->image);
      }
      $scategory->delete();
      session()->flash('message','Service category has been deleted successfully!');
    }

    public function render()
    {
        $scategories = ServiceCategory::paginate(10);
        return view('livewire.admin.service-category.service-category-component',['scategories'=>$scategories])->layout('layouts.admin');
    }
}
