<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'name' => 'Concert XYZ',
            'date' => '2025-06-15',
            'venue' => 'Arena 1',
            'available_seats' => 100,
        ]);
        Event::create([
            'name' => 'Comedy Show ABC',
            'date' => '2025-07-01',
            'venue' => 'Hall B',
            'available_seats' => 150,
        ]);

        Event::create([
            'name' => 'Music Festival 123',
            'date' => '2025-08-20',
            'venue' => 'Park Stadium',
            'available_seats' => 500,
        ]);

        Event::create([
            'name' => 'Theater Play XYZ',
            'date' => '2025-09-10',
            'venue' => 'City Theater',
            'available_seats' => 200,
        ]);
    }
}
