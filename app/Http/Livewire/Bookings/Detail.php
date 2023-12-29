<?php

namespace App\Http\Livewire\Bookings;

use App\Models\Booking;
use Livewire\Component;

class Detail extends Component
{
    public $data;

    protected $listeners = [
        'confirm' => 'cancel'
    ];

    public function validationCancel()
    {
        $this->dispatchBrowserEvent('validation');
    }

    public function cancel()
    {
        $this->data->update(['status' => 'Cancel']);
        $this->dispatchBrowserEvent('info', ['message' => 'Pemesanan telah dibatalkan']);
    }

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
