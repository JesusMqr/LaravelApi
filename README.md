# Laravel 11 API Project

## Introducción

Este proyecto es una API construida con Laravel 11. Proporciona funcionalidades de autenticación, gestión de usuarios, equipos, publicaciones, capítulos y imagenes.

## Requisitos Previos

- PHP >= 8.0
- Composer
- MySQL o cualquier otro gestor de bases de datos compatible
- Node.js y npm (opcional, para compilación de assets frontend)
- Git (opcional, para clonación del repositorio)

## Instalación

### Clonar el Repositorio

```bash
git clone https://github.com/JesusMqr/LaravelApi.git
cd tu-repositorio


# API Documentation

## Autenticación

### Registro
- **Ruta**: `/register`
- **Método**: `POST`
- **Controlador**: `ApiController@register`
- **Descripción**: Registra un nuevo usuario.

### Login
- **Ruta**: `/login`
- **Método**: `POST`
- **Controlador**: `ApiController@login`
- **Descripción**: Autentica un usuario y devuelve un token.

## Rutas Protegidas (Requieren Autenticación)

### Perfil
- **Ruta**: `/profile`
- **Método**: `GET`
- **Controlador**: `ApiController@profile`
- **Descripción**: Obtiene la información del perfil del usuario autenticado.

### Logout
- **Ruta**: `/logout`
- **Método**: `GET`
- **Controlador**: `ApiController@logout`
- **Descripción**: Cierra la sesión del usuario autenticado.

## Usuarios

### Listar Usuarios
- **Ruta**: `/users`
- **Método**: `GET`
- **Controlador**: `UsersController@index`
- **Descripción**: Lista todos los usuarios.

### Obtener Rol de Usuario
- **Ruta**: `/user-role/{id}`
- **Método**: `GET`
- **Controlador**: `UsersController@getRole`
- **Descripción**: Obtiene el rol del usuario especificado por su ID.

## Equipos (Teams)

### Listar Equipos
- **Ruta**: `/teams`
- **Método**: `GET`
- **Controlador**: `TeamsController@index`
- **Descripción**: Lista todos los equipos.

### Crear Equipo
- **Ruta**: `/teams-create`
- **Método**: `POST`
- **Controlador**: `TeamsController@create`
- **Descripción**: Crea un nuevo equipo.

### Actualizar Equipo
- **Ruta**: `/teams-update`
- **Método**: `PUT`
- **Controlador**: `TeamsController@update`
- **Descripción**: Actualiza un equipo existente.

### Eliminar Equipo
- **Ruta**: `/teams-delete`
- **Método**: `DELETE`
- **Controlador**: `TeamsController@delete`
- **Descripción**: Elimina un equipo existente.

### Añadir Usuario a Equipo
- **Ruta**: `/teams-addUser`
- **Método**: `POST`
- **Controlador**: `TeamsController@addUser`
- **Descripción**: Añade un usuario a un equipo.

### Mostrar Usuarios de un Equipo
- **Ruta**: `/teams-showUsers`
- **Método**: `GET`
- **Controlador**: `TeamsController@showUsers`
- **Descripción**: Muestra los usuarios de un equipo.

### Eliminar Usuario de un Equipo
- **Ruta**: `/teams-removeUser`
- **Método**: `POST`
- **Controlador**: `TeamsController@removeUser`
- **Descripción**: Elimina un usuario de un equipo.

### Mostrar Posts de un Equipo
- **Ruta**: `/teams-showPosts`
- **Método**: `GET`
- **Controlador**: `TeamsController@getPosts`
- **Descripción**: Muestra los posts de un equipo.

## Posts

### Listar Posts
- **Ruta**: `/posts`
- **Método**: `GET`
- **Controlador**: `PostController@index`
- **Descripción**: Lista todos los posts.

### Mostrar Post
- **Ruta**: `/post-show`
- **Método**: `GET`
- **Controlador**: `PostController@show`
- **Descripción**: Muestra un post específico.

### Crear Post
- **Ruta**: `/post-create`
- **Método**: `POST`
- **Controlador**: `PostController@create`
- **Descripción**: Crea un nuevo post.

### Actualizar Post
- **Ruta**: `/post-update`
- **Método**: `POST`
- **Controlador**: `PostController@update`
- **Descripción**: Actualiza un post existente.

### Eliminar Post
- **Ruta**: `/post-delete`
- **Método**: `DELETE`
- **Controlador**: `PostController@delete`
- **Descripción**: Elimina un post existente.

### Obtener Capítulos de un Post
- **Ruta**: `/post-getChapters`
- **Método**: `GET`
- **Controlador**: `PostController@getChapters`
- **Descripción**: Obtiene los capítulos de un post.
