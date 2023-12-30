<?php

namespace App\Http\Livewire\Payments;

use App\Models\Booking;
use App\Models\Payment;
use Livewire\Component;

class Create extends Component
{
    public $payment = [];
    public $return;
    public $rooms = [];

    public function setBooking($bookingId)
    {
        $this->payment = [];
        $this->rooms = [];

        $booking = Booking::find($bookingId);

        $this->payment = [
            'booking_id' => $booking->id,
            'booking_number' => 'P-' . $booking->id . $booking->created_at->format('Ymd'),
            'booking_status' => $booking->status,
            'booking_guest' => $booking->guest->firstname . ' ' . $booking->guest->lastname,
        ];

        foreach ($booking->rooms as $item) {
            $this->rooms[] = [
                'number' => $item->number,
                'type' => $item->type->name,
                'price' => $item->type->price,
                'duration' => $item->pivot->qty,
                'subtotal' => $item->type->price * $item->pivot->qty,
            ];
        }

        $this->payment = array_merge($this->payment, ['total' => array_sum(array_column($this->rooms, 'subtotal'))]);
    }

    public function updatedPaymentAmount()
    {
        $this->return = $this->payment['amount'] - $this->payment['total'];
    }

    protected $rules = [
        'payment.booking_id' => 'required',
        'payment.amount' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();

        $formatedPayment = [
            'booking_id' => $this->payment['booking_id'],
            'subtotal' => $this->payment['total'],
            'amount' => intval($this->payment['amount']),
        ];

        Payment::create($formatedPayment);

        return redirect()->route('payments.index')->with(['success' => 'Pembayaran berhasil!']);
    }

    public function render()
    {
        return view('livewire.payments.create', [
            'bookings' => Booking::where('status', 'Booked')
                ->has('payments', false)
                ->orderBy('created_at', 'asc')
                ->paginate(5),
        ]);
    }
}
