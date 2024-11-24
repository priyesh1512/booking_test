<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- Simple, fast routing engine.
- Powerful dependency injection container.
- Multiple back-ends for session and cache storage.
- Expressive, intuitive database ORM.
- Database agnostic schema migrations.
- Robust background job processing.
- Real-time event broadcasting.

## Project Plan for Travel Booking System (Hotels Only)

### 1. Controllers and Routing (15 Points)
#### Organize Routes:
- Use `api.php` for API routes if needed and `web.php` for general routes.
- Structure routes to separate user and admin functionalities.
- Follow RESTful naming conventions: `index`, `create`, `store`, `show`, `edit`, `update`, `destroy`.
- Implement middleware for route protection, such as `auth` and role-based middleware (admin or user).

#### Controllers:
- Use resource controllers for managing CRUD operations:
