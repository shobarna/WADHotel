<div>
    <div class="py-12" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div class="flex items-center gap-x-4">
                    <a href="{{ route('payments.index') }}" class="flex items-center text-sky-500 drop-shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                        </svg>
                    </a>
                    <div>
                        <div class="flex just items-center gap-x-3">
                            <h2 class="text-lg font-medium text-gray-800">Data Discount</h2>

                            <span
                                class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full">{{ $discounts->count() }}
                                Data</span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-x-3">

                    <button x-on:click="$dispatch('open-modal', 'create')"
                        class="flex items-center justify-center w-1/2 px-4 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <span>Discount baru</span>
                    </button>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow overflow-x-auto">
                <table class="w-full table-auto text-sm text-left">
                    <thead class="bg-gray-50 text-gray-600 font-medium border-b">
                        <tr>
                            <th class="py-3 px-6 w-1/3 text-xs font-semibold text-black uppercase tracking-wider">
                                title</th>
                            <th class="py-3 px-6 w-1/3 text-xs font-semibold text-black uppercase tracking-wider">
                                Code</th>
                            <th class="py-3 px-6 w-1/3 text-xs font-semibold text-black uppercase tracking-wider">
                                Potongan</th>
                            <th class="">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 divide-y">
                        @forelse ($discounts as $item)
                            <tr class="transition duration-300">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $item->title }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $item->code }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @currency($item->price)
                                </td>
                                <td class="flex gap-x-2 px-6 py-4 cursor-default">
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
    </div>

    <x-modal name="create">
        <h3 class="mb-4 text-lg font-medium leading-6 text-gray-800 capitalize" id="modal-title">
            Discount baru
        </h3>

        <div class="space-y-4">
            <div>
                <label for="discount.title" class="block text-sm font-medium leading-6 text-gray-900">
                    title<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <input type="text" id="discount.title" wire:model="discount.title"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    @error('discount.title')
                        <p class="text-sm leading-6 text-red-600">
                            Tidak boleh kosong
                        </p>
                    @enderror
                </div>
            </div>
            <div>
                <label for="discount.code" class="block text-sm font-medium leading-6 text-gray-900">
                    Code<span class="text-red-600">*</span></label>
                <div class="grid grid-cols-5 mt-2">
                    <input type="text" id="discount.code" wire:model="discount.code"
                        class="col-span-4 w-full rounded-l-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <button wire:click="generate"
                        class="text-xs space-x-4 rounded-r-lg bg-gray-300 transistion-all duration-300 shadow hover:bg-gray-200">
                        Generate
                    </button>
                </div>
                @error('discount.code')
                    <p class="text-sm leading-6 text-red-600">
                        Tidak boleh kosong
                    </p>
                @enderror
            </div>
            <div>
                <label for="discount.price" class="block text-sm font-medium leading-6 text-gray-900">
                    Potongan<span class="text-red-600">*</span></label>
                <div class="mt-2">
                    <div
                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md mt-2">
                        <span class="flex select-none items-center text-center pl-3 text-gray-500 sm:text-sm">Rp.
                        </span>
                        <input type="number" id="discount.price" wire:model="discount.price"
                            class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                            placeholder="350000">
                    </div>
                    @error('discount.price')
                        <p class="text-sm leading-6 text-red-600">
                            Tidak boleh kosong
                        </p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mt-6 sm:flex sm:items-center sm:-mx-2">
            <button type="button" x-on:click="show = false"
                class="w-full px-4 py-2 text-sm font-medium tracking-wide text-gray-700 capitalize transition-colors duration-300 transform border border-gray-200 rounded-md sm:w-1/2 sm:mx-2 hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-40">
                Cancel
            </button>

            <button type="button" x-on:click="show = false" wire:click="store"
                class="w-full px-4 py-2 mt-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md sm:mt-0 sm:w-1/2 sm:mx-2 hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                Submit
            </button>
        </div>
    </x-modal>

    @include('validation')
</div>
