<?php

namespace App\Livewire\User;

use App\Models\Application;
use App\Models\Enclosure;
use App\View\Components\Layout\UserDashboard;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;
use Livewire\WithFileUploads;

class Datei extends Component
{
    use WithFileUploads;
    public $showModal = false;

    public $enclosures;

    public $applications;

    public $name;

    public $UserName;

    public $application_id;

    public $column;

    public $file;

    public $columns = [];

    public $enclosure;
    protected function rules(): array
    {
        return [
            'application_id' => 'required',
            'column' => 'required',
            'file' => 'required',
        ];
    }

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount()
    {
        $this->applications = Application::with('enclosures')->LoggedInUser()->get();

        $lastname = auth()->user()->lastname;
        $firstname = auth()->user()->firstname;
        $this->UserName = $lastname . '_' . $firstname;
    }

    public function render()
    {
        return view('livewire.user.datei')
            ->layout(UserDashboard::class);
    }

    public function addEnclosure()
    {
        $this->showModal = true;
    }

    public function saveEnclosure()
    {
        $this->validate();
        $column = $this->column;
        $file = $this->file;
        $fileName = 'Appl' . $this->application_id . '_' . $column . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs($this->UserName, $fileName, 'uploads');
        $this->enclosure->$column = $filePath;
        $this->enclosure->application_id = $this->application_id;
        ray($this->enclosure);
        $this->enclosure->save();

        $this->application_id = '';
        $this->column = '';
        $this->file = '';

        $this->showModal = false;
        $this->dispatch('fileUploaded');
    }

    public function updatedApplicationId($application_id)
    {
        $this->enclosure = Enclosure::where('application_id', $application_id)->first() ?? new Enclosure;;
        if ($this->enclosure) {

            $this->columns = Schema::getColumnListing($this->enclosure->getTable());
        } else {
            $this->columns = [];
        }
    }

    public function close()
    {
        $this->application_id = '';
        $this->column = '';
        $this->file = '';

        $this->showModal = false;
    }
}
