@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold text-center mb-10">🧾 Pemesanan Tiket</h1>

    <div class="max-w-xl mx-auto bg-white p-6 rounded-2xl shadow-lg animate-fade-in">
        <form action="{{ route('tickets.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="flight_id" value="{{ $flight->id }}">

            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Penumpang</label>
                <input type="text" name="passenger_name" class="mt-1 w-full border px-4 py-2 rounded-xl focus:ring-2 ring-blue-400 transition" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">No HP</label>
                <input type="text" name="passenger_phone" class="mt-1 w-full border px-4 py-2 rounded-xl focus:ring-2 ring-blue-400 transition" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Nomor Kursi</label>
                <input type="text" name="seat_number" class="mt-1 w-full border px-4 py-2 rounded-xl focus:ring-2 ring-blue-400 transition" required>
            </div>

            <div class="flex justify-end space-x-2 pt-4">
                <a href="{{ route('flights.index') }}" class="px-4 py-2 bg-gray-300 rounded-xl hover:bg-gray-400 transition">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">Pesan</button>
            </div>
        </form>
    </div>
@endsection
