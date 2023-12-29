<?php

namespace App\Http\Livewire\Rooms\Type;

use App\Models\Type;
use Livewire\Component;
use App\Models\Facility;

class Update extends Component
{
    public $typeId;
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

    public function update()
    {
        $this->validate();

        try {
            $type = Type::find($this->typeId);
            $type->update($this->type);
            $type->facilities()->sync($this->selected);

            return redirect()->route('rooms.type')->with(['updated' => 'Tipe kamar berhasil diubah!']);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('error', ['message' => 'Ada yang salah']);
        }
    }

    public $facility = [];

    public function storeFacility()
    {
        $this->validate([
            'facility.name' => 'required',
        ]);

        Facility::insert($this->facility);
    }

    public function mount($id)
    {
        $this->typeId = $id;
        $data = Type::find($id);

        $this->type = [
            'name' => $data->name,
            'price' => $data->price,
            'capacity' => $data->capacity,
            'desc' => $data->desc,
        ];

        $this->selected = $data->facilities->pluck('id')->toArray();
    }

    public function render()
    {
        return view('livewire.rooms.type.update', [
            'facilities' => Facility::all(),
        ]);
    }
}
