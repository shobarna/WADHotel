<?php

namespace App\Http\Livewire\Rooms;

use App\Models\Room;
use App\Models\Type;
use Livewire\Component;

class Update extends Component
{
    public $roomId;
    public $type;
    public $room = [];
    public $facilities = [];

    public function updatedRoomTypeId($value)
    {
        $this->type = Type::find($value);
        $this->facilities = $this->type->facilities;
    }

    protected $rules = [
        'room.number' => 'required|max:3',
        'room.type_id' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        try {
            $room = Room::find($this->roomId);
            $room->update($this->room);

            return redirect()->route('rooms.index')->with(['updated' => 'kamar berhasil diubah!']);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('error', ['message' => 'Ada yang salah']);
        }
    }

    public function mount($id)
    {
        $this->roomId = $id;
        $data = Room::find($id);

        $this->room = [
            'number' => $data->number,
            'type_id' => $data->type_id,
        ];

        $this->type = Type::find($this->room['type_id']);
        $this->facilities = $this->type->facilities;
    }

    public function render()
    {
        return view('livewire.rooms.update', [
            'types' => Type::all(),
        ]);
    }
}
