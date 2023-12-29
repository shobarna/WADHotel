<?php

namespace App\Http\Livewire\Rooms;

use App\Models\Facility;
use App\Models\Room;
use App\Models\Type;
use Livewire\Component;

class Create extends Component
{
    public $room = [];
    public $type;
    public $facilities = [];

    public function updatedRoomTypeId($value)
    {
        $this->type = Type::find($value);
        $this->facilities = $this->type->facilities;
    }

    protected $rules = [
        'room.number' => 'required|max:3|unique:rooms,number',
        'room.type_id' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();

        Room::create($this->room);

        return redirect()->route('rooms.index')->with(['success' => 'Kamar baru berhasil ditambahkan']);
    }

    public function render()
    {
        return view('livewire.rooms.create', [
            'types' => Type::all(),
            // 'facilities' => Facility::all(),
        ]);
    }
}
