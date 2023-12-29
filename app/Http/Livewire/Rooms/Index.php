<?php

namespace App\Http\Livewire\Rooms;

use App\Models\Room;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = [
        'confirm' => 'delete',
        'confirmBulk' => 'deleteSelected'
    ];

    public function validationDelete($id)
    {
        $this->dispatchBrowserEvent('validation', [
            'id' => $id
        ]);
    }

    public function delete($id)
    {
        $type = Room::find($id);

        $type->delete();

        $this->dispatchBrowserEvent('deleted');
    }


    public function render()
    {
        $rooms = Room::all();

        return view('livewire.rooms.index', [
            'rooms' => $rooms,
        ]);
    }
}
