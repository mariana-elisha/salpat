@echo off
echo ========================================
echo Verifying and Fixing Rooms...
echo ========================================
cd /d C:\xampp\htdocs\Campsallpat
echo.
echo Step 1: Checking current rooms...
echo.
C:\xampp\php\php.exe artisan tinker --execute="echo 'Rooms count: ' . App\Models\Room::count();"
echo.
echo Step 2: Resetting and seeding...
echo.
C:\xampp\php\php.exe artisan migrate:fresh --seed
echo.
echo Step 3: Verifying rooms were added...
echo.
C:\xampp\php\php.exe artisan tinker --execute="\$rooms = App\Models\Room::all(); echo 'Total rooms: ' . \$rooms->count() . PHP_EOL; foreach(\$rooms as \$room) { echo '- ' . \$room->name . ' ($' . \$room->price_per_night . ')' . PHP_EOL; }"
echo.
echo ========================================
echo Done! Refresh your browser now.
echo ========================================
pause
