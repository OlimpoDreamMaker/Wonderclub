<?php

$conexion = mysqli_connect('localhost', 'root', '', 'wonderclub');

  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $numero = $_POST['numero'];
  $meta = $_POST['meta'];
  $mensaje = $_POST['mensaje'];

  $sqlInsertClientes = " INSERT INTO 
                        clientes(usuario,email,numero,meta,mensaje,contestado) 
                        VALUES ('$nombre','$email','$numero','$meta','$mensaje','0')";
  mysqli_query($conexion, $sqlInsertClientes);                     


$desconectar = mysqli_close($conexion) or die("Ocurrio un error");
header("Location: ../index.php");


?>