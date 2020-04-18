<?php

  require_once("conexion.php");
  $conexion = conectarBD();

  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $numero = $_POST['numero'];
  $meta = $_POST['meta'];
  $mensaje = $_POST['mensaje'];

  $sqlInsertClientes = " INSERT INTO 
                        clientes(usuario,email,numero,meta,mensaje,contestado) 
                        VALUES ('$nombre','$email','$numero','$meta','$mensaje','0')";
  mysqli_query($conexion, $sqlInsertClientes);                     


  $desconectar = desconectarBD($conexion);
  header("Location: ../index.php");


?>