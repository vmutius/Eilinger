<?php

namespace App\Livewire;

use Livewire\Component;

class IncreaseStep extends Component
{
    public $currentStep = 1;


    public function increaseStep()
    {
        ray('increaseSteo aus Component');
        $this->currentStep++;
    }


    public function render()
    {
        ray($this);
        return view('livewire.increase-step');
    }
}
