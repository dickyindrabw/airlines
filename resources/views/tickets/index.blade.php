@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold text-center mb-8">🧑‍✈️ Tiket Penerbangan {{ $flight->code }}</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-xl overflow-hidden text-sm animate-fade-in">
            <thead class="bg-blue-100 text-blue-800">
                <tr>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">No HP</th>
                    <th class="px-4 py-3 text-left">No Kursi</th>
                    <th class="px-4 py-3 text-left">Boarding</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="px-4 py-3">{{ $ticket->passenger_name }}</td>
                        <td class="px-4 py-3">{{ $ticket->passenger_phone }}</td>
                        <td class="px-4 py-3">{{ $ticket->seat_number }}</td>
                        <td class="px-4 py-3">
                            @if($ticket->boarding_time)
                                <span class="text-green-600 font-semibold">✅ {{ $ticket->boarding_time->format('d M H:i') }}</span>
                            @else
                                <form action="{{ route('tickets.board', $ticket->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="bg-green-500 text-white px-3 py-1 rounded-full hover:bg-green-600 transition text-xs">
                                        Konfirmasi
                                    </button>
                                </form>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            @if(!$ticket->boarding_time)
                                <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Hapus tiket ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white px-3 py-1 rounded-full hover:bg-red-600 transition text-xs">
                                        Hapus
                                    </button>
                                </form>
                            @else
                                <span class="text-gray-400 text-xs">Tidak bisa dihapus</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6 text-center">
        <a href="{{ route('flights.index') }}" class="bg-gray-300 px-4 py-2 rounded-xl hover:bg-gray-400 transition">⬅️ Kembali</a>
    </div>
@endsection
