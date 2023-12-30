<?php

namespace App\Http\Livewire\Payments;

use App\Models\Payment;
use Livewire\Component;

class Detail extends Component
{
    public $data, $rooms = [], $total, $return;

    public function mount($id)
    {
        $this->data = Payment::find($id);

        foreach ($this->data->booking->rooms as $item) {
            $this->rooms[] = [
                'number' => $item->number,
                'type' => $item->type->name,
                'price' => $item->type->price,
                'duration' => $item->pivot->qty,
                'subtotal' => $item->type->price * $item->pivot->qty,
            ];
        }
        $this->total = array_sum(array_column($this->rooms, 'subtotal'));
    }

    public function render()
    {
        return view('livewire.payments.detail');
    }
}
