<?php

namespace App\Http\Livewire\Rooms\Type;

use App\Models\Facility;
use Livewire\Component;

class Create extends Component
{
    public $facilities;

    public function mount()
    {
        $this->facilities = Facility::all();
    }

    public function render()
    {
        return view('livewire.rooms.type.create');
    }
}
