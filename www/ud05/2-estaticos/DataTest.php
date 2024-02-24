<?php

require ('Data.php');

date_default_timezone_set('Europe/Madrid');

echo  Data::getData()."<br>";
echo Data::getCalendar()."<br>";
echo Data::getHora()."<br>";
echo Data::getDataHora();