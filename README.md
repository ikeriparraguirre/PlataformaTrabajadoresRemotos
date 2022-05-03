# Plataforma para Trabajadores Remotos
Una aplicacion web que permite a los trabajadores poder subir y descargar archivos remotamente. <br>
Proyecto de fin de grado de Iker Iparraguirre. <br>
## Instalación 🔧
```
Instalar [Composer](https://getcomposer.org/)
```
Instalar Laravel con Composer.
```
composer create-project --prefer-dist laravel/laravel laravel
```
Modificar .env.example a .env
```
copy .env.example .env o cp .env.example .env
```
```
Modificar los datos del .env: DB_HOST, DB_PORT, DB_DATABASE...
```
```
php artisan key:generate
```
```
php artisan migrate
```
```
php artisan serve
```
```
Ir a http://localhost:8000/
```
## Funcionamiento ⚙️
Para poder usar esta aplicacion web es imprescindible tener una cuenta.
### Subir un archivo 🔼
Para poder subir un archivo primero hay que iniciar sesion, si no tienes una cuenta te puedes registrar en la pagina de registro. <br>
Una vez ya registrado o iniciado sesion se tendrá acceso al sitio web y pulsando sobre el icono de subir se te redirigirá a la pagina de subir achivos. <br>
En esta pagina podras subir cualquier archivo al servidor, pulsando sobre el icono del archivo se abrira una pestaña donde puedes elegir el archivo a subir. <br>
Una vez elegido el archivo a subir podrás cambiarle el nombre, por defecto tendra el mismo nombre que tenia el archivo en tu ordenador. <br>
Por ultimo pulsando sobre el boton de "Subir" se subirá el archivo al servidor.
### Descargar un archivo 🔽
Para poder descargar un archivo primero hay que iniciar sesion, si no tienes una cuenta te puedes registrar en la pagina de registro. <br>
Una vez ya registrado o iniciado sesion se tendrá acceso al sitio web y se te redirigirá a la pagina de archivos.<br>
En esta pagina podrás buscar por nombre todos los archivos subidos al servidor, si haces una busqueda y los archivos devueltos son imagenes podras previsualizarlos antes de descargarlos. <br>
Para descargar se pulsa sobre el boton azul de descargar. <br>
## Errores ❌
Los errores mas comúnes son los siguientes.
| Error | Explicación |
| --- | --- |
| <p align='center'>Correo electrónico o contraseña incorrecta.</p> | <p align='center'>Indica que los campos de Correo electrónico o contraseña son incorrectos.</p> |
| <p align='center'>Este campo es obligatorio.</p> | <p align='center'>Indica que hay un campo vacio que es obligatorio.</p> |
| <p align='center'>Las contraseñas no coinciden.</p> | <p align='center'>Indica que las dos contraseñas de contraseña y confirmar contraseña son diferentes.</p> |
| <p align='center'>No se ha encontrado ningun archivo.</p> | <p align='center'>No es un error como tal pero indica que no se ha encontrado ningún archivo.</p> |
| <p align='center'>Nombre del archivo no valido.</p> | <p align='center'>Indica que el nombre del archivo no es valido, normalmente este error suele aparecer cuando el campo del nombre esta vacia.</p> |
| <p align='center'>Error al subir el archivo. Archivo no valido.</p> | <p align='center'>Indica que el archivo no es valido, es decir, que no se puede subir al servidor, este error aparece por ejemplo si se intenta subir un archivo .exe</p> |

