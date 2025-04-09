<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Flight;
use Carbon\Carbon;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Flight::create([
            'flight_code' => 'JT610',
            'origin' => 'SUB',
            'destination' => 'CGK',
            'departure_time' => Carbon::parse('2024-04-10 08:00:00'),
            'arrival_time' => Carbon::parse('2024-04-10 10:00:00'),
        ]);

        Flight::create([
            'flight_code' => 'GA215',
            'origin' => 'DPS',
            'destination' => 'JOG',
            'departure_time' => Carbon::parse('2024-04-11 12:30:00'),
            'arrival_time' => Carbon::parse('2024-04-11 14:00:00'),
        ]);

        Flight::create([
            'flight_code' => 'ID742',
            'origin' => 'CGK',
            'destination' => 'BDO',
            'departure_time' => Carbon::parse('2024-04-12 15:00:00'),
            'arrival_time' => Carbon::parse('2024-04-12 15:45:00'),
        ]);

        Flight::create([
            'flight_code' => 'SJ182',
            'origin' => 'PLM',
            'destination' => 'CGK',
            'departure_time' => Carbon::parse('2024-04-13 09:15:00'),
            'arrival_time' => Carbon::parse('2024-04-13 10:45:00'),
        ]);

        Flight::create([
            'flight_code' => 'QZ7551',
            'origin' => 'KNO',
            'destination' => 'PDG',
            'departure_time' => Carbon::parse('2024-04-14 17:00:00'),
            'arrival_time' => Carbon::parse('2024-04-14 18:30:00'),
        ]);
    }
}
