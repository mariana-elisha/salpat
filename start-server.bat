@echo off
echo ========================================
echo Starting Laravel Development Server...
echo ========================================
cd /d C:\xampp\htdocs\Campsallpat
echo.
echo Server will start at: http://127.0.0.1:8000
echo Press Ctrl+C to stop the server
echo.
C:\xampp\php\php.exe artisan serve
pause
