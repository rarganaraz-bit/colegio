Colegio - Sistema de Gestión

Este es un proyecto realizado para el módulo de Aplicaciones Web de 2º de SMR. Permite la gestión integral de alumnos, profesores, aulas y asignaturas, cumpliendo con las restricciones horarias solicitadas.

Requisitos
- XAMPP o servidor Apache con PHP 7.4 o superior.
- MySQL / MariaDB.

Instrucciones de Instalación

1.  Clonar el repositorio:
    Descarga los archivos en tu carpeta local (ej. `C:/xampp/htdocs/colegio`).

2.  Configurar la Base de Datos:
    - Abre phpMyAdmin.
    - Crea una base de datos llamada `colegio`.
    - Importa el archivo `colegio.sql` incluido en este repositorio.

3.  Configuración de Conexión:
    El sistema ya está configurado para funcionar con los siguientes parámetros en el archivo `db.php`:
    - Usuario: `root`
    - Contraseña: `2007`
    - Host: `localhost`

4.  Acceso:
    Abre tu navegador y accede a: `http://localhost/colegio/index.php`

Funcionalidades
- CRUD (Crear, Leer, Actualizar, Borrar) de Alumnos, Profesores, Aulas y Asignaturas.
- Borrado lógico (marcado como borrado).
- Asignación automática de aulas libres.
- Control de restricciones de horario (8:00 a 14:00).
- Interfaz amigable con temática en color rosa.
