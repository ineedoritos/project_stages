<?php

session_start();

echo "Bienvenido ".$_SESSION['usuario']." su id es: ".$_SESSION['id'];
?>