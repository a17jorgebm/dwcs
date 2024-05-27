## Acceso al equipo

Usuario: dawmddwcs

Contraseña: DWCSdwcs!

## Antes de empezar

* Debes saber tus credenciales de acceso a `GitHub` y a la web de `fpadistancia`.
* Se debe emplear el PC asignado en el aula del examen. No se puede utilizar ningún otro ordenador ni teléfono.

* Podéis utilizar todos los materiales que queráis.

* Está permitido el uso de internet a excepción de sistemas como ChatGPT o Copilot.

* Se realiza la grabación del examen para una posible revisión.

* Debes trabajar en la máquina virtual que tienes disponible en el equipo y que se llama `DWESDeveloperExamen`.

* Clona el repositorio que utilizas para éste módulo en la máquina virtual.

* Deberás autorizar a Visual Studio Code para utilizar tu cuenta de GitHub.

* Recuerda recrear los contenedores de docker.

* Dentro del directorio `www` de tu repositorio crea un directorio que se llame `T3Examen`.

* Asegúrate de que el profesor sea colaborador de tu repositorio (xulioxesus@gmail.com).

* Descomprime el contenido del archivo `contenidoExamen.zip` de la tarea del examen en la carpeta `www/T3Examen/`. Puedes utilizar el comando unzip desde el terminal para hacerlo.

* No borres el fichero `Enunciado.md`.

* Haz commit una vez que esté preparado todo.

* También puedes hacer push a tu repositorio remoto.

## Ejercicio 1 - Flight (5 puntos)

Dada la base de datos adjunta "classicmodels", se debe crear una API REST que cumpla las siguientes especificaciones:

Tabla customers con la ruta /customers:

* GET: Al acceder a esta ruta se debe mostar todos los datos de la tabla. Debes mostrar la información de un único customer a través de su identificador.

* POST: Se debe poder insertar un customer en la base de datos.

* DELETE: Dado un id se debe poder eliminar un customer.

* PUT: Se podrá modificar de un customer su campo phone.

**Haz commit del ejercicio. También puedes hacer push a tu repositorio.**

## Ejercicio 2 - Symfony (5 puntos)

Modifica la aplicación que se encuentra en la carpeta `e2`.

* Lanza y el proyecto de symfony e instala los bundles necesarios para trabajar con vistas.

* Crea una página con la ruta `/pets` que muestre los datos que se encuentran en el archivo "pets.json". Deben mostrarse en formato HTML y las imágenes deben ser mostradas.

* Crea una página con la ruta `/petscache` que muestre los datos que se encuentran en el archivo "pets.json". Deben mostrarse en formato HTML y las imágenes deben ser mostradas. Se tiene que utilizar el sistema de caché de symfony con un tiempo de caducidad de 2 segundos.

**Haz commit del ejercicio. También puedes hacer push a tu repositorio.**

## Finalizar y entregar el examen

* Realiza un push a tu repositorio.
* Entrega tu repositorio comprimido en la tarea disponible en el aula virtual.
* El nombre del fichero `T3Examen.zip`.
* Entrega la URL de tu repositorio en la tarea disponible en el aula virtual.