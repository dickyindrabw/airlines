@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold text-center mb-10">✈️ Jadwal Penerbangan</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($flights as $flight)
            <div class="bg-white p-6 rounded-2xl shadow-md transform hover:-translate-y-1 hover:shadow-xl transition-all duration-300 ease-in-out">
                <div class="flex justify-between items-center mb-2">
                    <h2 class="text-xl font-bold text-blue-700">{{ $flight->code }}</h2>
                    <span class="text-sm bg-blue-100 text-blue-800 px-2 py-1 rounded-full">{{ $flight->from }} → {{ $flight->to }}</span>
                </div>
                <p class="text-sm text-gray-500">Departure</p>
                <p class="text-base font-semibold italic">{{ $flight->departure_time }}</p>
                <p class="text-sm text-gray-500 mt-2">Arrival</p>
                <p class="text-base font-semibold italic">{{ $flight->arrival_time }}</p>

                <div class="mt-6 flex justify-between">
                    <a href="{{ route('tickets.create', $flight->id) }}"
                       class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-2 rounded-xl shadow-sm transition-all duration-200">
                        🎟 Pesan Tiket
                    </a>
                    <a href="{{ route('tickets.index', $flight->id) }}"
                       class="bg-gray-500 hover:bg-gray-600 text-white text-sm px-4 py-2 rounded-xl shadow-sm transition-all duration-200">
                        📄 Lihat Tiket
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
