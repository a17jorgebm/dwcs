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

* Dentro del directorio `www` de tu repositorio crea un directorio que se llame `T2Examen`.

* Asegúrate de que el profesor sea colaborador de tu repositorio (xulioxesus@gmail.com).

* Descomprime el contenido del archivo `contenidoExamen.zip` de la tarea del examen en la carpeta `www/T2Examen/`. Puedes utilizar el comando unzip desde el terminal para hacerlo.

* No borres el fichero `Enunciado.md`.

* Haz commit una vez que esté preparado todo.

* También puedes hacer push a tu repositorio remoto.

## Ejercicio 1 - Sesiones (2.5 puntos)

Modifica la aplicación que se encuentra en la carpeta `e1` para que funcione correctamente el login y el logout.

Fíjate que los usuarios están directamente en el fichero de login.php.

No hay que interactuar con ninguna base de datos.

**Haz commit del ejercicio. También puedes hacer push a tu repositorio.**

## Ejercicio 2 - Ficheros (2.5 puntos)

Modifica la aplicación que se encuentra en la carpeta `e2`.

Cuando se envía el formulario se debe guardar la nota con el nombre del fichero que se encuentra en el primer campo del formulario. El contenido del fichero debe ser el segundo campo del formulario.

Modifica el index para que se muestre un listado de los ficheros que hay en el directorio "notas".

**Haz commit del ejercicio. También puedes hacer push a tu repositorio.**

## Ejercicio 3 - Clases abstractas (2.5 puntos)

Dada la clase `Figura` que se encuentra en el directorio `e3`.

Implementa la clase Rectangulo de forma que herede de Figura e implemente todas sus operaciones abstractas:

- Debe tener dos atributos privados, ancho y alto.
- Un constructor que permita construir objetos cambiando ancho y alto.
- Las operaciones de la clase padre.
- El método dibujar imprime en pantalla un mensaje de que se dibuja la figura y muestra el ancho y alto.
- El método agrandar multiplica alto y ancho por el factor indicado.
- El método encoger divide el ancho y el alto por el factor indicado.

Prueba la clase Rectangulo en el fichero `RectanguloTest.php` creando un objeto y dibujándolo. Agrándalo y dibújalo de nuevo. Encógelo y dibújalo otra vez.

**Haz commit del ejercicio. También puedes hacer push a tu repositorio.**

## Ejercicio 4 - Interfaces y herencia (2.5 puntos)

En el directorio `e4`.

Define una interfaz `Mascota` con las operaciones `obtenerNombre` y `emitirSonido`.

Define una clase `Animal` que implemente la interfaz `Mascota`. Dicha clase debe cumplir:

- dos atributos protegidos
    - nombre
    - edad
- el constructor apropiado para dar valores a los atributos.
- los getters para los atributos
- un método abstracto `emitirSonido`.

Define una clase `Perro` que herede de `Animal` y cuando emita un sonido imprima "Guau, guau".

Define una clase `Gato` que herede de `Animal` y cuando emita un sonido imprima "Miuau, miauu".

Prueba las clases Perro y Gato en un fichero llamado `Test.php`.


**Haz commit del ejercicio. También puedes hacer push a tu repositorio.**

## Finalizar y entregar el examen

* Realiza un push a tu repositorio.
* Entrega tu repositorio comprimido en la tarea disponible en el aula virtual.
* El nombre del fichero `T2Examen.zip`.
* Entrega la URL de tu repositorio en la tarea disponible en el aula virtual.