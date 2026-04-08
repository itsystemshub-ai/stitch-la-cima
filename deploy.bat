@echo off
REM ============================================
REM Script de Despliegue Rapido - Zenith ERP
REM Mayor de Repuesto La Cima, C.A.
REM ============================================

echo.
echo ============================================
echo   Despliegue de Zenith ERP
echo   Mayor de Repuesto La Cima, C.A.
echo ============================================
echo.

REM Verificar dependencias
echo [1/5] Verificando dependencias...
where node >nul 2>nul
if %ERRORLEVEL% NEQ 0 (
    echo ERROR: Node.js no esta instalado
    pause
    exit /b 1
)

where npm >nul 2>nul
if %ERRORLEVEL% NEQ 0 (
    echo ERROR: npm no esta instalado
    pause
    exit /b 1
)

echo OK - Node.js detectado
echo.

REM Navegar al backend
echo [2/5] Instalando dependencias...
cd backend
call npm install
if %ERRORLEVEL% NEQ 0 (
    echo ERROR: Error instalando dependencias
    pause
    exit /b 1
)

echo.
echo [3/5] Generando Prisma Client...
call npx prisma generate
if %ERRORLEVEL% NEQ 0 (
    echo ERROR: Error generando Prisma Client
    pause
    exit /b 1
)

echo.
echo [4/5] Ejecutando migraciones...
call npx prisma migrate deploy
if %ERRORLEVEL% NEQ 0 (
    echo ADVERTENCIA: Error en migraciones, intentando crear base de datos...
    call npx prisma db push --accept-data-loss
)

echo.
echo [5/5] Poblando base de datos...
call npm run db:seed

echo.
echo ============================================
echo   Despliegue completado!
echo ============================================
echo.
echo Para iniciar el servidor:
echo   cd backend
echo   npm run dev   (desarrollo)
echo   npm start     (produccion)
echo.
echo Para ver la base de datos:
echo   npx prisma studio
echo.
pause
