<html>
    <head>
        <meta charset="utf-8">
        <title>HTML</title> 
    </head>
    <body>
        <div>
            <!-- Aquí va el formulario-->
            <form method='post' action='<?php echo $_SERVER['PHP_SELF'];?>'>
                <label for='nombre'>Nombre: </label>
                <input type='text' name='nombre' required value='<?php echo $_POST['nombre']??''; ?>'>
                <label for='apellidos'>Apellidos</label>
                <input type='text' name='apellidos' required value='<?php echo $_POST['apellidos']??''; ?>'>
                <button type='submit'>Enviar</button>
            </form>
        </div>

            <div>
                <?php 
                    /**  Cree un formulario que solicite su nombre y apellido. Cuando se reciben los datos, se debe mostrar la siguiente información:
                     * Nombre: `xxxxxxxxx`
                     *  Apellidos: `xxxxxxxxx`
                     * Nombre y apellidos: `xxxxxxxxxxxx xxxxxxxxxxxx`
                     * Su nombre tiene caracteres `X`.
                     * Los 3 primeros caracteres de tu nombre son: `xxx`
                     * La letra A fue encontrada en sus apellidos en la posición: `X`
                     * Tu nombre en mayúsculas es: `XXXXXXXXX`
                     * Sus apellidos en minúsculas son: `xxxxxx`
                     * Su nombre y apellido en mayúsculas: `XXXXXX XXXXXXXXXX`
                     * Tu nombre escrito al revés es: `xxxxxx`
                    */
                    
                    $resultado = '';
                    //Aquí el código php que muestra la información solicitada.
                    if($_SERVER['REQUEST_METHOD']=='POST'){
                        $nombre=htmlspecialchars(trim($_POST['nombre']));
                        $apellidos=htmlspecialchars(trim($_POST['apellidos']));
                        $nombreApel=$nombre.' '.$apellidos;
                        $longNombre=strlen($nombre);
                        $primeros3Nombre=substr($nombre,0,3);
                        $posicionA=(strpos(strtolower($apellidos),'a')===false)?
                            "La letra A no fue encontrada en sus apellidos":
                            "La letra A fue encontrada en sus apellidos en la posición: ".strpos(strtolower($apellidos),'a');
                        $nombreMayusc=strtoupper($nombre);
                        $apelMin=strtolower($apellidos);
                        $nombreApelMayusc=strtoupper($nombreApel);
                        $nombreReves=strrev($nombre);

                        $resultado="
                        Nombre: $nombre<br>
                        Apellidos: $apellidos<br>
                        Nombre y apellidos: $nombreApel<br>
                        Su nombre tiene $longNombre caracteres.<br>
                        Los 3 primeros caracteres de tu nombre son: $primeros3Nombre<br>
                        $posicionA<br>
                        Tu nombre en mayúsculas es: $nombreMayusc<br>
                        Sus apellidos en minúsculas son: $apelMin<br>
                        Su nombre y apellido en mayúsculas: $nombreApelMayusc<br>
                        Tu nombre escrito al revés es: $nombreReves
                        ";
                    }

                    echo $resultado;
                ?>
        </div>
    </body>
</html>
