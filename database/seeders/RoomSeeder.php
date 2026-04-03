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
                'name' => 'Twin Deluxe Room',
                'description' => 'A beautifully designed Twin Deluxe room. Great value for friends or solo travelers.',
                'type' => 'Twin Deluxe',
                'capacity' => 2,
                'price_per_night' => 120.00,
                'amenities' => ['Wi-Fi', 'TV', 'Air Conditioning', 'Private Bathroom'],
                'is_available' => true,
                'image' => 'pcs2.jpeg',
                'images' => ['pcs3.jpeg', 'pcs1.jpeg'],
            ],
            [
                'name' => 'Standard Double Room',
                'description' => 'Cozy double room with comfortable beds and modern amenities. Ideal for couples.',
                'type' => 'Standard Double',
                'capacity' => 2,
                'price_per_night' => 100.00,
                'amenities' => ['Wi-Fi', 'TV', 'Air Conditioning', 'Private Bathroom'],
                'is_available' => true,
                'image' => 'pcs15.jpeg',
                'images' => ['rooms/pcs10.png', 'pcs16.png'],
            ],
            [
                'name' => 'Family Cottage',
                'description' => 'Spacious Family Cottage perfect for families or groups. Features amazing luxury and privacy.',
                'type' => 'Family Cottage',
                'capacity' => 4,
                'price_per_night' => 250.00,
                'amenities' => ['Wi-Fi', 'TV', 'Air Conditioning', 'Private Bathroom', 'Kitchenette'],
                'is_available' => true,
                'image' => 'pcs5.png',
                'images' => ['pcs6.png', 'pcs8.png'],
            ],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
