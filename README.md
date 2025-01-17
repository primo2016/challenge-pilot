## Proyecto Laravel 

Este proyecto es una aplicación desarrollada con Laravel (backend). A continuación, se describen los pasos necesarios para configurar y ejecutar el proyecto en tu entorno local.

##Requisitos Previos

Asegúrate de tener instalados los siguientes programas en tu sistema:

PHP >= 8.2

Composer >= 2.5

MySQL >= 8.0 o cualquier base de datos compatible con Laravel

Git (opcional, pero recomendado)

## Instrucciones de Instalación

1. Clonar el repositorio

git clone https://github.com/primo2016/challenge-pilot.git
cd tu_repositorio

2. Instalar dependencias de PHP

Ejecuta el siguiente comando para instalar las dependencias de Laravel:

```bash
composer install
```

3. Configurar las variables de entorno

Renombra el archivo .env.example a .env:

```bash
cp .env.example .env
```

Edita el archivo .env y configura las siguientes variables según tu entorno:

APP_NAME=NombreDelProyecto
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_base_de_datos
DB_USERNAME=usuario_base_de_datos
DB_PASSWORD=contraseña_base_de_datos

4. Ejecutar migraciones 

Este paso creará las tablas necesarias en la base de datos:

```bash
php artisan migrate
```

6.Iniciar el servidor de desarrollo

```bash
php artisan serve
```
