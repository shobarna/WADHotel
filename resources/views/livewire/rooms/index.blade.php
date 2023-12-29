<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div>
                    <div class="flex just items-center gap-x-3">
                        <h2 class="text-lg font-medium text-gray-800">Manajemen Kamar</h2>

                        <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full">240
                            kamar</span>
                    </div>

                    <p class="mt-1 text-sm text-gray-500">total kamar yang <span class="text-green-600">Available</span>
                        adalah
                    </p>
                </div>

                <div class="flex items-center gap-x-3">
                    <a href="{{ route('rooms.type') }}"
                        class="flex items-center justify-center w-1/2 px-4 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                        </svg>

                        <span>Tipe Kamar</span>
                    </a>

                    <a href="{{ route('rooms.create') }}"
                        class="flex items-center justify-center w-1/2 px-4 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <span>Tambah kamar</span>
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow overflow-x-auto">
                <table class="w-full table-auto text-sm text-left">
                    <thead class="bg-gray-50 text-gray-600 font-medium border-b">
                        <tr>
                            <th class="py-3 px-6 w-1/3 text-xs font-semibold text-black uppercase tracking-wider">
                                Nomor</th>
                            <th class="py-3 px-6 w-1/3 text-xs font-semibold text-black uppercase tracking-wider">
                                Tipe Kamar</th>
                            <th class="py-3 px-6 w-1/3 text-xs font-semibold text-black uppercase tracking-wider">
                                Status</th>
                            <th class="">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 divide-y">
                        @forelse ($rooms as $item)
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
                                <td class="flex gap-x-2 px-6 py-4 cursor-default">
                                    <a href="{{ route('rooms.update', ['id' => $item->id]) }}"
                                        class="px-1 py-2 rounded flex items-center text-xs transition duration-300 hover:bg-sky-100 hover:shadow">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-sky-600">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>

                                    </a>
                                    <a href=""
                                        class="px-1 py-2 rounded flex items-center text-xs transition duration-300 hover:bg-red-100 hover:shadow">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-red-500">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </a>
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
        </div>
    </div>
</div>
