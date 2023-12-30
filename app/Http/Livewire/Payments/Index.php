<?php

namespace App\Http\Livewire\Payments;

use App\Models\Guest;
use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search, $byGuest;

    public function render()
    {
        $payments = Payment::when($this->byGuest, function ($query) {
            $query->whereHas('booking', function ($subQuery) {
                $subQuery->where('guest_id', $this->byGuest);
            });
        })->when($this->byGuest, function ($query) {
            $query->whereHas('booking', function ($subQuery) {
                $subQuery->where('guest_id', $this->byGuest);
            });
        })->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('livewire.payments.index', [
            'payments' => $payments,
            'guests' => Guest::all(),
            'total' => Payment::count(),
            'earnings' => Payment::sum('subtotal'),
        ]);
    }
}
