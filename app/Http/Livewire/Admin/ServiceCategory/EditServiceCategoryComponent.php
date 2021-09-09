<?php

namespace App\Http\Livewire\Admin\ServiceCategory;

use App\Models\ServiceCategory;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class EditServiceCategoryComponent extends Component
{
    use WithFileUploads;
    public $category_id;
    public $name;
    public $slug;
    public $image;
    public $newimage;

    public function mount($category_id)
    {
       $scategory = ServiceCategory::find($category_id);
       $this->category_id = $scategory->id;
       $this->name = $scategory->name;
       $this->slug = $scategory->slug;
       $this->image = $scategory->image;
    }

    public function generateSlug()
    {
       $this->slug = Str::slug($this->name,'-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required'
        ]);

        if($this->newimage)
        {
            $this->validateOnly($fields,[
                'newimage' => 'required|mimes:jpeg,png'
            ]);
        }
    }

    public function updateServiceCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required|mimes:jpeg,png'

            ]);
        }

        $scategory = ServiceCategory::find($this->category_id);
        $scategory->name = $this->name;
        $scategory->slug = $this->slug;
        if($this->newimage)
        {
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('categories',$imageName);
            $scategory->image = $imageName;
        }
        $scategory->save();
        session()->flash('message','Category has been updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.service-category.edit-service-category-component')->layout('layouts.admin');
    }
}
