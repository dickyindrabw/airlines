<x-app-layout>
    <div class="max-w-5xl mx-auto p-6">
        <h1 class="text-2xl font-bold text-center mb-6">Airplane Booking System</h1>

        <div class="mb-4">
            <h2 class="text-xl font-semibold">
                Ticket Details for {{ $flight->code }}
                <span class="float-right text-base font-medium">
                    {{ $flight->tickets->count() }} passengers &nbsp; • &nbsp; 
                    {{ $flight->tickets->whereNotNull('boarding_time')->count() }} boardings
                </span>
            </h2>
            <div class="text-sm flex justify-between mt-1">
                <div>{{ $flight->from }} → {{ $flight->to }}</div>
                <div>
                    Departure <span class="italic font-semibold">{{ $flight->departure }}</span> <br>
                    Arrived <span class="italic font-semibold">{{ $flight->arrival }}</span>
                </div>
            </div>
        </div>

        <table class="w-full text-left border-t border-b text-sm mt-4">
            <thead>
                <tr class="border-b">
                    <th class="py-2">No.</th>
                    <th>Passenger Name</th>
                    <th>Passenger Phone</th>
                    <th>Seat Number</th>
                    <th>Boarding</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($flight->tickets as $ticket)
                    <tr class="border-b">
                        <td class="py-2">{{ $loop->iteration }}</td>
                        <td>{{ $ticket->name }}</td>
                        <td>{{ $ticket->phone }}</td>
                        <td>{{ $ticket->seat }}</td>
                        <td>
                            @if ($ticket->boarding_time)
                                {{ \Carbon\Carbon::parse($ticket->boarding_time)->format('d-m-Y, H:i') }}
                            @else
                                <form method="POST" action="{{ route('tickets.boarding', $ticket->id) }}">
                                    @csrf
                                    <button class="bg-gray-300 px-3 py-1 rounded text-sm">Confirm</button>
                                </form>
                            @endif
                        </td>
                        <td>
                            <form method="POST" action="{{ route('tickets.destroy', $ticket->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="bg-gray-300 px-3 py-1 rounded text-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            <a href="{{ route('flights.index') }}" class="bg-gray-300 px-4 py-2 rounded">Back</a>
        </div>
    </div>
</x-app-layout>
