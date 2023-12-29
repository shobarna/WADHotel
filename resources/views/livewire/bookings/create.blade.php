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
                        <h2 class="text-lg font-medium text-gray-800">Formulir pemesanan</h2>

                        <p class="mt-1 text-sm text-gray-500">Kolom input <span class="text-red-600">*</span> bermakna
                            wajib
                            terisi
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm">
                <div class="p-6 text-gray-900 space-y-8">
                    <div class="grid grid-cols-7 items-center gap-4">
                        <div class="col-span-3">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Tamu<span
                                    class="text-red-600">*</span></label>
                            <div class="mt-2">
                                <select id="type" wire:model="booking.guest_id"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="">Pilih</option>
                                    @foreach ($guests as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->firstname . ' ' . $item->lastname }}</option>
                                    @endforeach
                                </select>
                                @error('booking.guest_id')
                                    <p class="text-sm leading-6 text-red-600">
                                        Tidak boleh kosong
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between w-full border-b pb-4" x-data="{ open: false }">
                        <legend class="text-sm font-medium leading-6 text-gray-900">Detail Pemensanan</legend>
                        <button x-on:click="$dispatch('open-modal', 'roomList')"
                            class="flex items-center justify-center w-1/2 px-4 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                            <span>Tambah Kamar</span>
                        </button>
                        <x-modal name="roomList">
                            <h3 class="mb-4 text-lg font-medium leading-6 text-gray-800 capitalize" id="modal-title">
                                Daftar kamar yang tersedia
                            </h3>
                            <div class="bg-white rounded-lg shadow overflow-x-auto">
                                <table class="w-full table-auto text-sm text-left">
                                    <thead class="bg-gray-50 text-gray-600 font-medium border-b">
                                        <tr>
                                            <th
                                                class="py-3 px-6 w-1/3 text-xs font-semibold text-black uppercase tracking-wider">
                                                Nomor</th>
                                            <th
                                                class="py-3 px-6 w-1/3 text-xs font-semibold text-black uppercase tracking-wider">
                                                Tipe Kamar</th>
                                            <th
                                                class="py-3 px-6 w-1/3 text-xs font-semibold text-black uppercase tracking-wider">
                                                Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 divide-y">
                                        @forelse ($allRooms as $item)
                                            <tr class="">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $item->number }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $item->type->name }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    @if (!$item->status)
                                                        <span class="text-green-600">Available</span>
                                                    @else
                                                        Booked
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <button wire:click="selectRoom({{ $item->id }})"
                                                        x-on:click="show = false"
                                                        class="px-1 py-2 rounded flex items-center gap-x-1 text-xs transition duration-300 text-blue-500 hover:bg-blue-100 hover:shadow">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-4 h-4">
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
                            </div>
                        </x-modal>
                    </div>
                    @forelse ($rooms as $index => $item)
                        <div class="flex items-center justify-between">
                            <div class="w-full grid grid-cols-5 gap-x-4">
                                <div class="justify-center">
                                    <div class="relative flex items-start gap-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                        </svg>
                                        <div class="text-sm leading-6">
                                            <p class="text-gray-500">Kamar No {{ $rooms[$index]['number'] ?? '' }}</p>
                                            <p class="font-semibold text-base text-gray-900">
                                                {{ $rooms[$index]['type'] }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="justify-center">
                                    <div class="relative flex items-start gap-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                        </svg>
                                        <div class="text-sm leading-6">
                                            <p class="text-gray-500">Haga Permalam</p>
                                            <p class="font-semibold text-base text-gray-900">
                                                @currency($rooms[$index]['price'])
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="justify-center">
                                    <div class="relative flex items-start gap-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                                        </svg>
                                        <div class="text-sm leading-6">
                                            <p class="text-gray-500">Durasi</p>
                                            <div class="flex items-center gap-x-2">
                                                <input type="number" wire:model="rooms.{{ $index }}.qty"
                                                    class="block w-[50px] rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                <p class="font-semibold text-base text-gray-900">
                                                    Malam
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="justify-center">
                                    <div class="relative flex items-start gap-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                        </svg>
                                        <div class="text-sm leading-6">
                                            <p class="text-gray-500">Check in</p>
                                            <input type="date" wire:model="rooms.{{ $index }}.checkin"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                                <div class="justify-center">
                                    <div class="relative flex items-start gap-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                        </svg>
                                        <div class="text-sm leading-6">
                                            <p class="text-gray-500">Check out</p>
                                            <input type="date" wire:model="rooms.{{ $index }}.checkout"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="text-red-500" wire:click="unsetRoom({{ $index }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    @empty
                        <div class="w-full text-gray-600 text-sm text-center">
                            Belum ada kamar yang di pilih
                        </div>
                    @endforelse
                    <div class="pt-6 border-t flex items-center justify-end">
                        <button type="submit" wire:click="store"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('validation')
</div>
