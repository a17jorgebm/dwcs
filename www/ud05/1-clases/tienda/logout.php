<?php

session_start();
unset($_SESSION['nombre']);
unset($_SESSION['apellidos']);
unset($_SESSION['edad']);
unset($_SESSION['provincia']);

header('Location: login.php');