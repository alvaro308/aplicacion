<?php
session_start(); //inicia o continua la secion
session_unset(); //limpia todas las variables de secion
session_destroy(); //destulle la secion completamente
header("location:login.php");
?>