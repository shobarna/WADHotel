<?php

namespace App\Http\Livewire\Discount;

use App\Models\Discount;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = [
        'confirm' => 'delete',
    ];

    public function validationDelete($id)
    {
        $this->dispatchBrowserEvent('validation', [
            'id' => $id
        ]);
    }

    public function delete($id)
    {
        $room = Discount::find($id);

        $room->delete();

        $this->dispatchBrowserEvent('deleted');
    }

    public $discount = [];

    public function generate($length = 10)
    {
        $chars = array_merge(range('a', 'z'), range('0', '9'));

        $shortCode = [];

        for ($i = 0; $i < $length; $i++) {
            $char = $chars[array_rand($chars)];

            $shortCode[] = $char;
        }
        $this->discount = array_merge($this->discount, ['code' => implode('', $shortCode)]);
    }

    protected $rules = [
        'discount.title' => 'required',
        'discount.code' => 'required',
        'discount.price' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();

        Discount::create($this->discount);

        $this->discount = [];

        $this->dispatchBrowserEvent('success', ['message' => 'Discount baru telah dibuat']);
    }

    public function render()
    {
        return view('livewire.discount.index', [
            'discounts' => Discount::all(),
        ]);
    }
}
