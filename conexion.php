<?php 
$conexion = new mysqli("localhost","root","","jorge",3306);


if (!$conexion) {
    die("No se logro Conectar".$conexion->connect_error);
}