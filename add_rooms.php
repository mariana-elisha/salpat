<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

function addRoom($name, $type, $capacity, $price)
{
    \App\Models\Room::firstOrCreate(
        ['name' => $name],
        [
            'type' => $type,
            'capacity' => $capacity,
            'price_per_night' => $price,
            'description' => "A beautiful {$type} room.",
            'is_available' => true,
            'housekeeping_status' => 'clean'
        ]
    );
}

addRoom('Room 1', 'Deluxe Double', 2, 120);
addRoom('Room 2', 'Standard Single', 1, 60);
addRoom('Room 3', 'Deluxe Double', 2, 120);
addRoom('Room 4', 'Standard Single', 1, 60);
addRoom('Room 5', 'Standard Single', 1, 60);

echo "Requested rooms have been successfully added!\n";
