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





# AutoPark

Aplicación web multipágina para buscar, consultar, reservar, publicar y administrar espacios de estacionamiento.

## Equipo

**Equipo:** Grey Lancer  
**Cuatrimestre y grupo:** 4.º Cuatrimestre – Grupo 1  
**Líder / integración del repositorio:** Fernando Ruiz Díaz

### Integrantes

- Fernando Ruiz Díaz
- Daniela Doñu Bolteada
- Guillermo Ruiz Marquez
- Johan Baru Cernates Gonzalez
- Fernanda Itzel Hernandez Perez
- Aritzel Vera Tena
- Mario Camacho

## Objetivo

Desarrollar una aplicación web responsive que permita a los usuarios localizar estacionamientos disponibles, consultar información relevante, realizar reservas y administrar espacios publicados desde una interfaz clara y consistente.

## Tecnologías utilizadas

- HTML5
- CSS3
- JavaScript
- Bootstrap 5.3.3
- Bootstrap Icons 1.11.3
- Git
- GitHub
- GitHub Projects / Kanban
- Figma

## Características principales

- Landing pública.
- Registro e inicio de sesión.
- Dashboard de usuario.
- Búsqueda de estacionamientos.
- Consulta de detalle de un estacionamiento.
- Reserva de espacios.
- Cancelación e historial de reservas.
- Publicación y edición de espacios.
- Gestión de disponibilidad, cantidad y horarios.
- Perfil de usuario.
- Cierre de sesión.
- Páginas públicas de Nosotros, Servicios y Contacto.
- Formulario de contacto con validación HTML5.
- Diseño responsive para escritorio y dispositivos móviles.

## Componentes de Bootstrap utilizados

AutoPark integra Bootstrap 5 de forma real, manteniendo la identidad visual definida para el proyecto.

1. **Navbar + Collapse**: navegación responsive reutilizable.
2. **Cards**: tarjetas de servicios, características y contenido.
3. **Modal**: publicación, edición y gestión de disponibilidad de espacios.
4. **Nav Tabs**: cambio entre reservas activas e historial.
5. **Accordion**: preguntas frecuentes en Servicios.
6. **Toast**: confirmación visual del formulario de contacto.
7. **Badges**: disponibilidad, estados y etiquetas.
8. **Forms**: `form-control`, `form-select`, `form-check` y validación.
9. **Buttons**: botones Bootstrap combinados con la paleta de AutoPark.
10. **Grid**: `container`, `row`, `col-*` y utilidades responsive.

## Estructura del proyecto

```text
AutoPark/
├── index.html
├── nosotros.html
├── servicios.html
├── contacto.html
├── registro.html
├── login.html
├── inicio.html
├── busqueda.html
├── detalle.html
├── reservas.html
├── espacios.html
├── perfil.html
├── README.md
│
├── assets/
│   └── images/
│       └── logo-autopark.png
│
├── components/
│   └── navbar/
│       ├── navbar.html
│       ├── navbar.css
│       └── navbar.js
│
├── css/
│   ├── landing.css
│   ├── publicas.css
│   └── ...
│
├── js/
│   ├── landing.js
│   ├── contacto.js
│   └── ...
│
└── docs/
    ├── SRS.tex
    ├── SRS.pdf
    ├── Guia_Diseno.tex
    └── Guia_Diseno.pdf
```

Los archivos SRS y Guía de diseño se elaboran en LaTeX y se incorporan al directorio `docs/` para la entrega final.

## Flujo principal

```text
Landing
  ↓
Buscar
  ↓
Detalle
  ↓
Iniciar sesión (si es necesario)
  ↓
Reservar
  ↓
Mis reservas
  ↓
Cancelar / Historial
```

Los propietarios también pueden acceder a:

```text
Mis espacios
  ↓
Publicar
  ↓
Editar
  ↓
Gestionar disponibilidad
```

## Sesión durante esta etapa

La autenticación actual es una simulación de frontend mediante `localStorage`.

Las páginas privadas son:

- `inicio.html`
- `reservas.html`
- `espacios.html`
- `perfil.html`

La búsqueda y el detalle pueden consultarse sin iniciar sesión. Las acciones que requieren una cuenta redirigen a `login.html`.

> Esta lógica deberá sustituirse por autenticación real cuando se implemente el backend.

## Cómo visualizar el proyecto

1. Clonar el repositorio.
2. Abrir la carpeta en Visual Studio Code.
3. Ejecutar el proyecto mediante **Live Server** o cualquier servidor HTTP local.
4. Abrir `index.html`.

Ejemplo con Live Server:

```text
http://127.0.0.1:5500/index.html
```

No se recomienda abrir los archivos únicamente con `file://`, porque el navbar reutilizable se carga mediante `fetch()`.

## Metodología de trabajo

El proyecto utiliza una rama principal `main` y ramas por funcionalidad.

Ejemplos:

```text
feature/navbar
feature/registro
feature/login
feature/busqueda
feature/detalleEstacionamiento
feature/reservas
feature/rf08-disponibilidad
feature/landing
feature/bootstrap-integration
```

El flujo de integración utilizado es:

```text
Issue → Rama → Commits → Pull Request → Merge → Terminado
```

## Kanban

El tablero de GitHub Projects debe mantener las columnas:

- Backlog
- Por hacer
- En proceso
- En revisión
- Terminado

## Evidencias para la entrega
Entrega de capturas de los HTML funcionando correctamente en modalidad Escritorio
En este apartado se elaboraron y recopilaron las capturas de pantalla correspondientes a las evidencias del funcionamiento de las páginas HTML del proyecto AutoPark en modalidad Escritorio. Estas capturas permiten comprobar que cada una de las interfaces desarrolladas se visualiza y funciona correctamente en una computadora, respetando el diseño establecido y mostrando de manera adecuada los diferentes elementos de la aplicación web.
Empezaremos con la parte de el inicio en donde se encuentra un pequeño apartado de bienvenida 
<img width="1595" height="950" alt="image" src="https://github.com/user-attachments/assets/50094a90-ff2e-43eb-86dd-a2a7b43da6c8" />
En esta segunda captura podemos notar la evidencia para la busca de estacionamientos al igual que los disponibles en la zonas correspondiente.
<img width="1592" height="957" alt="image" src="https://github.com/user-attachments/assets/91568a17-cc3a-454d-95cc-6831c1c1498f" />
<img width="1597" height="952" alt="image" src="https://github.com/user-attachments/assets/7eaa022c-8ca5-46ea-ad34-6b5ba33703da" />
<img width="1591" height="962" alt="image" src="https://github.com/user-attachments/assets/09d86818-9ce5-4ff5-a2e0-8262f288b825" />
<img width="1587" height="957" alt="image" src="https://github.com/user-attachments/assets/fa6df7fb-83e9-44dc-bff5-e6171e164c8b" />
<img width="1592" height="961" alt="image" src="https://github.com/user-attachments/assets/912c0d93-b970-4fce-8881-fd04380215b0" />
<img width="1592" height="958" alt="image" src="https://github.com/user-attachments/assets/b301b048-4b0c-4769-a43e-c7b467e471b7" />
En esta parte se muestra lo del perfil del usario
<img width="1887" height="1050" alt="image" src="https://github.com/user-attachments/assets/bc88117f-895f-47f9-8c18-b442322c02d0" />


Entrega de Capturas de los HTML funcionando de una manera correcta este con las capturas en modalidad movil
En esta parte se entrega las capturas del todo el proyecto de como funciona
<img width="475" height="573" alt="image" src="https://github.com/user-attachments/assets/060af83d-1180-4412-8585-395d05049ba5" />
<img width="471" height="569" alt="image" src="https://github.com/user-attachments/assets/57f0c4c9-57a9-47ca-837a-c81659d8c2a8" />
<img width="470" height="567" alt="image" src="https://github.com/user-attachments/assets/dab0f43a-9994-40a3-b1b5-2be57e0cb40c" />
<img width="470" height="572" alt="image" src="https://github.com/user-attachments/assets/f9007aa2-3a7d-4083-a6fa-b95b03313687" />
<img width="470" height="579" alt="image" src="https://github.com/user-attachments/assets/6b409e7f-409f-4679-961e-913a769b93c7" />
<img width="470" height="566" alt="image" src="https://github.com/user-attachments/assets/410426b8-e67c-43c2-8e74-02bd3bc151d6" />
<img width="478" height="570" alt="image" src="https://github.com/user-attachments/assets/182473b8-d422-4da8-a784-613b4bde1767" />
<img width="472" height="570" alt="image" src="https://github.com/user-attachments/assets/0d712ec5-5dbf-450c-9d8d-964b94f94d1a" />
<img width="480" height="569" alt="image" src="https://github.com/user-attachments/assets/acfccebb-0ca8-4f9d-9372-4897a1a251dd" />
<img width="478" height="573" alt="image" src="https://github.com/user-attachments/assets/b54f46d9-aa74-4639-9f57-251169f33c11" />
<img width="476" height="571" alt="image" src="https://github.com/user-attachments/assets/95524bc4-a0bf-4f3a-b2ce-61fdff5ef28a" />
<img width="478" height="576" alt="image" src="https://github.com/user-attachments/assets/98671956-9f2a-493d-85cd-d53921a14152" />
<img width="473" height="574" alt="image" src="https://github.com/user-attachments/assets/cf344aee-ffce-428a-9e85-e9a133d49f93" />
<img width="475" height="570" alt="image" src="https://github.com/user-attachments/assets/55c59ae8-7531-4bdc-b684-2556c8e0b2f7" />
<img width="495" height="573" alt="image" src="https://github.com/user-attachments/assets/208c63f6-1212-4670-9c14-c452867997a7" />
<img width="496" height="569" alt="image" src="https://github.com/user-attachments/assets/29f4cd82-8e79-44ce-b180-9c611dab5f70" />
<img width="496" height="570" alt="image" src="https://github.com/user-attachments/assets/a445557c-5c34-42aa-b9e1-247122302ef1" />
<img width="497" height="570" alt="image" src="https://github.com/user-attachments/assets/ff77036d-4dad-40ba-8e1d-4503e37d8fc4" />


## Documentación

La documentación final se almacenará en `docs/`:

- `SRS.tex`
- `SRS.pdf`
- `Guia_Diseno.tex`
- `Guia_Diseno.pdf`

El SRS y la Guía de diseño se elaborarán en LaTeX como parte de la entrega documental.
----------------------------------------------------------------------------------------------------
## Implementación de Laravel al Proyecto 
En esta sección se integra el backend del sistema utilizando **Laravel** bajo el patrón Arquitectónico **MVC (Modelo-Vista-Controlador)**, conectándose a una base de datos relacional en **PostgreSQL**.
## Aspectos claves implementados:
-**Migraciones y Modelos:** Estructuración de tablas en PostgreSQL (como `espacios`, `reservas`, `usuarios` y `contactos`).
- **Controladores y Endpoints (API / Web):** Lógica de negocio para manejar peticiones HTTP seguras con protección CSRF.
- **Vistas Blade:** Integración de componentes visuales con Bootstrap 5 que consumen los endpoints mediante JavaScript (`Fetch API`) de forma dinámica.
## Características Principales
-**Sistema de Autenticación:** Registro, inicio de sesión seguro y gestión de perfiles de usuario.
- **Gestión de Espacios:** Visualización, filtrado y administración de los cajones de estacionamiento disponibles.
- **Módulo de Reservas:** Creación, actualización y cancelación de reservas de forma intuitiva.
- **Módulo de Contacto y Soporte:** Formulario público con validaciones en tiempo real y panel de administración (`/mensajes`) para supervisar, revisar y eliminar solicitudes de los usuarios conectadas directamente a la base de datos.
## Tecnologias y Stack
- **Backend:** PHP / Laravel (Arquitectura MVC)
- **Base de Datos:** PostgreSQL
- **Frontend / Diseño:** HTML5, Bootstrap 5, CSS3, JavaScript (Vanilla JS / Fetch API)
- **Control de Versiones:** Git y GitHub
Para esto es importante ya haber instalado Laravel y lo necesario para poder hacer una correcta conexión a la base datos.
## Guía de Instalación y Configuración Local 
En este caso se tubo que clonar el repositorio y ejecutar este proyecto en un entorno local, sigue estos pasos:
- **Clonar el repositorio:**
  ```bash
  git clone [https://github.com/hdez20892-ux/AutoPark-OL.git](https://github.com/hdez20892-ux/AutoPark-OL.git)
  cd AutoPark-OL
## Instalar las dependencias de PHP (Composer)
composer install
## Configurar el archivo de entorno
-**Copia el archivo de ejemplo y renubralo a .env**
cp .env.example .env
-**Genera la llave de la aplicación**
php artisan key:generate
## Configurar la Base de Datos
-**Abre tu archivo .env y configura tus credenciales de PostgreSQL**
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
## Ejecutar las migraciones
php artisan migrate
## Iniciar el servidor de desarrollo
php artisan serve
se abrirá una URL el cual es http://127.0.0.1:8000
## Capturas de Pantalla de cada interfaz realizada con el CRUD
En esta parte se mostrara las interfaces correspondientes los cuales son :
**Login**
-En esta parte el login se registra a una base datos correpondiente en la cual se validan los datos ingresados en la parte de creara cuenta
<img width="1357" height="856" alt="image" src="https://github.com/user-attachments/assets/a72cb44a-35c8-49a8-8f4b-671298f9eabe" />
En esta parte se muestra la tabla de datos y los registros pero también en la app lo muestra 
<img width="1627" height="646" alt="image" src="https://github.com/user-attachments/assets/2e420fcf-d0fc-44d2-ba89-f35bd01237c5" />
Ya después de esto te redirecciona ala interfaz principal en donde se encuentran todas las funciones correspondientes
<img width="1626" height="876" alt="image" src="https://github.com/user-attachments/assets/4f20ad06-b555-4cef-9249-7d7d3a6d68ef" />
**Buscar**
Em esta parte te manda a la búsqueda de estacionamiento pero para que te reserve necesitas en crear un nuevo estacionamientos en mis espacios el cual te dará publicar, después vuelves a la parte de buscar para que después puedas reservar en la parte de detalles y se registre en la parte de Mis Reservas.
<img width="1633" height="872" alt="image" src="https://github.com/user-attachments/assets/b3fe3a88-c2aa-42d6-bf17-8c08660cc921" />
<img width="1607" height="872" alt="image" src="https://github.com/user-attachments/assets/e1983511-1020-407e-9e0f-f2395a515a0d" />
<img width="1625" height="866" alt="image" src="https://github.com/user-attachments/assets/d95cce96-212a-4303-8c7c-7e10098906cb" />
**Mis espacios**
En este apartado se muestra la parte del CRUD correspondiente en el cual se elaboro para eliminar los espacio de igual manera se eliminaran en la parte de la base datos.
<img width="1627" height="876" alt="image" src="https://github.com/user-attachments/assets/23289a9d-08a0-4667-86aa-4c747c37577a" />
 En esta parte igual se encuentra la parte de la crear o publicar un nuevo espacio, el cual se genera el registró en la base de datos.
 <img width="1628" height="867" alt="image" src="https://github.com/user-attachments/assets/aaa2bed5-8a36-494b-b651-d7909ff65b8d" />
**Perfil**
Se genera un editar perfil y se igual una visualización del la contraseña puesta por el usuario dado.
<img width="1631" height="871" alt="image" src="https://github.com/user-attachments/assets/70d2d77b-1ef1-4c4a-8ee9-c2c679534bb5" />
Todas tienen una navegabilidad correspondiente de igual manera en la cual se ven correctamente con el mismo diseño responsiva con lo que ya teníamos en el proyecto anterior con HTML.
## Rutas de Navegacion
## 🗺️ Tabla de Rutas del Sistema

A continuación se detallan las rutas web y los endpoints de API configurados en el proyecto:

| Ruta / Endpoint | Método HTTP | Descripción |
| :--- | :---: | :--- |
| `/` o `/index` | `GET` | Página principal (Landing Page) del sistema. |
| `/inicio` | `GET` | Panel de inicio para usuarios autenticados. |
| `/busqueda` | `GET` | Interfaz de búsqueda de espacios de estacionamiento. |
| `/contacto` | `GET` | Vista del formulario público de contacto. |
| `/espacios` | `GET` | Listado y catálogo de espacios disponibles. |
| `/reservas` | `GET` | Vista HTML para la gestión de reservas del usuario. |
| `/usuarios` | `GET` | Vista web de gestión y administración de usuarios. |
| `/mensajes` | `GET` | Panel administrativo para revisar y eliminar mensajes de contacto. |
| `/api/contacto` | `POST` | Endpoint para registrar un nuevo mensaje de contacto. |
| `/api/contactos` | `GET` | Endpoint para obtener la lista de mensajes (API). |
| `/api/contactos/{id}` | `DELETE` | Endpoint para eliminar un mensaje específico desde el panel. |
| `/api/reservas` | `GET / POST` | Consulta y creación de reservas mediante peticiones asíncronas. |

