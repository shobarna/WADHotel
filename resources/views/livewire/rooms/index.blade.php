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
                        <tr>
                            <td colspan="3">
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
