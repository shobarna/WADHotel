<div>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="flex items-center gap-x-4">
                <a href="{{ route('rooms.index') }}" class="flex items-center text-sky-500 drop-shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                    </svg>
                </a>
                <div>
                    <h2 class="text-lg font-medium text-gray-800">Formulir kamar</h2>

                    <p class="mt-1 text-sm text-gray-500">Kolom input <span class="text-red-600">*</span> bermakna wajib
                        terisi
                    </p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-8" x-data="{ open: false }">
                    <div class="grid grid-cols-2 items-center gap-x-4">
                        <div>
                            <label for="number" class="block text-sm font-medium leading-6 text-gray-900">
                                Nomor Kamar<span class="text-red-600">*</span></label>
                            <div class="mt-2">
                                <input type="number" id="number" wire:model="room.number"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    placeholder="001">
                            </div>
                            @error('room.number')
                                <p class="text-sm leading-6 text-red-600">
                                    Tidak boleh kosong dan tidak lebih dari 3 char
                                </p>
                            @enderror
                        </div>
                        <div>
                            <label for="type" class="block text-sm font-medium leading-6 text-gray-900">
                                Tipe<span class="text-red-600">*</span></label>
                            <div class="mt-2">
                                <select id="type" wire:model="room.type_id"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="">Pilih</option>
                                    @foreach ($types as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('room.type')
                                <p class="text-sm leading-6 text-red-600">
                                    Tidak boleh kosong
                                </p>
                            @enderror
                        </div>
                    </div>
                    <fieldset>
                        <legend class="text-sm font-medium leading-6 text-gray-900">Fasilitas</legend>
                        <div class="grid grid-cols-2 mt-2 gap-y-4">
                            @foreach ($facilities as $item)
                                <div class="relative flex items-center gap-x-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div class="text-sm leading-6">
                                        <label for="facility_{{ $item->id }}" class="font-medium text-gray-900">
                                            {{ $item->name }}
                                        </label>
                                        <p class="text-gray-500">{{ Str::limit($item->desc, 40) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </fieldset>
                    <div class="mt-6 flex items-center justify-end">
                        <button type="submit" wire:click="store"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>