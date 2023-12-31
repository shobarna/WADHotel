@php
    use Illuminate\Support\Carbon;
@endphp
<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div>
                    <div class="flex just items-center gap-x-3">
                        <h2 class="text-lg font-medium text-gray-800">Laporan Pemesanan</h2>

                        <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full">{{ $total }}
                            Pemesanan</span>
                    </div>
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
                    <label for="byGuest" class="block text-sm font-medium leading-6 text-gray-900">Berdasarkan
                        Tamu</label>
                    <div class="mt-2">
                        <select id="byGuest" wire:model="byGuest"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="">Semua</option>
                            @foreach ($guests as $item)
                                <option value="{{ $item->id }}">{{ $item->firstname }} {{ $item->lastname }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 space-x-4">
                    <div>
                        <label for="startDate" class="block text-sm font-medium leading-6 text-gray-900">Dari
                            Tanggal</label>
                        <div class="mt-2">
                            <input type="date" wire:model="startDate" id="startDate"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="endDate" class="block text-sm font-medium leading-6 text-gray-900">Sampai
                            Tanggal</label>
                        <div class="mt-2">
                            <input type="date" wire:model="endDate" id="endDate"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
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
                                    {{ $item->created_at->format('j F Y') }}
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
</div>
