<?php

namespace App\Http\Livewire\Antrag;

use App\Models\Country;
use Livewire\Component;

class UserJurForm extends Component
{
    public $user;
    public $countries;

    protected $rules = [
        'user.name_inst' => 'required',
        'user.phone_inst' => 'required',
        'user.email_inst' => 'required',
        'user.website' => 'required',
        'user.firstname' => 'required',
        'user.lastname' => 'required',
        'user.email' => 'required|email|unique:users,email',
        'user.salutation' => 'nullable',
        'user.phone' => 'nullable',
        'user.mobile' => 'nullable',
        'user.contact_aboard' => 'sometimes',
    ];

    public function mount()
    {
        $this->user = auth()->user();
        $this->countries = Country::all();
    }

    public function render()
    {
        return view('livewire.antrag.user-jur-form');
    }

    public function saveUserJur()
    {
        $this->validate(); 
        $this->user->is_draft = false;
        $this->user->save();
        session()->flash('success', 'Benutzerdaten aktualisiert.');
    }
}
