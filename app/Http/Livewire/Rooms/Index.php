<?php

namespace App\Http\Livewire\Rooms;

use App\Models\Room;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $rooms = Room::all();

        return view('livewire.rooms.index', [
            'rooms' => $rooms,
        ]);
    }
}
