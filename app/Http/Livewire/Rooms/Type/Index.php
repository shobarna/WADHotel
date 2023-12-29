<?php

namespace App\Http\Livewire\Rooms\Type;

use App\Models\Facility;
use App\Models\Type;
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
        $type = Type::find($id);

        $type->facilities()->detach();

        $type->delete();

        $this->dispatchBrowserEvent('deleted');
    }

    public function deleteFacility($id)
    {
        $facility = Facility::find($id);

        $facility->types()->detach();

        $facility->delete();

        $this->dispatchBrowserEvent('info', ['message' => 'Berhasil dihapus']);
    }

    public function render()
    {
        $types = Type::all();
        $facilities = Facility::all();

        return view('livewire.rooms.type.index', [
            'types' => $types,
            'facilities' => $facilities,
        ]);
    }
}
