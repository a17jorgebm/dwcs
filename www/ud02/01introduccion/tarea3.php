<?php

/**Busca en la documentación de PHP las funciones de [manejo de variables](http://www.php.net/manual/es/funcref.php)

Comprueba el resultado devuelto por los siguientes fragmentos de código y analiza el resultado:
```php
- $a = “true”; // imprime el valor devuelto por is_bool($a)...
- $c = “false”; // imprime el valor devuelto por gettype($c);
- $d = “”; // el valor devuelto por empty($d);
- $e = 0.0; // el valor devuelto por empty($e);
- $f = 0; // el valor devuelto por empty($f);
- $g = false; // el valor devuelto por empty($g);
- $h; // el valor devuelto por empty($h);
- $i = “0”; // el valor devuelto por empty($i);
- $j = “0.0”; // el valor devuelto por empty($j);
- $k = true; // el valor devuelto por isset($k);
- $l = false; // el valor devuelto por isset($l);
- $m = true; // el valor devuelto por is_numeric($m);
- $n = “”; // el valor devuelto por is_numeric($n);
```
 */
 $a = "true"; echo is_bool($a)."<br>"; //false dado que es un string
 $c = "false"; echo gettype($c)."<br>"; //string dado que esta entrecomillado
 $d = ""; echo empty($d)."<br>"; //true dado que es un string vacio
 $e = 0.0; echo empty($e)."<br>"; //true dado que es lo que devuelve si el valor es 0
 $f = 0; echo empty($f)."<br>"; //true dado que es lo que devuelve si el valor es 0
 $g = false; echo empty($g)."<br>"; //true
 $h; echo empty($h)."<br>"; //true
 $i = "0"; echo empty($i)."<br>"; //true dado que lo considera vacio
 $j = "0.0"; echo empty($j)."<br>"; //false dado que no es un string vacio
 $k = true; echo isset($k)."<br>"; // true ya que si que tiene un valor no nulo
 $l = false; echo isset($l)."<br>"; //true ya que si que tiene un valor no nulo
 $m = true; echo is_numeric($m)."<br>"; //false ya que es un booleano
 $n = ""; echo is_numeric($n)."<br>"; //falso ya que es un string vacio
?>