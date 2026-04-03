<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

function addRoom($name, $type, $capacity, $price, $image, $images)
{
    \App\Models\Room::updateOrCreate(
        ['name' => $name],
        [
            'type' => $type,
            'capacity' => $capacity,
            'price_per_night' => $price,
            'description' => "A beautiful {$type} room.",
            'is_available' => true,
            'housekeeping_status' => 'clean',
            'image' => $image,
            'images' => $images
        ]
    );
}

addRoom('Twin Deluxe Room', 'Twin Deluxe', 2, 120, 'pcs2.jpeg', ['pcs3.jpeg', 'pcs1.jpeg']);
addRoom('Standard Double Room', 'Standard Double', 2, 100, 'pcs15.jpeg', ['pcs10.png', 'pcs16.png']);
addRoom('Family Cottage', 'Family Cottage', 4, 250, 'pcs5.png', ['pcs6.png', 'pcs8.png']);

echo "Requested rooms have been successfully added!\n";
