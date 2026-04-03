<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';

$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Gallery;
use Illuminate\Support\Facades\File;

$publicImagesDir = public_path('images');
$publicGalleriesDir = public_path('images/galleries');

if (!File::exists($publicGalleriesDir)) {
    File::makeDirectory($publicGalleriesDir, 0755, true);
}

$images = [
    "pcs1.jpeg", "pcs2.jpeg", "pcs3.jpeg", "pcs4.png", "pcs5.png",
    "pcs6.png", "pcs7.png", "pcs8.png", "pcs9.png", "pcs10.png",
    "pcs11.png", "pcs12.png", "pcs13.png", "pcs14.png", "pcs15.jpeg",
    "pcs16.png", "pcs17.png", "pcs18.png"
];

foreach ($images as $filename) {
    if ($filename == '') continue;
    
    $sourcePath = $publicImagesDir . '/' . $filename;
    $destinationPath = $publicGalleriesDir . '/' . $filename;
    
    if (File::exists($sourcePath)) {
        File::copy($sourcePath, $destinationPath);
        
        $exists = Gallery::where('image_path', 'galleries/' . $filename)->exists();
        if (!$exists) {
            Gallery::create([
                'title' => 'Camp Experience ' . str_ireplace(['pcs', '.jpeg', '.png'], ['', '', ''], $filename),
                'description' => 'Beautiful moments at Salpat Camp.',
                'image_path' => 'galleries/' . $filename,
                'is_active' => true,
            ]);
            echo "Added $filename \n";
        } else {
            echo "Skipped $filename (Already exists in DB)\n";
        }
    } else {
        echo "File $filename not found in public/images/ \n";
    }
}
echo "Done seeding galleries.\n";
