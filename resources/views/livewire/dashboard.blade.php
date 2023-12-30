<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                <div wire:click="link('booking')"
                    class="bg-white group hover:shadow-lg transition-all duration-300 cursor-pointer rounded-xl border bg-card text-card-foreground shadow">
                    <div class="p-6 flex flex-row items-center justify-between space-y-0 pb-2">
                        <h3 class="tracking-tight text-sm font-medium">Total Pemesanan <span
                                class="text-green-600"></span>
                        </h3>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                        </svg>
                    </div>
                    <div class="p-6 pt-0">
                        <div class="text-2xl font-bold">{{ $booking->count() - 1 }}+</div>
                        <p
                            class="group-hover:text-sky-600 text-xs text-muted-foreground transition-color duration-300 hover:text-sky-600">
                            <a href="{{ route('bookings.index') }}">Kelola
                                sekarang</a>
                        </p>
                    </div>
                </div>
                <div wire:click="link('payment')"
                    class="bg-white group hover:shadow-lg transition-all duration-300 cursor-pointer rounded-xl border bg-card text-card-foreground shadow">
                    <div class="p-6 flex flex-row items-center justify-between space-y-0 pb-2">
                        <h3 class="tracking-tight text-sm font-medium">Pendapatan</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                        </svg>
                    </div>
                    <div class="p-6 pt-0">
                        <div class="text-2xl font-bold">@currency($payment)</div>
                        <p
                            class="group-hover:text-sky-600 text-xs text-muted-foreground transition-color duration-300 hover:text-sky-600">
                            <a href="{{ route('payments.index') }}">Lihat transaksi</a>
                        </p>
                    </div>
                </div>
                <div wire:click="link('guest')"
                    class="bg-white group hover:shadow-lg transition-all duration-300 cursor-pointer rounded-xl border bg-card text-card-foreground shadow">
                    <div class="p-6 flex flex-row items-center justify-between space-y-0 pb-2">
                        <h3 class="tracking-tight text-sm font-medium">Telah Terdaftar</h3><svg
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            class="h-4 w-4 text-muted-foreground">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <div class="p-6 pt-0">
                        <div class="text-2xl font-bold">4+</div>
                        <p
                            class="group-hover:text-sky-600 text-xs text-muted-foreground transition-color duration-300 hover:text-sky-600">
                            <a href="{{ route('guests.index') }}">Daftarkan tamu
                                sekarang</a>
                        </p>
                    </div>
                </div>
                <div wire:click="link('room')"
                    class="bg-white group hover:shadow-lg transition-all duration-300 cursor-pointer rounded-xl border bg-card text-card-foreground shadow">
                    <div class="p-6 flex flex-row items-center justify-between space-y-0 pb-2">
                        <h3 class="tracking-tight text-sm font-medium">Kamar yang dimiliki</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                        </svg>
                    </div>
                    <div class="p-6 pt-0">
                        <div class="text-2xl font-bold">{{ $room->count() - 1 }}+</div>
                        <p
                            class="group-hover:text-sky-600 text-xs text-muted-foreground transition-color duration-300 hover:text-sky-600">
                            <a href="{{ route('rooms.index') }}">Cek sekarang juga</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-7">
                <div class="rounded-xl border bg-white shadow col-span-3">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <h3 class="font-semibold leading-none tracking-tight">Transaksi Terbaru</h3>
                        <p class="text-sm text-muted-foreground">Total transaksi bulan ini
                            <strong>{{ $payments->count() }}</strong>
                        </p>
                    </div>
                    <div class="p-6 pt-0">
                        <div class="space-y-8">
                            @forelse ($payments as $item)
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <div class="ml-4 space-y-1">
                                        <p class="text-sm font-medium leading-none">
                                            {{ $item->booking->guest->firstname }} {{ $item->booking->guest->lastname }}
                                        </p>
                                        <p class="text-sm text-muted-foreground">
                                            {{ $item->booking->rooms[0]->type->name }}
                                        </p>
                                    </div>
                                    <div class="ml-auto font-medium">+@currency($item->total - 1000)</div>
                                </div>
                            @empty
                                <div class="flex justify-center">
                                    <span class="text-sm text-muted-foreground">Belum ada data</span>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-span-4">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <h3 class="font-semibold leading-none tracking-tight">Ringkasan</h3>
                    </div>
                    <div class="bg-white rounded-lg shadow overflow-x-auto">
                        <table class="w-full table-auto text-sm text-left">
                            <thead class="bg-gray-50 text-gray-600 font-medium border-b">
                                <tr>
                                    <th class="py-3 px-6 text-xs font-semibold text-black uppercase tracking-wider">
                                        Kamar</th>
                                    <th class="py-3 px-6 text-xs font-semibold text-black uppercase tracking-wider">
                                        Durasi</th>
                                    <th class="py-3 px-6 text-xs font-semibold text-black uppercase tracking-wider">
                                        status</th>
                                    <th class="py-3 px-6 text-xs font-semibold text-black uppercase tracking-wider">
                                        Dibuat</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 divide-y">
                                @forelse ($bookings as $item)
                                    <tr class="transition duration-300">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $item->rooms[0]->type->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $item->duration }} Malam
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="{{ $item->status === 'Booked' ? 'text-green-500' : ($item->status === 'Done' ? 'text-blue-500' : ($item->status === 'Reschedule' ? 'text-yellow-500' : 'text-red-500')) }}">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $item->created_at->diffForHumans() }}
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
        </div>
    </div>
</div>
