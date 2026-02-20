<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            // Food
            ['name' => 'Burger', 'type' => 'food', 'price' => 10.00, 'description' => 'Delicious beef burger'],
            ['name' => 'Pizza', 'type' => 'food', 'price' => 15.00, 'description' => 'Large margherita pizza'],
            ['name' => 'Salad', 'type' => 'food', 'price' => 8.00, 'description' => 'Fresh garden salad'],

            // Drinks
            ['name' => 'Soda', 'type' => 'drink', 'price' => 2.50, 'description' => 'Various soft drinks'],
            ['name' => 'Beer', 'type' => 'drink', 'price' => 5.00, 'description' => 'Local craft beer'],
            ['name' => 'Wine', 'type' => 'drink', 'price' => 25.00, 'description' => 'Chardonnay 750ml'],

            // Housekeeping
            ['name' => 'Extra Towels', 'type' => 'housekeeping', 'price' => 0.00, 'description' => 'Request fresh towels'],
            ['name' => 'Room Cleaning', 'type' => 'housekeeping', 'price' => 0.00, 'description' => 'Standard daily cleaning'],
            ['name' => 'Laundry Service', 'type' => 'housekeeping', 'price' => 12.00, 'description' => 'Full bag laundry'],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
