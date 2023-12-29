<?php

namespace App\Http\Livewire\Guests;

use App\Models\Guest;
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
        $type = Guest::find($id);

        $type->delete();

        $this->dispatchBrowserEvent('deleted');
    }

    use WithPagination;
    public $search;

    public function render()
    {
        $guests = Guest::when($this->search, function ($query) {
            $query->search($this->search);
        })
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('livewire.guests.index', [
            'guests' => $guests,
        ]);
    }
}
