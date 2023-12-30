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
                        <h2 class="text-lg font-medium text-gray-800">Detail pemesanan</h2>
                    </div>
                </div>
                @if ($data->status === 'Booked')
                    <div class="flex items-center gap-x-3">
                        <button wire:click="reschedule"
                            class="flex items-center gap-x-2 rounded-md bg-yellow-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            <span>Reschedule</span>
                        </button>

                        <button wire:click="validationCancel"
                            class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Pembatalan</button>
                    </div>
                @endif
            </div>
            <div class="bg-white rounded-lg shadow-sm">
                <div class="p-6 text-gray-900 space-y-8">
                    <div class="flex justify-between items-start gap-4 mb-8">
                        <div class="space-y-6">
                            <div>
                                <p class="text-sm font-medium leading-6 text-gray-500">Tamu</p>
                                <div class="mt-1">
                                    <p class="font-semibold text-base text-gray-900">
                                        {{ $data->guest->firstname . ' ' . $data->guest->lastname }}
                                    </p>
                                </div>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">{{ $data->guest->phone }}</p>
                                <div class="mt-1">
                                    <p class="font-semibold text-base text-gray-900">
                                        {{ $data->guest->address }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="text-right space-y-4">
                            <div>
                                <p class="text-sm font-medium leading-6 text-gray-500">Nomor Pemesanan</p>
                                <div class="mt-1">
                                    <p class="font-semibold text-base text-gray-900">
                                        B-{{ $data->id }}{{ $data->created_at->format('Ymd') }}
                                    </p>
                                </div>
                            </div>
                            <div>
                                <p class="text-sm font-medium leading-6 text-gray-500">Status</p>
                                <div class="mt-1">
                                    <p
                                        class="font-semibold text-base {{ $data->status === 'Booked' ? 'text-sky-500' : ($data->status === 'Done' ? 'text-green-500' : 'text-red-500') }}">
                                        {{ $data->status }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between w-full border-b pb-4" x-data="{ open: false }">
                        <p class="text-sm font-medium leading-6 text-gray-900">Detail Pemensanan</p>
                    </div>
                    @foreach ($data->rooms as $item)
                        <div class="flex items-center justify-between">
                            <div class="w-full grid grid-cols-5 gap-x-4">
                                <div class="justify-center">
                                    <div class="relative flex items-center gap-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                        </svg>
                                        <div class="text-sm leading-6">
                                            <p class="text-gray-500">Kamar No {{ $item->number }}</p>
                                            <p class="font-semibold text-base text-gray-900">
                                                {{ $item->type->name }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="justify-center">
                                    <div class="relative flex items-center gap-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                        </svg>
                                        <div class="text-sm leading-6">
                                            <p class="text-gray-500">Haga Permalam</p>
                                            <p class="font-semibold text-base text-gray-900">
                                                @currency($item->type->price)
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="justify-center">
                                    <div class="relative flex items-center gap-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                                        </svg>
                                        <div class="text-sm leading-6">
                                            <p class="text-gray-500">Durasi</p>

                                            <p class="font-semibold text-base text-gray-900">
                                                {{ $item->pivot->qty }} Malam
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="justify-center">
                                    <div class="relative flex items-center gap-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                        </svg>
                                        <div class="text-sm leading-6">
                                            <p class="text-gray-500">Check in</p>
                                            <p class="font-semibold text-base text-gray-900">
                                                {{ Carbon::parse($item->pivot->checkin)->format('d F Y') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="justify-center">
                                    <div class="relative flex items-center gap-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                        </svg>
                                        <div class="text-sm leading-6">
                                            <p class="text-gray-500">Check out</p>
                                            <p class="font-semibold text-base text-gray-900">
                                                {{ Carbon::parse($item->pivot->checkout)->format('d F Y') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="pt-6 border-t flex items-center justify-end">
                        @if ($data->status === 'Booked')
                            <button wire:click="checkout"
                                class="flex items-center gap-x-2 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                </svg>
                                Check out</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('validation', event => {
            iziToast.question({
                timeout: 20000,
                close: false,
                overlay: true,
                displayMode: 'once',
                id: 'question',
                zindex: 999,
                title: 'Peringatan!',
                message: 'Apakah anda yakin?',
                position: 'center',
                buttons: [
                    ['<button><b>YA</b></button>', function(instance, toast) {

                        Livewire.emit('confirm');
                        instance.hide({
                            transitionOut: 'fadeOut'
                        }, toast, 'button');

                    }, true],
                    ['<button>TIDAK</button>', function(instance, toast) {

                        instance.hide({
                            transitionOut: 'fadeOut'
                        }, toast, 'button');

                    }],
                ],
                onClosing: function(instance, toast, closedBy) {
                    console.info('Closing | closedBy: ' + closedBy);
                },
                onClosed: function(instance, toast, closedBy) {
                    console.info('Closed | closedBy: ' + closedBy);
                }
            });
        })
    </script>
</div>
