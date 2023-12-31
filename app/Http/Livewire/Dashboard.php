<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use App\Models\Guest;
use App\Models\Payment;
use App\Models\Room;
use Livewire\Component;
use Illuminate\Support\Carbon;

class Dashboard extends Component
{
    public function link($state)
    {
        switch ($state) {
            case 'payment':
                return redirect()->route('payments.index');
                break;
            case 'booking':
                return redirect()->route('bookings.index');
                break;
            case 'guest':
                return redirect()->route('guests.index');
                break;
            case 'room':
                return redirect()->route('rooms.index');
                break;
        }
    }

    public function render()
    {
        return view('livewire.dashboard', [
            'booking' => Booking::all()->count(),
            'payment' => Payment::sum('total'),
            'payments' => Payment::whereMonth('created_at', Carbon::now()->month)
                ->limit(5)
                ->orderBy('created_at', 'desc')
                ->get(),
            'guest' => Guest::all()->count(),
            'room' => Room::all()->count(),
            'bookings' => Booking::limit(5)->orderBy('created_at', 'desc')->get(),
        ]);
    }
}
