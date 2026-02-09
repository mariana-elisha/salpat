@echo off
echo ========================================
echo Checking Rooms in Database...
echo ========================================
cd /d C:\xampp\htdocs\Campsallpat
echo.
echo Running check...
echo.
C:\xampp\php\php.exe artisan tinker --execute="\$rooms = App\Models\Room::all(); echo 'Total rooms found: ' . \$rooms->count() . PHP_EOL; foreach(\$rooms as \$room) { echo \$room->id . '. ' . \$room->name . ' (' . \$room->type . ') - $' . \$room->price_per_night . PHP_EOL; }"
echo.
echo ========================================
echo If you see 0 rooms, run seed-rooms.bat
echo ========================================
pause
