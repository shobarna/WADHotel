<div>
    <div class="py-12">
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

                            <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full">240
                                Tipe</span>
                        </div>

                        <p class="mt-1 text-sm text-gray-500">Informasi <strong>tipe</strong> kamar digunakan untuk
                            detail
                            masing-masing kamar
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-x-3">
                    <a href="{{ route('rooms.type') }}"
                        class="flex items-center justify-center w-1/2 px-4 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                        </svg>

                        <span>Fasilitas</span>
                    </a>

                    <a href="{{ route('rooms.type.create') }}"
                        class="flex items-center justify-center w-1/2 px-4 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
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
                                Harga</th>
                            <th class="py-3 px-6 w-1/3 text-xs font-semibold text-black uppercase tracking-wider">
                                Kapasitas</th>
                            <th class="py-3 px-6 w-1/3 text-xs font-semibold text-black uppercase tracking-wider">
                                Desc</th>
                            <th class="">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 divide-y">
                        <tr>
                            <td colspan="5">
                                <div class="text-center bg-grey-50 py-4">
                                    Tidak ada data yang tersedia
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
