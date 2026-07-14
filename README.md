# Sistema POS - Punto de Venta

## Descripción

Sistema POS (Point of Sale) desarrollado como proyecto académico utilizando **Laravel** y **MySQL**, diseñado para facilitar la administración de un negocio mediante el control de productos, inventario, clientes y ventas.

El sistema implementa una arquitectura basada en el patrón MVC, proporcionando una interfaz intuitiva para la gestión de operaciones comerciales y un backend robusto para el manejo de la información.

---

## Características

- Inicio de sesión con autenticación de usuarios.
- Gestión de productos.
- Administración de categorías.
- Gestión de clientes.
- Registro de ventas.
- Control automático del inventario.
- Historial de ventas.
- Gestión de usuarios y roles.
- API REST para integración con aplicaciones externas.
- Validación de formularios.
- Interfaz web responsive.

---

## Tecnologías utilizadas

### Backend

- Laravel
- PHP
- Laravel Sanctum
- Composer

### Frontend

- Blade
- Bootstrap
- HTML5
- CSS3
- JavaScript

### Base de datos

- MySQL
- phpMyAdmin

### Herramientas

- XAMPP
- Visual Studio Code
- Postman / Thunder Client
- Git
- GitHub

---

## Funcionalidades principales

### Gestión de Productos

- Registrar productos
- Editar productos
- Eliminar productos
- Control de stock
- Gestión de precios

### Gestión de Categorías

- Crear categorías
- Editar categorías
- Eliminar categorías

### Gestión de Clientes

- Registrar clientes
- Editar información
- Consultar historial de compras

### Gestión de Ventas

- Registrar ventas
- Generación automática del detalle de venta
- Descuento automático del inventario
- Cálculo del total de compra

### Gestión de Usuarios

- Inicio de sesión
- Cierre de sesión
- Control de acceso según el rol del usuario

---

## Arquitectura

El proyecto sigue el patrón **Modelo - Vista - Controlador (MVC)** proporcionado por Laravel.

```
Usuario
    │
    ▼
Rutas (Routes)
    │
    ▼
Controladores
    │
    ▼
Modelos (Eloquent ORM)
    │
    ▼
Base de Datos (MySQL)
```

---

## Estructura del proyecto

```
POS-System/
│
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
│   ├── views/
│   ├── css/
│   └── js/
├── routes/
├── storage/
├── tests/
├── artisan
├── composer.json
├── package.json
└── README.md
```

---

## Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/TU_USUARIO/pos-system.git
```

### 2. Entrar al proyecto

```bash
cd pos-system
```

### 3. Instalar dependencias

```bash
composer install
```

```bash
npm install
```

### 4. Crear el archivo de entorno

```bash
cp .env.example .env
```

### 5. Generar la clave de Laravel

```bash
php artisan key:generate
```

### 6. Configurar la base de datos

Editar el archivo `.env`:

```
DB_DATABASE=pos
DB_USERNAME=root
DB_PASSWORD=
```

### 7. Ejecutar migraciones

```bash
php artisan migrate
```

Si existen seeders:

```bash
php artisan db:seed
```

### 8. Ejecutar el servidor

```bash
php artisan serve
```

---

## API REST

El sistema incluye endpoints para la administración de recursos como:

- Usuarios
- Productos
- Categorías
- Clientes
- Ventas

La autenticación se realiza mediante **Laravel Sanctum**.

---

## Capturas

Puedes agregar imágenes del sistema aquí.

### Login

![Login](images/login.png)

### Dashboard

![Dashboard](images/dashboard.png)

### Productos

![Productos](images/productos.png)

### Ventas

![Ventas](images/ventas.png)

---

## Aprendizajes

Durante el desarrollo del proyecto se aplicaron conocimientos sobre:

- Arquitectura MVC.
- Desarrollo de aplicaciones web con Laravel.
- Diseño e implementación de APIs REST.
- Autenticación mediante Laravel Sanctum.
- Manejo de bases de datos relacionales.
- CRUD completos.
- Gestión de inventario.
- Integración entre frontend y backend.
- Control de versiones con Git y GitHub.

---

## Autor

**Eduardo Tejada**

Ingeniero Informático

---

## Licencia

Proyecto desarrollado con fines académicos y de aprendizaje.
