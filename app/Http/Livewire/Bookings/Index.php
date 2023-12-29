<?php

namespace App\Http\Livewire\Bookings;

use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    protected $listeners = [
        'confirm' => 'delete'
    ];

    public function validationDelete($id)
    {
        $this->dispatchBrowserEvent('validation', [
            'id' => $id
        ]);
    }

    public function delete($id)
    {
        $booking = Booking::find($id);

        $booking->rooms()->detach();

        $booking->delete();

        $this->dispatchBrowserEvent('deleted');
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
        // $available = Booking::where('status', 0)->count();

        return view('livewire.bookings.index', [
            'bookings' => $bookings,
            'total' => $total,
        ]);
    }
}
