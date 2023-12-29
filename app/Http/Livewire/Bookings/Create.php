<?php

namespace App\Http\Livewire\Bookings;

use App\Models\Booking;
use App\Models\Guest;
use App\Models\Room;
use Carbon\Carbon;
use Livewire\Component;

class Create extends Component
{
    public $booking = [];
    public $duration;
    public $rooms = [];
    public $allRooms = [];

    public function selectRoom($roomId)
    {
        $data = Room::find($roomId);
        if (!in_array($roomId, array_column($this->rooms, 'room_id'))) {
            $this->rooms[] = [
                'room_id' => $roomId,
                'number' => $data->number,
                'type' => $data->type->name,
                'price' => $data->type->price,
                'qty' => 1,
                'checkin' => Carbon::now()->format('Y-m-d'),
                'checkout' => Carbon::now()->addDays(1)->format('Y-m-d'),
            ];
        } else {
            $this->dispatchBrowserEvent('info', ['message' => 'Data sudah ada']);
        }
    }

    public function unsetRoom($index)
    {
        unset($this->rooms[$index]);
        $this->rooms = array_values($this->rooms);
    }

    protected $rules = [
        'booking.guest_id' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();

        $booking = Booking::create([
            'guest_id' => $this->booking['guest_id'],
            'status' => 'Booked',
            'duration' => max(array_column($this->rooms, 'qty')),
        ]);

        $formattedRooms = [];
        foreach ($this->rooms as $item) {
            $formattedRooms[] = [
                'room_id' => $item['room_id'],
                'qty' => $item['qty'],
                'checkin' => $item['checkin'],
                'checkout' => $item['checkout'],
            ];
        }

        $booking->rooms()->attach($formattedRooms);
    }

    public function mount()
    {
        $this->allRooms = Room::where('status', 0)->get();
    }

    public function render()
    {
        return view('livewire.bookings.create', [
            'guests' => Guest::all(),
        ]);
    }
}
