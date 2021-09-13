<?php

namespace App\Http\Livewire\Sprovider\Profile;

use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SproviderProfileComponent extends Component
{
    public function render()
    {
        $sprovider = ServiceProvider::where('user_id',Auth::user()->id)->first();
        return view('livewire.sprovider.profile.sprovider-profile-component',['sprovider'=>$sprovider])->layout('layouts.base');
    }
}
