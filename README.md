<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

------------------------------------------------------------------------------------------------------------------------------------------------------------
## AutoPark Sistema de Gestión de Estacionamientos

AutoPark es una plataforma web desarrollada con **Laravel** (backend) y **Bootstrap 5** (frontend) diseñada para optimizar la búsqueda, reserva y gestión de espacios de estacionamiento en tiempo real, ofreciendo una experiencia fluida, segura e intuitiva para los usuarios.

------------------------------------------------------------------------------------------------------------------------------------------------------------
## Descripción del Proyecto
Es una solución integral en la nube ideada para transformar y simplificar la gestión de estacionamientos en entornos urbanos. La plataforma permite a los conductores localizar y gestionar espacios disponibles de manera eficiente, rápida y transparente.
----------------------------------------------------------
### Problema que resuelve
Buscar un lugar para estacionar en zonas concurridas suele generar pérdida de tiempo, congestión vehicular y molestia en los conductores. Asimismo, muchos establecimientos carecen de herramientas digitales para monitorear su ocupación real y ofrecer información precisa a los usuarios.
-----------------------------------------------------------
### Solución propuesta
AutoPark conecta a los usuarios directamente con la disponibilidad de los estacionamientos mediante una arquitectura web responsiva y moderna:
- **Módulo de Usuario:** Interfaz intuitiva donde se pueden explorar estacionamientos por nombre o zona, consultar ubicaciones y mantener la información del perfil protegida mediante un sistema de validación dinámica en tiempo real.
- **Arquitectura Backend:** Estructura escalable basada en el patrón MVC (Modelo-Vista-Controlador) de Laravel, facilitando el control de registros, el filtrado preciso y la manipulación segura de datos mediante operaciones CRUD.

------------------------------------------------------------------------------------------------------------------------------------------------------------------

## Tecnologías y Herramientas
- **Backend:** PHP 8.x, Laravel Framework
- **Frontend:** HTML5, CSS3, JavaScript ,Bootstrap 5
- **Base de Datos:** en este caso se ocupara en su momento psql
- **Control de Versiones:** Git & GitHub

------------------------------------------------------------------------------------

## Características Principales
- **Búsqueda Dinámica:** Filtro de estacionamientos por nombre o ubicación con actualización inmediata de resultados.
- **Validación de Perfil en Tiempo Real:** Verificación activa de campos obligatorios con alertas visuales al instante y comprobación de formato válido de correo electrónico (`@`).
- **Seguridad e Interacción:** Botón dinámico para mostrar u ocultar la contraseña en los formularios de acceso y edición.
- **Diseño Responsivo:** Interfaz completamente optimizada para dispositivos móviles, tablets y computadoras de escritorio.

--------------------------------------------------------------------------------------------

## Capturas de Pantalla
En esta parte se mostrara el resultado final de mediante unas evidencias fotográficas en donde 
podemos conocer como quedo a nivel interfaz este aun no cuenta con un registro a la base de datos correspondiente, ya que la practica consistió en hacer un **CRUD** con las pantallas que las necesitara dentro del proyecto que ya teniamos respetando lo que ya teniamos elaborado.

**Esta es la parte de el inicio en donde se encuentra parte de buscar estacionamiento y la parte de publicar mi espacio**

<img width="1600" height="900" alt="image" src="https://github.com/user-attachments/assets/f058f410-8f4f-4388-8c22-9b46f89b00e1" />

**Esta es la parte en la cual se integro la de Crea tu cuenta es en la interfaz correspondiente**
<img width="1364" height="687" alt="image" src="https://github.com/user-attachments/assets/cd631857-c60d-4efd-b63a-974650014f99" />

** Esta es en la parte de bisecar y reservar estacionamiento en la cual como podemos ver elaboramos un CRUD para eliminar y editar**
<img width="663" height="658" alt="image" src="https://github.com/user-attachments/assets/a600c20e-d4be-41b6-83bf-55086cfe0d07" />

Nota: No se agrego mas ya que en este proyecto no se necesitaba muchos crud dolo se agrego en la parte en donde se necesitara.
------------------------------------------------------------------------------------

## Equipo de Desarrollo
**Fernanda Hernández** Lider  y backend
**Johan Baru** backend
**Daniela Doñu Bolteada** Frontend
**Aritzel** Frontend
**Guillermo Ruiz** QUA
**Mario** QUA


--------------------------------------------------------------------------------

## Instalación y Configuración Local
Para poder hacer la instalaciones correspondientes seguimos pasos una por un documento de instalación de una practica anterior por lo cuales recomendable seguir los siguientes pasos correspondientes:
Sigue estos pasos para ejecutar el proyecto en tu entorno local:

### Prerrequisitos
- PHP (>= 8.1)
- Composer
- Node.js & NPM
- Servidor MySQL (XAMPP, WAMP o equivalente)
### Pasos 
instalar la parte del Composer 
con el comando composer install
<img width="598" height="352" alt="image" src="https://github.com/user-attachments/assets/7bd896ea-bb2a-490c-bfd6-2faf84f95316" />
<img width="595" height="292" alt="image" src="https://github.com/user-attachments/assets/01185671-9fac-43a7-9773-e676f99a318d" />

