<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Flight;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function create(Flight $flight)
    {
        return view('tickets.create', compact('flight'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'flight_id' => 'required|exists:flights,id',
            'passenger_name' => 'required|string',
            'passenger_phone' => 'required|string',
            'seat_number' => 'required|string',
        ]);

        Ticket::create($validated);
        return redirect()->route('tickets.index', $validated['flight_id']);
    }

    public function index(Flight $flight)
    {
        $tickets = $flight->tickets;
        return view('tickets.index', compact('flight', 'tickets'));
    }

    public function board(Ticket $ticket)
    {
        $ticket->update([
            'boarding_time' => now(),
        ]);
        return back();
    }

    public function destroy(Ticket $ticket)
    {
        if ($ticket->boarding_time) {
            return back()->with('error', 'Ticket already boarded!');
        }
        $ticket->delete();
        return back();
    }
}
