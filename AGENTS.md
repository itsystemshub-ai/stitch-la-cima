# Agentes de Kilo para Stitch La Cima

Este archivo define los agentes personalizados para trabajar con el proyecto Stitch La Cima.

## Agentes Disponibles

### artisan
Ejecutar comandos de Artisan de Laravel

### test
Ejecutar tests de PHPUnit

### migrate
Ejecutar migraciones de base de datos

### seed
Ejecutar seeders de base de datos

### cache:clear
Limpiar cache de Laravel

### config:cache
Cachear configuración de Laravel

### route:cache
Cachear rutas de Laravel

### view:cache
Cachear vistas de Blade

## Comandos Personalizados

### setup-dev
Configurar entorno de desarrollo completo

### deploy-prod
Desplegar a entorno de producción

### backup-db
Crear respaldo de base de datos

### restore-db
Restaurar base de datos desde respaldo

## Configuración

- PHP: 8.2+
- Laravel: 12.x
- Base de datos: SQLite (desarrollo), MySQL (producción)
- Cache: Redis
- Colas: Database (desarrollo), Redis (producción)

## Notas

Este proyecto sigue las mejores prácticas de Laravel con:
- Arquitectura limpia usando Services, Repositories y DTOs
- Testing automatizado con PHPUnit
- CI/CD con GitHub Actions
- Documentación técnica completa