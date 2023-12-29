<?php

namespace App\Http\Livewire\Rooms\Type;

use App\Models\Facility;
use App\Models\Type;
use Livewire\Component;

class Create extends Component
{
    public $type = [];
    public $selected = [];

    protected $rules = [
        'type.name' => 'required',
        'type.price' => 'required',
        'type.capacity' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();

        $type = Type::create($this->type);
        if (count($this->selected) > 0) {
            $type->facilities()->attach($this->selected);
        }

        return redirect()->route('rooms.type')->with(['success' => 'Tipe kamar berhasil disimpan!']);
    }

    public $facility = [];

    public function storeFacility()
    {
        $this->validate([
            'facility.name' => 'required',
        ]);

        Facility::insert($this->facility);
    }

    public function render()
    {
        $facilities = Facility::all();
        return view('livewire.rooms.type.create', [
            'facilities' => $facilities,
        ]);
    }
}
