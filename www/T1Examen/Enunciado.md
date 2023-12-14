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

* Dentro del directorio `www` de tu repositorio crea un directorio que se llame `T1Examen`.

* Asegúrate de que el profesor sea colaborador de tu repositorio (xulioxesus@gmail.com).

* Descomprime el contenido del archivo `contenidoExamen.zip` de la tarea del examen en la carpeta `www/T1Examen/`. Puedes utilizar el comando unzip desde el terminal para hacerlo.

* No borres el fichero `Enunciado.md`.

* Haz commit una vez que esté preparado todo.

* También puedes hacer push a tu repositorio remoto.

## Ejercicio 1 - Pares e impares (2 puntos)

Edita el fichero `e1.php` que sólo va a contener código PHP.

Dado un array unidimensional de elementos cualquiera, por ejemplo:

    $arrayCualquiera = (4, 7, 4.5, "hola")

Crea una función `isPar` a la que se le pasa un array como parámetro y **devuelve** otro array de booleanos indicando si cada elemento del array es par o no. Para el caso anterior devolvería:

    [true,false,false,false]

Crea una función `isImpar` que haga justo lo contrario y **devuelva** también un array:

    [false,true,false,false]

Prueba las funciones en un script que se llame `e1_test.php` donde se vea de forma clara que las funciones están bien hechas.

**Haz commit del ejercicio. También puedes hacer push a tu repositorio.**

## Ejercicio 2 - Triángulo de letras (2 puntos)

Edita el fichero `e2.php`.

En el `div` de la clase `container` debe aparecer un triángulo de letras `a`.

Crea una **lista desordenada** de html en la que los elementos deben aparecer de la siguiente forma:
    
    a
    aa
    aaa
    aaaa
    ...

El número de elementos de la lista debe ser aleatorio entre 1 y 30. Puedes utilizar la función `random_int` para ello.

Cada vez que recargues la página, el número de elementos generado tiene que ser diferente.

**Haz commit del ejercicio. También puedes hacer push a tu repositorio.**

## Ejercicio 3 - Array multidimensional (2 puntos)

Edita el fichero `e3.php` que sólo va a contener código PHP.

Dado un array multidimensional, que representa nombres de marcas de coches, su stock y las ventas, como este:

    $coches = array (
        array("Volvo",22,18),
        array("BMW",15,13),
        array("Saab",5,2),
        array("Land Rover",17,15)
    );

Crea una función `imprimirTabla` que recibe como parámetro un array como el anterior e imprime en forma de tabla (en html) todos los campos de los subelementos si el nombre del coche tiene más de cuatro letras y sus ventas son mayores que 10.

Prueba la función en la página `e3_test.php`. El código HTML generado debe aparecer en el `div` de la clase `container`.

**Haz commit del ejercicio. También puedes hacer push a tu repositorio.**

## Ejercicio 4 - Depurar y corregir (1 punto)

En el directorio `e4` está la aplicación de la **tienda** con multitud de errores. ¡Alguien la ha destrozado! Debes reparar la aplicación con todos los fallos que encuentres.

Empieza probando index.php

**Comenta** cada modificación que hagas poniendo al inicio del comentario `tus iniciales`. `JJLP` sería mi caso.

Debes explicar la causa del error.

Utilizar el depurador te ayudará bastante.

**Si no pones tus iniciales no se contabilizará la corrección.**

**Haz commit del ejercicio. También puedes hacer push a tu repositorio.**

## Ejercicio 5 - Modificar aplicación (3 puntos)

En el directorio `e5` está la aplicación de **donaciones**. Se requiere que se modifique la aplicación para añadir las siguientes funcionalidades:

### Listar administradores

Añadir un botón en el index que permita visualizar un listado de los administradores. En ese listado debe aparecer un botón para eliminar cada administrador.

La generación del listado debe hacerse en un fichero llamado `listar_administradores.php`.

Crea las funciones necesarias siguiendo la forma de hacer que se utiliza en la aplicación.

**Haz commit del ejercicio. También puedes hacer push a tu repositorio.**

### Borrar administrador

Debe realizarse en un fichero llamado `borrar_administrador.php`.

Se tiene que comprobar que el identificador se recibe por $_GET, que no está vacío y que es un número entero válido.

Si el borrado es correcto o incorrecto es una información que debe aparecer tras el intento de realizar la operación.

Crea las funciones necesarias siguiendo la forma de hacer que se utiliza en la aplicación.

**Haz commit del ejercicio. También puedes hacer push a tu repositorio.**

### Informes

Añadir un botón en el index que permita visualizar una página de informes que debe llamarse `informes.php`.

En `informes.php` debe aparecer un botón con el texto `Donaciones entre fechas`.

Al presionar dicho botón se debe cargar un fichero `informe_donaciones_entre_fechas.php`.

En este último fichero tiene que aparecer un formulario en el que se puedan seleccionar dos fechas.

Al enviar el formulario al propio `informe_donaciones_entre_fechas.php` debe aparecer un listado de donaciones entre las dos fechas seleccionadas. Se entiende que la primera fecha es menor que la segunda fecha.

Crea las funciones necesarias siguiendo la forma de hacer que se utiliza en la aplicación.

**Haz commit del ejercicio. También puedes hacer push a tu repositorio.**

## Finalizar y entregar el examen

* Realiza un push a tu repositorio.
* Entrega tu repositorio comprimido en la tarea disponible en el aula virtual.
* El nombre del fichero `T1Examen.zip`.
* Entrega la URL de tu repositorio en la tarea disponible en el aula virtual.