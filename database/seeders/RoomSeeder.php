<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            [
                'name' => 'Family Room',
                'description' => 'Comfortable family room with two queen beds, perfect for families with children. Includes a small seating area.',
                'type' => 'Family',
                'capacity' => 4,
                'price_per_night' => 200.00,
                'amenities' => ['Wi-Fi', 'TV', 'Refrigerator', 'Air Conditioning', 'Extra Beds Available'],
                'is_available' => true,
            ],
            [
                'name' => 'Standard Double',
                'description' => 'Cozy double room with comfortable beds and modern amenities. Great value for couples or solo travelers.',
                'type' => 'Double',
                'capacity' => 2,
                'price_per_night' => 150.00,
                'amenities' => ['Wi-Fi', 'TV', 'Air Conditioning', 'Private Bathroom'],
                'is_available' => true,
            ],
            [
                'name' => 'Single Room',
                'description' => 'Compact single room ideal for solo travelers. Includes all essential amenities for a comfortable stay.',
                'type' => 'Single',
                'capacity' => 1,
                'price_per_night' => 100.00,
                'amenities' => ['Wi-Fi', 'TV', 'Air Conditioning', 'Private Bathroom'],
                'is_available' => true,
            ],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
