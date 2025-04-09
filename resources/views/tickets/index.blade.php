@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-white to-blue-50 py-10 px-4">
    <h1 class="text-3xl font-bold text-center mb-6">
        🧑‍✈️ Tiket Penerbangan
    </h1>

    {{-- Flight Detail --}}
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md p-6 mb-8 space-y-4 text-sm">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-gray-500">Kode Penerbangan</p>
                <p class="text-xl font-bold text-blue-700">{{ $flight->code }}</p>
            </div>
            <div class="text-right">
                <p class="text-gray-500">Rute</p>
                <p class="text-base font-semibold">{{ $flight->origin }} → {{ $flight->destination }}</p>
            </div>
        </div>

        <div class="flex justify-between mt-2">
            <div>
                <p class="text-gray-500">Departure</p>
                <p class="italic font-medium">{{ \Carbon\Carbon::parse($flight->departure_time)->translatedFormat('l, d F Y H:i') }}</p>
            </div>
            <div class="text-right">
                <p class="text-gray-500">Arrival</p>
                <p class="italic font-medium">{{ \Carbon\Carbon::parse($flight->arrival_time)->translatedFormat('l, d F Y H:i') }}</p>
            </div>
        </div>

        <hr class="my-3">

        <div class="flex justify-between text-sm font-medium text-gray-700">
            <div>👥 Total Penumpang: <span class="text-gray-900">{{ $tickets->count() }}</span></div>
            <div>✅ Sudah Boarding: <span class="text-green-600">{{ $tickets->whereNotNull('boarding_time')->count() }}</span></div>
        </div>
    </div>

    {{-- Ticket Table --}}
    <div class="overflow-x-auto max-w-6xl mx-auto animate-fade-in">
        <table class="w-full bg-white border border-gray-200 rounded-xl overflow-hidden shadow-md text-sm">
            <thead class="bg-blue-100 text-blue-800 text-sm">
                <tr class="text-left">
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">No HP</th>
                    <th class="px-4 py-3">No Kursi</th>
                    <th class="px-4 py-3">Boarding</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tickets as $ticket)
                    <tr class="border-t hover:bg-gray-50 transition duration-200">
                        <td class="px-4 py-3 align-middle">{{ $ticket->passenger_name }}</td>
                        <td class="px-4 py-3 align-middle">{{ $ticket->passenger_phone }}</td>
                        <td class="px-4 py-3 align-middle">{{ $ticket->seat_number }}</td>
                        <td class="px-4 py-3 align-middle">
                            @if($ticket->boarding_time)
                                <span class="text-green-600 font-semibold">
                                    ✅ {{ \Carbon\Carbon::parse($ticket->boarding_time)->format('d M H:i') }}
                                </span>
                            @else
                                <form action="{{ route('tickets.board', $ticket->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-full text-xs transition">
                                        Konfirmasi
                                    </button>
                                </form>
                            @endif
                        </td>
                        <td class="px-4 py-3 align-middle">
                            @if(!$ticket->boarding_time)
                                <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Hapus tiket ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full text-xs transition">
                                        Hapus
                                    </button>
                                </form>
                            @else
                                <span class="text-gray-400 text-xs italic">Tidak bisa dihapus</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500 italic">
                            Belum ada tiket untuk penerbangan ini.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-8 text-center">
        <a href="{{ route('flights.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-5 py-2 rounded-lg transition">
            ⬅️ Kembali ke Daftar Penerbangan
        </a>
    </div>
</div>
@endsection
