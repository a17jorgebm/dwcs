## Sesiones

### !!!!!!!MOI IMPORTANTE!!!!!!!
`as sesion é o primeiro que hai que iniciar antes de facer nada. Incluso antes que crear unha cookie, xa que para evitar error deberíase facer antes de enviar cabeceiras HTTP ao navegador do usuario.`

---

Almacenanse globalmente no navegador ata que o usuario o pecha.

Cada pagina web solo ten acceso a sua propia sesión.
````php
//iniciar e asi
session_start() //iniciamos a sesion
session_id() //devolve o id da sesion
session_regenerate_id() //regenera o id da sesion

//borrar cousas
session_unset(); //borra todas as variables da sesion
session_destroy(); //destrue a sesion

//variables
$_SESSION['proba']='Dato interesante' //creamos a variable proba no array de sesion
unset($_SESSION['proba']) //borramos a variable
````

## Cookies
É un pequeno arquivo que o servidor incrusta no ordenador do usuario.

Basicamente cada vez que un ordenador fai unha peticion mediante un navegador, tamen envia un archivo de cookies, o cal podemos ler para recuperar a info.

CREACION:
````php
//solo o nome é obligatorio
setcookie(name, value, expire(en segundos), path, domain, secure, httponly);
//ej
setcookie('usuario','Jorge',time()+(60*60*24),'/')
````
1. **$name**: Nombre de la cookie.
2. **$value**: Valor de la cookie. Puede ser cualquier tipo de variable que pueda ser convertida a una cadena.
3. **$expire**: Tiempo de expiración de la cookie. Especifica cuando la cookie dejará de ser válida. Puedes proporcionar un valor en segundos desde la marca de tiempo Unix, o puedes usar un valor en el futuro calculado mediante time() + segundos.
4. **$path**: Ruta en el servidor para la cual la cookie estará disponible. Si es "/", la cookie estará disponible en todo el dominio.
5. **$domain**: Dominio para el cual la cookie está disponible. Por defecto, la cookie estará disponible para el dominio actual.
6. **$secure**: Si se establece en true, la cookie solo se enviará si la conexión es segura (es decir, si estás usando HTTPS).
7. **$httponly**: Si se establece en true, la cookie será accesible solo a través del protocolo HTTP y no estará disponible para scripts del lado del cliente. Esto ayuda a prevenir ataques de robo de cookies mediante scripts maliciosos.

Manipular cookies
````php
$_COOKIE['nomeDaCookie'] //pillamos a cookie con ese nome
setcookie('usuario','Eva editada',time()+(60*60*24),'/') //editamos a cookie volvendo a definila
setcookie('usuario','',time()-3600) //borramola poñendolle unha caducida negativa
````
Comprobar si estan habilitadas(esta nos apuntes pero creo que non é moi fiable)
````php
//crease unha de prueba
setcookie('usuario','Jorge',time()+60,'/')
//comprobase que teña algo o array de cookies
if (count($_COOKIE)>0){
    ...
}
````


# TEMA 7 SYMFONY
### Paquetes importantes
Descarganse todas facendo `composer require nomePaquete`, usa Flex de Symfony, que é unha extension de composer que facilita muito a descarga de paquetes e as depedencias de estes

* `templates` -> para usar twig, o gestor de plantillas
* `debug` -> barra de depuracion abaixo no navegador
* `symfony/asset` -> para importación de archivos estaticos como imagenes e asi en twig, ej: `{{ asset('css/imagen.jpg') }}`. Por ejemplo se a imagen cambia automaticamente añadelle para que o cache do cliente a actualice

