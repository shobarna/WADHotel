<?php

namespace App\Http\Livewire\Rooms;

use App\Models\Room;
use App\Models\Type;
use Livewire\Component;
use Livewire\WithPagination;

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
        $room = Room::find($id);

        $room->delete();

        $this->dispatchBrowserEvent('deleted');
    }

    use WithPagination;
    public $search, $byType, $byStatus;

    public function render()
    {
        $rooms = Room::when($this->search, function ($query) {
            $query->search($this->search);
        })->when($this->byType, function ($query) {
            $query->where('type_id', $this->byType);
        })->when($this->byStatus, function ($query) {
            $query->where('status', $this->byStatus);
        })
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $total = Room::count();
        $available = Room::where('status', 0)->count();

        return view('livewire.rooms.index', [
            'rooms' => $rooms,
            'types' => Type::all(),
            'total' => $total,
            'available' => $available,
        ]);
    }
}
