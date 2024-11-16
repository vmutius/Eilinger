<?php

namespace App\Livewire;

use Livewire\WithFileUploads;

use Livewire\Component;

class UploadEnclosure extends Component
{
    use WithFileUploads;

    public $enclosure;

    public function save()
    {
        $this->validate([
            'enclosure' => 'image|max:1024', // 1MB Max
        ]);

        $this->photo->store('photos');
    }

    public function render()
    {
        return view('livewire.upload-enclosure');
    }
}
