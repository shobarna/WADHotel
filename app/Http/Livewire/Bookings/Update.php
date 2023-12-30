<?php

namespace App\Http\Livewire\Bookings;

use App\Models\Room;
use App\Models\Guest;
use App\Models\Booking;
use Livewire\Component;
use Illuminate\Support\Carbon;

class Update extends Component
{
    public $booking = [];
    public $duration;
    public $rooms = [];

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

        if (count($this->rooms) > 0) {
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

            foreach ($this->rooms as $item) {
                Room::find($item['room_id'])->update(['status' => 1]);
            }

            return redirect()->route('bookings.index')->with(['success' => 'Pemesanan berhasil reschedule!']);
        } else {
            $this->dispatchBrowserEvent('info', ['message' => 'Masukan data kamar']);
        }
    }

    public $data;

    public function mount($id)
    {
        $this->data = Booking::find($id);

        if ($this->data->status !== 'Reschedule') {
            return redirect()->route('bookings.index')->with(['info' => 'Pemesanan tidak sesuai!']);
        } else {
            $this->booking = [
                'guest_id' => $this->data->guest_id,
            ];

            foreach ($this->data->rooms as $item) {
                $this->rooms[] = [
                    'room_id' => $item->id,
                    'number' => $item->number,
                    'type' => $item->type->name,
                    'price' => $item->type->price,
                    'qty' => $item->pivot->qty,
                    'checkin' => $item->pivot->checkin,
                    'checkout' => $item->pivot->checkout,
                ];
            }
        }
    }

    public function render()
    {
        return view('livewire.bookings.update', [
            'guests' => Guest::all(),
            'allRooms' => Room::where('status', 0)->orderBy('created_at', 'asc')
                ->paginate(5),
        ]);
    }
}
