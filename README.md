# TDAAW_2
Repositorio Para Tarea Practica N°2 de TDAAW

Colaboradores

Tomás Antileo (grupo 19 en la tarea práctica n° 1)

Felipe Bastidas (grupo 18 en la tarea práctica n° 1)

Jorge Fernández (grupo 18 en la tarea práctica n° 1)


# Pasos Utilizados

````terminal
composer create-project  laravel/laravel:^9.0 backend-tinder
````


## Colocar .env datos de mysql


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña


## **Creación de Modelos y Migraciones**:

````terminal
- php artisan make:model Perro -m
- php artisan make:model Interaccion -m
````


## Rehacer todas las migraciones

php artisan migrate:refresh

