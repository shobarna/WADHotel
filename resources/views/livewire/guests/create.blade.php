<div>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="flex items-center gap-x-4">
                <a href="{{ route('guests.index') }}" class="flex items-center text-sky-500 drop-shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                    </svg>
                </a>
                <div>
                    <h2 class="text-lg font-medium text-gray-800">Formulir tamu</h2>

                    <p class="mt-1 text-sm text-gray-500">Kolom input <span class="text-red-600">*</span> bermakna wajib
                        terisi
                    </p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-8" x-data="{ open: false }">
                    <div class="grid grid-cols-4 items-center gap-4">
                        <div class="col-span-2">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Nama
                                depan<span class="text-red-600">*</span></label>
                            <div class="mt-2">
                                <input type="text" id="first-name" wire:model="guest.firstname" placeholder="John"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('guest.firstname')
                                    <p class="text-sm leading-6 text-red-600">
                                        Tidak boleh kosong
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Nama
                                belakang<span class="text-red-600">*</span></label>
                            <div class="mt-2">
                                <input type="text" id="last-name" wire:model="guest.lastname" placeholder="Len"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('guest.lastname')
                                    <p class="text-sm leading-6 text-red-600">
                                        Tidak boleh kosong
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Nomer
                                Telepon<span class="text-red-600">*</span></label>
                            <div class="mt-2">
                                <input type="number" id="phone" wire:model="guest.phone" placeholder="0812345678"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @error('guest.phone')
                                    <p class="text-sm leading-6 text-red-600">
                                        Tidak boleh kosong dan tidak lebih dari <strong>12 char</strong>
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-3">
                            <label for="email"
                                class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                            <div class="mt-2">
                                <input id="email" wire:model="guest.email" type="email"
                                    placeholder="alamat@gmail.com"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="col-span-4">
                            <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Alamat<span
                                    class="text-red-600">*</span></label>
                            <div class="mt-2">
                                <textarea id="address" rows="3" wire:model="guest.address"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                @error('guest.address')
                                    <p class="text-sm leading-6 text-red-600">
                                        Tidak boleh kosong
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-end">
                        <button type="submit" wire:click="store"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
