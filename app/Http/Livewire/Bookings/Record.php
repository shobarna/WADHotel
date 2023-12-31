<?php

namespace App\Http\Livewire\Bookings;

use App\Models\Booking;
use App\Models\Guest;
use Livewire\Component;

class Record extends Component
{
    public $search, $byGuest, $byStatus, $startDate, $endDate;

    public function render()
    {
        $bookings = Booking::when($this->search, function ($query) {
            $query->search($this->search);
        })
            ->when($this->byStatus, function ($query) {
                $query->where('status', $this->byStatus);
            })
            ->when($this->byGuest, function ($query) {
                $query->where('guest_id', $this->byGuest);
            })
            ->when($this->startDate && $this->endDate, function ($query) {
                $query->whereBetween('created_at', [$this->startDate, $this->endDate]);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('livewire.bookings.record', [
            'bookings' => $bookings,
            'total' => $bookings->count(),
            'guests' => Guest::all(),
        ]);
    }
}
