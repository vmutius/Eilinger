<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ToogleDraft extends Component
{
    public Model $model;
    public bool $is_draft;

    public function mount()
    {
        $this->is_draft = (bool) $this->model->getAttribute('is_draft');
    }

    public function render()
    {
        return view('livewire.toogle-draft');
    }

    public function updating($name, $value)
    {
        $this->model->setAttribute($name, $value)->save();
        $this->emit('draftToggled', $value);
    } 
}