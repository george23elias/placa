<?php
    session_start();
    require 'conexion.php';

    if(isset($_POST['btnguardar'])) {
        $nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
        $apellido = mysqli_real_escape_string($conexion,$_POST['apellido']);


        
        $sql = "INSERT INTO estudiante(nombre,apellido) VALUES ('$nombre','$apellido')";
        $red = $conexion->query($sql);

        if($red){
            $_SESSION['mensaje'] = "estudiante registrado correctamente!!!";
            $_SESSION['error'] = false;
        }
        else{
            $_SESSION['mensaje'] = "no se guardo";
            $_SESSION['error'] = true;
        }
        header("location:createestudiantes.php");
        exit;
    }



?>