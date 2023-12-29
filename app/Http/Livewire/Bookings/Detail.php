<?php

namespace App\Http\Livewire\Bookings;

use App\Models\Booking;
use Livewire\Component;

class Detail extends Component
{
    public $data;

    public function checkout()
    {
        $this->data->update(['status' => 'Done']);
        $this->dispatchBrowserEvent('success', ['message' => 'Berhasil Check out']);
    }

    public function mount($id)
    {
        $this->data = Booking::find($id);
    }

    public function render()
    {
        return view('livewire.bookings.detail');
    }
}
