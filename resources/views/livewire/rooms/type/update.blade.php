<div>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="flex items-center gap-x-4">
                <a href="{{ route('rooms.type') }}" class="flex items-center text-sky-500 drop-shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                    </svg>
                </a>
                <div>
                    <h2 class="text-lg font-medium text-gray-800">Detail tipe kamar</h2>

                    <p class="mt-1 text-sm text-gray-500">Kolom input <span class="text-red-600">*</span> bermakna wajib
                        terisi
                    </p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-8" x-data="{ open: false }">
                    <div class="grid grid-cols-3 items-center gap-x-4">
                        <div>
                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">
                                Nama<span class="text-red-600">*</span></label>
                            <div class="mt-2">
                                <input type="text" id="name" wire:model="type.name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    placeholder="Mewah">
                            </div>
                            @error('type.name')
                                <p class="text-sm leading-6 text-red-600">
                                    Tidak boleh kosong
                                </p>
                            @enderror
                        </div>
                        <div>
                            <label for="price" class="block text-sm font-medium leading-6 text-gray-900">
                                Harga<span class="text-red-600">*</span></label>
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md mt-2">
                                <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">Rp. </span>
                                <input type="number" id="price" wire:model="type.price"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="350000">
                            </div>
                            @error('type.price')
                                <p class="text-sm leading-6 text-red-600">
                                    Tidak boleh kosong
                                </p>
                            @enderror
                        </div>
                        <div>
                            <label for="capacity" class="block text-sm font-medium leading-6 text-gray-900">
                                Kapasitas<span class="text-red-600">*</span></label>
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md mt-2">
                                <input type="number" id="capacity" wire:model="type.capacity"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="">
                                <span class="flex select-none items-center pr-3 text-gray-500 sm:text-sm">Orang</span>
                            </div>
                            @error('type.capacity')
                                <p class="text-sm leading-6 text-red-600">
                                    Tidak boleh kosong
                                </p>
                            @enderror
                        </div>
                    </div>
                    <fieldset>
                        <legend class="text-sm font-medium leading-6 text-gray-900">Fasilitas<span
                                class="text-red-600">*</span></legend>
                        <div class="grid grid-cols-2 mt-2 gap-y-4">
                            @foreach ($facilities as $item)
                                <div class="relative flex items-center gap-x-3">
                                    <input type="checkbox" id="facility_{{ $item->id }}" wire:model="selected"
                                        value="{{ $item->id }}"
                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    <div class="text-sm leading-6">
                                        <label for="facility_{{ $item->id }}" class="font-medium text-gray-900">
                                            {{ $item->name }}
                                        </label>
                                        <p class="text-gray-500">{{ Str::limit($item->desc, 40) }}</p>
                                    </div>
                                </div>
                            @endforeach

                            <div class="flex items-center">
                                <button x-on:click="$dispatch('open-modal', 'facilityModal')"
                                    class="flex items-center justify-center w-1/2 px-3 py-1.5 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                    Fasilitas baru
                                </button>
                                <x-modal name="facilityModal">
                                    <h3 class="mb-4 text-lg font-medium leading-6 text-gray-800 capitalize"
                                        id="modal-title">
                                        Fasilitas baru
                                    </h3>

                                    <div class="space-y-4">
                                        <div>
                                            <label for="facility.name"
                                                class="block text-sm font-medium leading-6 text-gray-900">
                                                Nama<span class="text-red-600">*</span></label>
                                            <div class="mt-2">
                                                <input type="text" name="facility.name" id="facility.name"
                                                    wire:model="facility.name" autocomplete="given-name"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                @error('facility.name')
                                                    <p class="text-sm leading-6 text-red-600">
                                                        Tidak boleh kosong
                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <label for="facility.desc"
                                                class="block text-sm font-medium leading-6 text-gray-900">Deskripsi</label>
                                            <div class="mt-2">
                                                <textarea id="facility.desc" name="facility.desc" rows="3" wire:model="facility.desc"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-6 sm:flex sm:items-center sm:-mx-2">
                                        <button type="button" x-on:click="show = false"
                                            class="w-full px-4 py-2 text-sm font-medium tracking-wide text-gray-700 capitalize transition-colors duration-300 transform border border-gray-200 rounded-md sm:w-1/2 sm:mx-2 hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-40">
                                            Cancel
                                        </button>

                                        <button type="button" x-on:click="show = false" wire:click="storeFacility"
                                            class="w-full px-4 py-2 mt-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md sm:mt-0 sm:w-1/2 sm:mx-2 hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40">
                                            Submit
                                        </button>
                                    </div>
                                </x-modal>
                            </div>
                        </div>
                    </fieldset>
                    <div>
                        <label for="desc"
                            class="block text-sm font-medium leading-6 text-gray-900">Deskripsi</label>
                        <div class="mt-2">
                            <textarea id="desc" rows="3" wire:model="type.desc"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-end">
                        <button type="submit" wire:click="update"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
