@php
    use Illuminate\Support\Carbon;
@endphp
<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div>
                    <div class="flex just items-center gap-x-3">
                        <h2 class="text-lg font-medium text-gray-800">Manajemen Pemesanan</h2>

                        <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full">{{ $total }}
                            Pemesanan</span>
                    </div>

                    <p class="mt-1 text-sm text-gray-500">total Pemesanan yang <span class="text-blue-600">Done</span>
                        adalah <strong>{{ $done }}</strong> pemesanan
                    </p>
                </div>

                <div class="flex items-center gap-x-3">

                    <a href="{{ route('bookings.create') }}"
                        class="flex items-center justify-center w-1/2 px-4 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <span>Tambah Pemesanan</span>
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-x-8">
                <div>
                    <label for="byStatus" class="block text-sm font-medium leading-6 text-gray-900">Berdasarkan
                        Status</label>
                    <div class="mt-2">
                        <select id="byStatus" wire:model="byStatus"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="">Semua</option>
                            <option value="Booked">Booked</option>
                            <option value="Done">Done</option>
                            <option value="Cancel">Cancel</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label for="search" class="block text-sm font-medium leading-6 text-gray-900">Cari</label>
                    <div class="mt-2">
                        <input type="text" wire:model="search" id="search" placeholder="Semua"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow">
                <table class="w-full table-auto text-sm text-left">
                    <thead class="bg-gray-50 text-gray-600 font-medium border-b">
                        <tr>
                            <th class="py-3 px-6 text-xs font-semibold text-black uppercase tracking-wider">
                                No</th>
                            <th class="py-3 px-6 text-xs font-semibold text-black uppercase tracking-wider">
                                Tamu</th>
                            <th class="py-3 px-6 text-xs font-semibold text-black uppercase tracking-wider">
                                Status</th>
                            <th class="py-3 px-6 text-xs font-semibold text-black uppercase tracking-wider">
                                Durasi</th>
                            <th class="py-3 px-6 text-xs font-semibold text-black uppercase tracking-wider">
                                Dibuat</th>
                            <th class="w-[20px] p-0">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 divide-y">
                        @forelse ($bookings as $item)
                            <tr class="">
                                <td class="px-6 w-1/5 py-4 whitespace-nowrap">
                                    B-{{ $item->id }}{{ $item->created_at->format('Ymd') }}
                                </td>
                                <td class="px-6 w-1/5 py-4 whitespace-nowrap">
                                    {{ $item->guest->firstname }} {{ $item->guest->lastname }}
                                </td>
                                <td class="px-6 w-1/5 py-4 whitespace-nowrap">
                                    <span
                                        class="{{ $item->status === 'Booked' ? 'text-green-500' : ($item->status === 'Done' ? 'text-blue-500' : ($item->status === 'Reschedule' ? 'text-yellow-500' : 'text-red-500')) }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                                <td class="px-6 w-1/5 py-4 whitespace-nowrap">
                                    {{ $item->duration }} Malam
                                </td>
                                <td class="px-6 w-1/5 py-4 whitespace-nowrap">
                                    {{ $item->created_at->diffForHumans() }}
                                </td>
                                <td class="flex gap-x-2 px-6 py-4 cursor-default items-center">
                                    @if ($item->status !== 'Booked')
                                        <a href="{{ route('bookings.detail', ['id' => $item->id]) }}"
                                            class="px-1 py-2 rounded flex items-center text-xs transition duration-300 hover:bg-sky-100 hover:shadow">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-sky-600">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </a>
                                    @else
                                        <x-dropdown>
                                            <x-slot name="trigger">
                                                <button
                                                    class="inline-flex space-x-2 items-center justify-center whitespace-nowrap font-medium transition-colors hover:bg-gray-50 border shadow rounded-md px-3 text-xs tracking-wide h-8 border-dashed border-gray-300"
                                                    type="button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5 mr-2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                                                    </svg>
                                                    Opsi
                                                </button>
                                            </x-slot>

                                            <x-slot name="content">
                                                <a href="{{ route('bookings.detail', ['id' => $item->id]) }}"
                                                    class="flex cursor-pointer hover:bg-gray-50 items-center gap-x-2 rounded-sm px-2 py-1.5 text-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-4 h-4 text-sky-600">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>
                                                    Detail
                                                </a>
                                                <button wire:click="reschedule({{ $item->id }})"
                                                    class="flex cursor-pointer hover:bg-gray-50 items-center gap-x-2 rounded-sm px-2 py-1.5 text-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-4 h-4 text-yellow-600">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                    Reschedule
                                                </button>
                                                <button wire:click="cancel({{ $item->id }})"
                                                    class="flex cursor-pointer hover:bg-gray-50 items-center gap-x-2 rounded-sm px-2 py-1.5 text-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" class="w-4 h-4 text-red-600">
                                                        <path
                                                            d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                                    </svg>
                                                    Batal
                                                </button>
                                            </x-slot>
                                        </x-dropdown>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="text-center bg-grey-50 py-4">
                                        Tidak ada data yang tersedia
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="px-8 pb-4">
                    {{ $bookings->links() }}
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('validationCancel', event => {
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

                        Livewire.emit('confirmCancel', event.detail.id);
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
