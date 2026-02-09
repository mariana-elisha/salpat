@echo off
echo ========================================
echo Adding Rooms to Database...
echo ========================================
cd /d C:\xampp\htdocs\Campsallpat
echo.
echo Current directory: %CD%
echo.
echo Running seeder...
echo.
C:\xampp\php\php.exe artisan db:seed
echo.
echo ========================================
echo Done! Check your browser to see the rooms.
echo ========================================
pause
