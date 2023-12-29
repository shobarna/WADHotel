<?php

namespace App\Http\Livewire\Guests;

use App\Models\Guest;
use Livewire\Component;

class Create extends Component
{
    public $guest = [];

    protected $rules = [
        'guest.firstname' => 'required',
        'guest.lastname' => 'required',
        'guest.phone' => 'required|max:13',
        'guest.address' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();

        Guest::create($this->guest);

        return redirect()->route('guests.index')->with(['success' => 'Tamu baru berhasil ditambahkan']);
    }

    public function render()
    {
        return view('livewire.guests.create');
    }
}
