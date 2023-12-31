<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', App\Http\Livewire\Dashboard::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // TIPE KAMAR
    Route::get('rooms/type', App\Http\Livewire\Rooms\Type\Index::class)->name('rooms.type');
    Route::get('rooms/type/create', App\Http\Livewire\Rooms\Type\Create::class)->name('rooms.type.create');
    Route::get('rooms/type/update/{id}', App\Http\Livewire\Rooms\Type\Update::class)->name('rooms.type.update');

    // KAMAR 
    Route::get('rooms', App\Http\Livewire\Rooms\Index::class)->name('rooms.index');
    Route::get('rooms/create', App\Http\Livewire\Rooms\Create::class)->name('rooms.create');
    Route::get('rooms/update/{id}', App\Http\Livewire\Rooms\Update::class)->name('rooms.update');

    // TAMU 
    Route::get('guests', App\Http\Livewire\Guests\Index::class)->name('guests.index');
    Route::get('guests/create', App\Http\Livewire\Guests\Create::class)->name('guests.create');
    Route::get('guests/update/{id}', App\Http\Livewire\Guests\Update::class)->name('guests.update');

    // PEMESANAN 
    Route::get('bookings', App\Http\Livewire\Bookings\Index::class)->name('bookings.index');
    Route::get('bookings/record', App\Http\Livewire\Bookings\Record::class)->name('bookings.record');
    Route::get('bookings/create', App\Http\Livewire\Bookings\Create::class)->name('bookings.create');
    Route::get('bookings/detail/{id}', App\Http\Livewire\Bookings\Detail::class)->name('bookings.detail');
    Route::get('bookings/update/{id}', App\Http\Livewire\Bookings\Update::class)->name('bookings.update');

    // PEMBAYARAN 
    Route::get('payments', App\Http\Livewire\Payments\Index::class)->name('payments.index');
    Route::get('payments/create', App\Http\Livewire\Payments\Create::class)->name('payments.create');
    Route::get('payments/detail/{id}', App\Http\Livewire\Payments\Detail::class)->name('payments.detail');

    // DISCOUNT 
    Route::get('discount', App\Http\Livewire\Discount\Index::class)->name('payments.discount.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
