@echo off
cls
echo ========================================
echo LODGE BOOKING SYSTEM - FIX EVERYTHING
echo ========================================
echo.
cd /d C:\xampp\htdocs\Campsallpat
echo Current directory: %CD%
echo.

echo [STEP 1] Checking if rooms exist...
echo.
C:\xampp\php\php.exe artisan tinker --execute="\$count = App\Models\Room::count(); echo 'Current rooms in database: ' . \$count . PHP_EOL; if(\$count == 0) { echo 'NO ROOMS FOUND! Will add them now...' . PHP_EOL; } else { \$rooms = App\Models\Room::all(); foreach(\$rooms as \$r) { echo '  - ' . \$r->name . ' ($' . \$r->price_per_night . ')' . PHP_EOL; } }"
echo.

echo [STEP 2] Resetting database and adding 3 rooms...
echo.
C:\xampp\php\php.exe artisan migrate:fresh --seed
echo.

echo [STEP 3] Verifying rooms were added...
echo.
C:\xampp\php\php.exe artisan tinker --execute="\$rooms = App\Models\Room::all(); echo 'Total rooms now: ' . \$rooms->count() . PHP_EOL . PHP_EOL; echo 'ROOMS LIST:' . PHP_EOL; foreach(\$rooms as \$room) { echo '  ' . \$room->id . '. ' . \$room->name . ' (' . \$room->type . ')' . PHP_EOL; echo '     Price: $' . \$room->price_per_night . '/night' . PHP_EOL; echo '     Capacity: ' . \$room->capacity . ' guests' . PHP_EOL; echo '     Available: ' . (\$room->is_available ? 'Yes' : 'No') . PHP_EOL . PHP_EOL; }"
echo.

echo ========================================
echo DONE! Now do this:
echo ========================================
echo 1. Make sure server is running:
echo    - Double-click: start-server.bat
echo    - OR run: C:\xampp\php\php.exe artisan serve
echo.
echo 2. Open browser and go to:
echo    - http://127.0.0.1:8000
echo    - OR http://127.0.0.1:8000/rooms
echo.
echo 3. If you still don't see rooms, press Ctrl+F5
echo    to hard refresh the browser
echo.
echo ========================================
pause
