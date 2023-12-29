<div>
    <div class="py-12" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div class="flex items-center gap-x-4">
                    <a href="{{ route('rooms.index') }}" class="flex items-center text-sky-500 drop-shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                        </svg>
                    </a>
                    <div>
                        <div class="flex just items-center gap-x-3">
                            <h2 class="text-lg font-medium text-gray-800">Data Tipe Kamar</h2>

                            <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full">{{ $types->count() }}
                                Tipe</span>
                        </div>

                        <p class="mt-1 text-sm text-gray-500">Informasi <strong>tipe</strong> kamar digunakan untuk
                            detail
                            masing-masing kamar
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-x-3">
                    <button x-on:click="$dispatch('open-modal', 'facilities')"
                        class="flex items-center justify-center w-1/2 px-4 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                        </svg>

                        <span>Fasilitas</span>
                    </button>

                    <a href="{{ route('rooms.type.create') }}"
                        class="flex items-center justify-center w-1/2 px-4 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <span>Tambah tipe</span>
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow overflow-x-auto">
                <table class="w-full table-auto text-sm text-left">
                    <thead class="bg-gray-50 text-gray-600 font-medium border-b">
                        <tr>
                            <th class="py-3 px-6 w-1/3 text-xs font-semibold text-black uppercase tracking-wider">
                                Nama</th>
                            <th class="py-3 px-6 w-1/3 text-xs font-semibold text-black uppercase tracking-wider">
                                Kapasitas</th>
                            <th class="py-3 px-6 w-1/3 text-xs font-semibold text-black uppercase tracking-wider">
                                Harga</th>
                            <th class="py-3 px-6 w-1/3 text-xs font-semibold text-black uppercase tracking-wider">
                                Desc</th>
                            <th class="">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 divide-y">
                        @forelse ($types as $item)
                            <tr class="transition duration-300">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $item->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $item->capacity }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @currency($item->price)
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $item->desc }}
                                </td>
                                <td class="flex gap-x-2 px-6 py-4 cursor-default">
                                    <a href="{{ route('rooms.type.update', ['id' => $item->id]) }}"
                                        class="px-1 py-2 rounded flex items-center text-xs transition duration-300 hover:bg-sky-100 hover:shadow">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-sky-600">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>

                                    </a>
                                    <button wire:click="validationDelete({{ $item->id }})"
                                        class="px-1 py-2 rounded flex items-center text-xs transition duration-300 hover:bg-red-100 hover:shadow">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-red-500">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="text-center bg-grey-50 py-4">
                                        Tidak ada data yang tersedia
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <x-modal name="facilities">
            <div class="bg-white rounded-lg shadow overflow-y-auto">
                <table class="w-full table-auto text-sm text-left">
                    <thead class="bg-gray-50 text-gray-600 font-medium border-b">
                        <tr>
                            <th class="py-3 px-6 w-1/3 text-xs font-semibold text-black uppercase tracking-wider">
                                Nama</th>
                            <th class="">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 divide-y">
                        @forelse ($facilities as $item)
                            <tr class="transition duration-300 hover:bg-gray-100 cursor-pointer">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $item->name }}
                                </td>
                                <td class="flex gap-x-2 px-6 py-4 cursor-default">
                                    <button wire:click="deleteFacility({{ $item->id }})"
                                        class="px-1 py-2 rounded flex items-center text-xs transition duration-300 hover:bg-red-100 hover:shadow">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-red-500">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
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

    @include('validation')
</div>
