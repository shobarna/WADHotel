<?php

namespace App\Http\Livewire\Guests;

use App\Models\Guest;
use Livewire\Component;

class Update extends Component
{
    public $guestId;
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

    public function update()
    {
        $this->validate();

        Guest::find($this->guestId)->update($this->guest);

        return redirect()->route('guests.index')->with(['updated' => 'Data tamu berhasil diubah']);
    }

    public function mount($id)
    {
        $this->guestId = $id;
        $data = Guest::find($id);
        $this->guest = [
            'firstname' => $data->firstname,
            'lastname' => $data->lastname,
            'phone' => $data->phone,
            'email' => $data->email ?? '',
            'address' => $data->address,
        ];
    }

    public function render()
    {
        return view('livewire.guests.update');
    }
}
