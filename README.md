# Documentación del CRUD de Tareas

Esta documentación describe el funcionamiento del sistema CRUD (Crear, Leer, Actualizar y Eliminar) para la gestión de tareas, implementado con Laravel, DaisyUI y JavaScript.

## Estructura del Proyecto

El proyecto sigue la arquitectura MVC (Modelo-Vista-Controlador) de Laravel:

*   **Modelos:** `app/Models/Task.php` (Define la estructura de las tareas en la base de datos).
*   **Controladores:** `app/Http/Controllers/TaskController.php` (Maneja la lógica de las peticiones HTTP).
*   **Vistas:** `resources/views/tasks` (Contiene las plantillas Blade para la interfaz de usuario).
*   **Rutas:** `routes/web.php` (Define las rutas de la aplicación).
*   **Enums:** `app/Enums/Status.php` (Define los posibles estados de una tarea).

## Uso de Enum en PHP en vez de una columna enum en db
Usar Enums de PHP (a partir de PHP 8.1) en lugar de columnas ENUM en la base de datos ofrece varias ventajas importantes, principalmente relacionadas con el mantenimiento, la legibilidad del código y la flexibilidad

### Desventajas
* Dificultad de migración y refactorización.
* Acoplamiento fuerte: El código de la aplicación se acopla directamente a la estructura de la base de datos.
* Limitaciones en la lógica de la aplicación.
### Ventajas
* Mayor flexibilidad y facilidad de mantenimiento
* Desacoplamiento del código
* Integración con POO
* Validación más sencilla

## Levantar el proyecto

```bash
npm i
npm run dev
```
```bash
composer install
php artisan migrate
php artisan serve
```


## Poblar la DB con datos de muestra
Por defecto viene con la creacion de 200 registros
```bash
php artisan db:seed TaskSeeder
```