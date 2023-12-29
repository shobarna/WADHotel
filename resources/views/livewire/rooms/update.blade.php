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
                    <h2 class="text-lg font-medium text-gray-800">Detail kamar</h2>

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
                    <fieldset>
                        <div class="grid grid-cols-2 mt-2 gap-y-4">
                            <div class="relative flex items-center gap-x-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                </svg>
                                <div class="text-sm leading-6">
                                    <p class="text-gray-500">Haga Permalam</p>
                                    <p class="font-semibold text-base text-gray-900">
                                        @currency($type->price)
                                    </p>
                                </div>
                            </div>
                            <div class="relative flex items-center gap-x-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                </svg>
                                <div class="text-sm leading-6">
                                    <p class="text-gray-500">Kapasitas</p>
                                    <p class="font-semibold text-base text-gray-900">
                                        {{ $type->capacity }} <span class="text-gray-600">Orang</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="mt-6 flex items-center justify-end">
                        <button type="submit" wire:click="update"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
