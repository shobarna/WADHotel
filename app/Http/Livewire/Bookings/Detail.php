<?php

namespace App\Http\Livewire\Bookings;

use App\Models\Booking;
use App\Models\Room;
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

    public function reschedule()
    {
        foreach ($this->data->rooms as $item) {
            Room::find($item->id)->update(['status' => 0]);
        }
        $this->data->update(['status' => 'Reschedule']);
        return redirect()->route('bookings.update', ['id' => $this->data->id])->with(['success' => 'Pemesanan berhasil reschedule!']);
    }

    public function cancel()
    {
        foreach ($this->data->rooms as $item) {
            Room::find($item->id)->update(['status' => 0]);
        }
        $this->data->update(['status' => 'Cancel']);
        $this->dispatchBrowserEvent('info', ['message' => 'Pemesanan telah dibatalkan']);
    }

    public function checkout()
    {
        foreach ($this->data->rooms as $item) {
            Room::find($item->id)->update(['status' => 0]);
        }
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
