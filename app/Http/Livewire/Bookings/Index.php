<?php

namespace App\Http\Livewire\Bookings;

use App\Models\Room;
use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    protected $listeners = [
        'confirmReschedule' => 'reschedule',
        'confirmCancel' => 'cancel',
    ];

    public function validationReschedule($id)
    {
        $this->dispatchBrowserEvent('validationReschedule');
    }

    public function validationCancel($id)
    {
        $this->dispatchBrowserEvent('validationCancel');
    }

    public function reschedule($id)
    {
        $booking = Booking::find($id);
        foreach ($booking->rooms as $item) {
            Room::find($item->id)->update(['status' => 0]);
        }
        $booking->update(['status' => 'Reschedule']);
        return redirect()->route('bookings.update', ['id' => $booking->id])->with(['success' => 'Pemesanan berhasil reschedule!']);
    }

    public function cancel($id)
    {
        $booking = Booking::find($id);
        foreach ($booking->rooms as $item) {
            Room::find($item->id)->update(['status' => 0]);
        }
        $booking->update(['status' => 'Cancel']);
        $this->dispatchBrowserEvent('info', ['message' => 'Pemesanan telah dibatalkan']);
    }

    use WithPagination;
    public $search, $byStatus;

    public function render()
    {
        $bookings = Booking::when($this->search, function ($query) {
            $query->whereHas('guest', function ($query) {
                $query->where('firstname', 'like', "%{$this->search}%")->orWhere('lastname', 'like', "%{$this->search}%");
            });
        })->when($this->byStatus, function ($query) {
            $query->where('status', $this->byStatus);
        })
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $total = Booking::count();
        $done = Booking::where('status', 'Done')->count();

        return view('livewire.bookings.index', [
            'bookings' => $bookings,
            'total' => $total,
            'done' => $done,
        ]);
    }
}
