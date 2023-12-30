@php
    use Illuminate\Support\Carbon;
@endphp
<div>
    <div class="py-12" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div class="flex items-center gap-x-4">
                    <a href="{{ route('bookings.index') }}" class="flex items-center text-sky-500 drop-shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                        </svg>
                    </a>
                    <div>
                        <h2 class="text-lg font-medium text-gray-800">Formulir pembayaran</h2>

                        <p class="mt-1 text-sm text-gray-500">Kolom input <span class="text-red-600">*</span> bermakna
                            wajib
                            terisi
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm">
                <div class="p-6 text-gray-900 space-y-8">
                    <div class="flex justify-between items-start gap-4 mb-8">
                        <div class="space-y-4">
                            <div>
                                <p class="block text-sm font-medium leading-6 text-gray-900">No Pemesanan<span
                                        class="text-red-600">*</span></p>
                                <div class="mt-2">
                                    <button x-on:click="$dispatch('open-modal', 'roomList')"
                                        class="flex items-center justify-between w-[30vh] rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @if (!isset($payment['booking_number']))
                                            <span>Pilih pemesanan</span>
                                        @else
                                            <span>{{ $payment['booking_number'] }}</span>
                                        @endif
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="w-4 h-4">
                                            <path fill-rule="evenodd"
                                                d="M10 5a.75.75 0 01.75.75v6.638l1.96-2.158a.75.75 0 111.08 1.04l-3.25 3.5a.75.75 0 01-1.08 0l-3.25-3.5a.75.75 0 111.08-1.04l1.96 2.158V5.75A.75.75 0 0110 5z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    @error('payment.booking_id')
                                        <p class="text-sm leading-6 text-red-600">
                                            Tidak boleh kosong
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <p class="text-sm font-medium leading-6 text-gray-500">Status</p>
                                <div class="mt-1">
                                    @if (isset($payment['booking_status']))
                                        <p
                                            class="font-semibold text-base {{ $payment['booking_status'] === 'Booked' ? 'text-sky-500' : ($payment['booking_status'] === 'Done' ? 'text-green-500' : 'text-red-500') }}">
                                            {{ $payment['booking_status'] }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="text-right space-y-4">
                            <div>
                                <p class="text-sm font-medium leading-6 text-gray-500">Tamu</p>
                                <div class="mt-1">
                                    <p class="font-semibold text-base text-gray-900">
                                        {{ $payment['booking_guest'] ?? '' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between w-full border-b pb-4" x-data="{ open: false }">
                        <legend class="text-sm font-medium leading-6 text-gray-900">Detail pemesanan</legend>
                    </div>
                    @forelse ($rooms as $item)
                        <div class="flex items-center justify-between">
                            <div class="w-full grid grid-cols-4 justify-items-stretch gap-x-4">
                                <div class="justify-center">
                                    <div class="relative flex items-center gap-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                        </svg>
                                        <div class="text-sm leading-6">
                                            <p class="text-gray-500">Kamar No {{ $item['number'] }}</p>
                                            <p class="font-semibold text-base text-gray-900">
                                                {{ $item['type'] }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="justify-self-center">
                                    <div class="relative flex items-center gap-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                        </svg>
                                        <div class="text-sm leading-6">
                                            <p class="text-gray-500">Haga Permalam</p>
                                            <p class="font-semibold text-base text-gray-900">
                                                @currency($item['price'])
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="justify-self-center">
                                    <div class="relative flex items-center gap-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                                        </svg>
                                        <div class="text-sm leading-6">
                                            <p class="text-gray-500">Durasi</p>

                                            <p class="font-semibold text-base text-gray-900">
                                                {{ $item['duration'] }} Malam
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="justify-self-end">
                                    <div class="relative flex items-center gap-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 12a2.25 2.25 0 00-2.25-2.25H15a3 3 0 11-6 0H5.25A2.25 2.25 0 003 12m18 0v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9m18 0V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v3" />
                                        </svg>
                                        <div class="text-sm leading-6">
                                            <p class="text-gray-500">Subtotal</p>

                                            <p class="font-semibold text-base text-gray-900">
                                                @currency($item['subtotal'])
                                            </p>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @empty
                        <div class="w-full text-gray-600 text-sm text-center">
                            Belum ada pemesanan yang di pilih
                        </div>
                    @endforelse
                    <div class="pt-4 border-t text-right space-y-4">
                        <div>
                            <p class="text-sm font-medium leading-6 text-gray-500">Total</p>
                            <div class="mt-1">
                                <p class="font-semibold text-base text-gray-900">
                                    @if (isset($payment['total']))
                                        @currency($payment['total'])
                                    @else
                                        0
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm font-medium leading-6 text-gray-500">Amount</p>
                            <div class="mt-1 flex justify-end">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md mt-2">
                                    <span
                                        class="flex select-none items-center text-center pl-3 text-gray-500 sm:text-sm">Rp.
                                    </span>
                                    <input type="number" id="amount" wire:model="payment.amount"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                        </div>
                        @error('payment.amount')
                            <p class="text-sm leading-6 text-red-600">
                                Tidak boleh kosong
                            </p>
                        @enderror
                        <div>
                            <p class="text-sm font-medium leading-6 text-gray-500">Kembali</p>
                            <div class="mt-1">
                                <p class="font-semibold text-base text-gray-900">
                                    @currency($return)
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4 flex items-center justify-end">
                        <button type="submit" wire:click="store"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-modal name="roomList">
        <h3 class="mb-4 text-lg font-medium leading-6 text-gray-800 capitalize" id="modal-title">
            Daftar kamar yang tersedia
        </h3>
        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="w-full table-auto text-sm text-left">
                <thead class="bg-gray-50 text-gray-600 font-medium border-b">
                    <tr>
                        <th class="py-3 px-6 text-xs font-semibold text-black uppercase tracking-wider">
                            Nomor</th>
                        <th class="py-3 px-6 text-xs font-semibold text-black uppercase tracking-wider">
                            Tamu</th>
                        <th
                            class="py-3 px-6 text-xs font-semibold text-black uppercase tracking-wider whitespace-nowrap">
                            Tipe kamar</th>
                        <th class="py-3 px-6 text-xs font-semibold text-black uppercase tracking-wider">
                            Duration</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 divide-y">
                    @forelse ($bookings as $item)
                        <tr class="">
                            <td class="px-6 py-4 whitespace-nowrap">
                                B-{{ $item->id }}{{ $item->created_at->format('Ymd') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $item->guest->firstname }} {{ $item->guest->lastname }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $item->rooms[0]->type->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $item->duration }} Malam
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button wire:click="setBooking({{ $item->id }})" x-on:click="show = false"
                                    class="px-1 py-2 rounded flex items-center gap-x-1 text-xs transition duration-300 text-blue-500 hover:bg-blue-100 hover:shadow">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                    Pilih
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">
                                <div class="text-center bg-grey-50 py-4">
                                    Tidak ada data yang tersedia
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="px-2 py-4">
                {{ $bookings->links() }}
            </div>
        </div>
    </x-modal>

    @include('validation')
</div>
