@echo off
echo ========================================
echo Resetting Database and Adding Rooms...
echo ========================================
cd /d C:\xampp\htdocs\Campsallpat
echo.
echo Current directory: %CD%
echo.
echo WARNING: This will delete all existing data!
echo Running migrations and seeder...
echo.
C:\xampp\php\php.exe artisan migrate:fresh --seed
echo.
echo ========================================
echo Done! Database reset and rooms added.
echo ========================================
pause
