<?php
session_start();
// Destruir la sesión correctamente
if(isset($_SESSION['username'])){
    unset($_SESSION['username']);
}

// Redirigir al formulario de inicio de sesión
header('Location: index.php');
exit();
