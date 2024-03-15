<?php

// Verificar si el usuario ha iniciado sesión
// Si el usuario no ha iniciado sesión, redirigir al formulario de inicio de sesión

// Bienvenida
echo "<h2>Bienvenido, {$_SESSION['username']}!</h2>";

// Enlace para cerrar sesión
echo '<p><a href="logout.php">Cerrar sesión</a></p>';
