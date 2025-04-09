@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-white py-10 px-4">
    <h1 class="text-2xl font-bold text-center mb-10">Airplane Booking System</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
        @foreach ($flights as $flight)
        <div class="bg-gray-100 hover:bg-gray-200 transform hover:scale-105 transition-all duration-300 ease-in-out shadow-md rounded-xl p-6 space-y-2 animate-fade-in-up">


            <div class="flex justify-between items-center">
                <p class="text-lg font-bold">{{ $flight->flight_code }}</p>
                <p class="text-sm text-gray-600">{{ $flight->origin }} → {{ $flight->destination }}</p>
            </div>
            <div class="text-sm text-gray-700">
                <p>Departure<br><span class="font-semibold italic">{{ \Carbon\Carbon::parse($flight->departure_time)->translatedFormat('l, d F Y, H:i') }}</span></p>
                <p>Arrived<br><span class="font-semibold italic">{{ \Carbon\Carbon::parse($flight->arrival_time)->translatedFormat('l, d F Y, H:i') }}</span></p>
            </div>
            <div class="flex justify-between pt-4">
                <a href="{{ route('tickets.create', $flight->id) }}" class="bg-blue-700 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-800 transition">Book Ticket</a>
                <a href="{{ route('tickets.index', $flight->id) }}" class="bg-gray-300 text-black px-4 py-2 rounded-md text-sm hover:bg-gray-400 transition">View Details</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
