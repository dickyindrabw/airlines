<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\TicketController;

// Halaman utama - daftar semua penerbangan
Route::get('/flights', [FlightController::class, 'index'])->name('flights.index');

// Form booking tiket untuk flight tertentu
Route::get('/flights/book/{flight}', [TicketController::class, 'create'])->name('tickets.create');

// Proses submit form booking
Route::post('/ticket/submit', [TicketController::class, 'store'])->name('tickets.store');

// Menampilkan list tiket dari flight tertentu
Route::get('/flights/ticket/{flight}', [TicketController::class, 'index'])->name('tickets.index');

// Konfirmasi boarding penumpang
Route::put('/ticket/board/{ticket}', [TicketController::class, 'board'])->name('tickets.board');

// Hapus tiket (hanya jika belum boarding)
Route::delete('/ticket/delete/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');

// Redirect root ke daftar flights (opsional)
Route::get('/', function () {
    return redirect()->route('flights.index');
});
