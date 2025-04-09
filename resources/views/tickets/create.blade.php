@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-white py-10 px-4">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-xl p-10">
        <h1 class="text-2xl font-bold text-center mb-8">Airplane Booking System</h1>

        <div class="border-b border-gray-300 pb-4 mb-6 flex justify-between items-center">
            <div>
                <h2 class="text-xl font-semibold">Ticket Booking for</h2>
                <p class="text-gray-600">{{ $flight->origin }} → {{ $flight->destination }}</p>
                <p class="text-sm text-gray-500">
                    Departure <span class="font-semibold italic">{{ \Carbon\Carbon::parse($flight->departure_time)->translatedFormat('l, d F Y, H:i') }}</span>
                    &nbsp;&nbsp; Arrived <span class="font-semibold italic">{{ \Carbon\Carbon::parse($flight->arrival_time)->translatedFormat('l, d F Y, H:i') }}</span>
                </p>
            </div>
            <div class="text-right">
                <p class="text-lg font-bold">{{ $flight->flight_code }}</p>
            </div>
        </div>

        <form action="{{ route('tickets.store') }}" method="POST" class="space-y-5">
            @csrf
            <input type="hidden" name="flight_id" value="{{ $flight->id }}">

            <div>
                <label class="block mb-1 font-medium">Passenger Name</label>
                <input type="text" name="passenger_name" class="w-full rounded-md bg-gray-100 p-3 focus:outline-none focus:ring-2 focus:ring-blue-300" required>
            </div>

            <div>
                <label class="block mb-1 font-medium">Passenger Phone</label>
                <input type="text" name="passenger_phone" class="w-full rounded-md bg-gray-100 p-3 focus:outline-none focus:ring-2 focus:ring-blue-300" required>
            </div>

            <div>
                <label class="block mb-1 font-medium">Seat Number</label>
                <input type="text" name="seat_number" class="w-full rounded-md bg-gray-100 p-3 focus:outline-none focus:ring-2 focus:ring-blue-300" required>
            </div>

            <div class="flex justify-end pt-4 gap-3">
                <a href="{{ route('flights.index') }}" class="px-5 py-2 bg-gray-200 hover:bg-gray-300 text-sm rounded-md font-semibold shadow transition">Cancel</a>
                <button type="submit" class="px-5 py-2 bg-gray-700 hover:bg-gray-800 text-white text-sm rounded-md font-semibold shadow transition">Book Ticket</button>
            </div>
        </form>

        <hr class="mt-10">
        <p class="text-xs italic text-right text-gray-500 pt-2">by Web Framework and Deployment - 2024</p>
    </div>
</div>
@endsection
