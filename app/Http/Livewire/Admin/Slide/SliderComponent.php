<?php

namespace App\Http\Livewire\Admin\Slide;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithPagination;

class SliderComponent extends Component
{
    use WithPagination;

    public function deleteSlide($slide_id)
    {
       $slide = Slider::find($slide_id);
       unlink('images/slider/' .$slide->image);
       $slide->delete();
       session()->flash('message','Slide has been deleted successfully !');
    }
    public function render()
    {
        $slides = Slider::paginate(10);
        return view('livewire.admin.slide.slider-component',['slides'=>$slides])->layout('layouts.admin');
    }
}
