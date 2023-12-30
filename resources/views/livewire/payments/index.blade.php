@php
    use Illuminate\Support\Carbon;
@endphp
<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div>
                    <div class="flex just items-center gap-x-3">
                        <h2 class="text-lg font-medium text-gray-800">Manajemen Pembayaran</h2>

                        <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full">{{ $total }}
                            Pembayaran</span>
                    </div>

                    <p class="mt-1 text-sm text-gray-500">Total pendapatan <strong>@currency($earnings)</strong>
                    </p>
                </div>

                <div class="flex items-center gap-x-3">
                    <a href="{{ route('payments.discount.index') }}"
                        class="flex items-center justify-center w-1/2 px-4 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                        </svg>

                        <span>Kelola Discount</span>
                    </a>

                    <a href="{{ route('payments.create') }}"
                        class="flex items-center justify-center w-1/2 px-4 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <span>Tambah Pembayaran</span>
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-x-8">
                <div>
                    <label for="byGuest" class="block text-sm font-medium leading-6 text-gray-900">Berdasarkan
                        Tamu</label>
                    <div class="mt-2">
                        <select id="byGuest" wire:model="byGuest"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="">Semua</option>
                            @foreach ($guests as $item)
                                <option value="{{ $item->id }}">{{ $item->firstname . '' . $item->lastname }}
                                </option>
                            @endforeach
                        </select>
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
                                Total</th>
                            <th class="py-3 px-6 text-xs font-semibold text-black uppercase tracking-wider">
                                Dibuat</th>
                            <th class="w-[20px] p-0">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 divide-y">
                        @forelse ($payments as $item)
                            <tr class="">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    P-{{ $item->id }}{{ $item->created_at->format('Ymd') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $item->booking->guest->firstname }} {{ $item->booking->guest->lastname }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="{{ $item->discount ? 'line-through' : '' }}">@currency($item->subtotal)</span>
                                    @if ($item->discount)
                                        <br>
                                        @currency($item->total)
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $item->created_at->diffForHumans() }}
                                </td>
                                <td class="flex gap-x-2 px-6 py-4 cursor-default items-center">
                                    <a href="{{ route('payments.detail', ['id' => $item->id]) }}"
                                        class="px-1 py-2 rounded flex items-center text-xs transition duration-300 hover:bg-sky-100 hover:shadow">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-sky-600">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </a>
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
                    {{ $payments->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
