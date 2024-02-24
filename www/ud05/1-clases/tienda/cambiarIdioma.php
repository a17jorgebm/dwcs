<?php
require 'funcions.php';

setIdioma($_POST['idioma']??IDIOMA_DEFECTO);

header('Location:index.php');