# Aplicación Web para Gestión de Empleados

Este es un sistema de gestión de roles de empleados desarrollado con Laravel. Permite gestionar la asignación de roles, áreas y jefes para cada empleado.

## Requisitos

Asegúrate de tener instalados los siguientes requisitos:

- PHP >= 7.4
- Composer
- Laravel >= 8.x
- MySQL o cualquier base de datos compatible (Se esta usando SQLite)

## Instalación

1. **Clonar el repositorio**:
```bash
git clone https://github.com/andyBlack13/psicoalianza_laravel.git
cd psicoalianza_laravel
```

2. **Instalar dependencias**:
```bash
composer install
```
3. **Configurar el archivo de entorno**:
Copia el archivo .env.example a .env y edítalo para configurar tu base de datos y otras variables
```bash
cp .env.example .env
```

3.1 Asegúrate de actualizar los siguientes valores en tu archivo .env para usar SQLite
```bash
DB_CONNECTION=sqlite
DB_DATABASE=/path/to/database.sqlite
```

3.2 Asegúrate de que el archivo database.sqlite exista en la ruta especificada. Puedes crearlo manualmente o usar el siguiente comando para crear la base de datos:
```bash
touch database/database.sqlite
```

4. **Generar la clave de la aplicación**:
```bash
php artisan key:generate
```

5. **Ejecutar migraciones**:
```bash
php artisan migrate
```

6. **Cargar los datos iniciales**:
```bash
php artisan db:seed
```

7. **Cargar los datos iniciales**:
```bash
php artisan serve
```

8. **Accede a la aplicación en tu navegador en http://localhost:8000.**

9. **Rutas Disponibles:**
   - GET /employees - Lista todos los empleados.
   - GET /employees/create - Muestra el formulario para crear un nuevo empleado.
   - POST /employees - Almacena un nuevo empleado.
   - GET /employees/{id}/edit - Muestra el formulario para editar un empleado existente.
   - PUT /employees/{id} - Actualiza un empleado existente.
   - DELETE /employees/{id} - Elimina un empleado.

10. **Accede al Video de demostración:**
[Video Explicativo](https://www.loom.com/share/6013d11f5f724b4fb0b1b65a3c1ddca1?sid=13466988-f6b7-49c3-acc4-9e291c2e1b12)












