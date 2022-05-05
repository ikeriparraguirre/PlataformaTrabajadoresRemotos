# Plataforma para Trabajadores Remotos
Una aplicacion web que permite a los trabajadores poder subir y descargar archivos remotamente. <br>
Proyecto de fin de grado de Iker Iparraguirre. <br><br>
![](/public/images/portada_readme.PNG) <br>
## Instalación 🔧
```
Instalar Composer
```
```
composer create-project --prefer-dist laravel/laravel laravel
```
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
### Ver actividades 📅
Para poder ver tus actividades primero hay que iniciar sesion, si no tienes una cuenta te puedes registrar en la pagina de registro. <br>
Una vez ya registrado o iniciado sesion se tendrá acceso al sitio web y pulsando sobre el icono del calendario se te redirigirá a la pagina donde puedes ver todas tus actividades. <br>
En esta pagina podrás ver un calendario con un dia morado, que sera el dia de hoy y luego un dia con un azul oscuro, que sera el dia que ha seleccionado el usuario, pulsando sobre otro dia cambiara el seleccionado a otro. <br>
Si hay alguna actividad para de hoy se mostrara debajo del calendario con un color rosa. <br>
Si hay alguna actividad otro dia que no sea hoy se podra ver que el dia esta marcado con un color azul claro y pulsando sobre ese dia podremos ver las actividades.<br>
### Añadir actividades ➕
Para poder añadir actividades primero hay que iniciar sesion, si no tienes una cuenta te puedes registrar en la pagina de registro. <br>
Una vez ya registrado o iniciado sesion se tendrá acceso al sitio web y pulsando sobre el icono del calendario se te redirigirá a la pagina donde puedes ver todas tus actividades, pulsando sobre el boton de añadir actividad se te redirigirá a la pagina donde puedes añadir las actividades. <br>
En esta pagina hay un formulario donde para añadir una actividad se tenien que llenar todos los campos. <br>
Una vez rellenados todos los campos, si pulsamos sobre el boton de + se añadira la actividad a la base de datos y se mostrara un mensaje indicando que la actividad se ha añadido correctamente, en cambio, si ha ocurrido un error se mostrara el mensaje de error en la pagina.
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
| <p align='center'>Ya existe un archivo con este nombre en el servidor.</p> | <p align='center'>Indica que ya hay un archivo con el mismo nombre en el servidor, para evitar este error se cambia el nombre y ya.</p> |
| <p align='center'>Error al eliminar el archivo</p> | <p align='center'>Indica que ha habido un error al borrar el archivo del servidor.</p> |
| <p aling='center'>Nombre de la actividad incorrecta.</p> | <p align='center'>Indica que el nombre de la actividad no es correcta.</p> |
| <p aling='center'>La descripcion es incorrecta.</p> | <p align='center'>Indica que la descripcion de la actividad no es correcta.</p> |
| <p align='center'>La fecha es incorrecta.</p> | <p align='center'>Indica que la fecha de la actividad no es correcta.</p> |
| <p align='center'>No se ha podido añadir la actividad</p> | <p align='center'>Indica que ha habido un error a la hora de subir la actividad a la base de datos.</p> |
