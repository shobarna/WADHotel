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

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
