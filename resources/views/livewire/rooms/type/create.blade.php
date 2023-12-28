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
                    <h2 class="text-lg font-medium text-gray-800">Formulir tipe kamar</h2>

                    <p class="mt-1 text-sm text-gray-500">Kolom input <span class="text-red-600">*</span> bermakna wajib
                        terisi
                    </p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-8">
                    <div class="grid grid-cols-3 items-center gap-x-4">
                        <div>
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">
                                Nama<span class="text-red-600">*</span></label>
                            <div class="mt-2">
                                <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    placeholder="Mewah">
                            </div>
                        </div>
                        <div>
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">
                                Harga<span class="text-red-600">*</span></label>
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md mt-2">
                                <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">Rp. </span>
                                <input type="text" name="username" id="username" autocomplete="username"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="350000">
                            </div>
                        </div>
                        <div>
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">
                                Kapasitas<span class="text-red-600">*</span></label>
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md mt-2">
                                <input type="text" name="username" id="username" autocomplete="username"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pr-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="">
                                <span class="flex select-none items-center pr-3 text-gray-500 sm:text-sm">Orang</span>
                            </div>
                        </div>
                    </div>
                    <fieldset>
                        <div class="flex items-center justify-between">
                            <legend class="text-sm font-medium leading-6 text-gray-900">Fasilitas<span
                                    class="text-red-600">*</span></legend>
                        </div>
                        <div class="grid grid-cols-2 mt-2 gap-y-4">
                            @foreach ($facilities as $item)
                                <div class="relative flex gap-x-3">
                                    <div class="flex h-6 items-center">
                                        <input id="comments" name="comments" type="checkbox"
                                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    </div>
                                    <div class="text-sm leading-6">
                                        <label for="comments"
                                            class="font-medium text-gray-900">{{ $item->name }}</label>
                                        <p class="text-gray-500">{{ Str::limit($item->desc, 40) }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </fieldset>
                    <div>
                        <label for="about"
                            class="block text-sm font-medium leading-6 text-gray-900">Deskripsi</label>
                        <div class="mt-2">
                            <textarea id="about" name="about" rows="3"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
