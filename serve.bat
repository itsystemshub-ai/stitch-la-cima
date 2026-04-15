@echo off
REM ============================================
REM Laravel Development Server - All in One
REM ============================================
REM This script starts:
REM   1. Vite (assets compilation)
REM   2. PHP Development Server
REM ============================================

setlocal enabledelayedexpansion

echo.
echo ╔════════════════════════════════════════════╗
echo ║  🚀 Laravel Dev Server                   ║
echo ║  Starting all services...                ║
echo ╚════════════════════════════════════════════╝
echo.

REM Check if npm is available
where npm >nul 2>&1
if %errorlevel% neq 0 (
    echo ⚠️  npm not found, starting without Vite
    echo.
    php artisan serve --host=127.0.0.1 --port=8000
    exit /b
)

echo 📦 Starting Vite dev server...
start "Vite Dev Server" /min cmd /c "cd /d "%~dp0" && npm run dev"

REM Wait for Vite to start (check for hot file)
set "retries=0"
set "max_retries=20"

:wait_loop
timeout /t 1 /nobreak >nul
set /a retries+=1
if exist "public\hot" (
    echo    ✓ Vite ready!
    echo.
    goto start_server
)
if !retries! lss !max_retries! goto wait_loop

echo    ⏳ Vite starting in background...
echo.

:start_server
echo 🌐 Starting PHP development server...
echo    → http://127.0.0.1:8000
echo.
echo 💡 Press Ctrl+C to stop the server
echo    (Vite will stop automatically)
echo.

REM Start Laravel server (this will block)
php artisan serve --host=127.0.0.1 --port=8000

REM Clean up Vite process when server stops
taskkill /fi "WindowTitle eq Vite Dev Server" /t /f >nul 2>&1
