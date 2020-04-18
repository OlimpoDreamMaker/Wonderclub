<?php

  require_once("./conexion.php");

  $conexion = conectarBD();

  $usuario = $_POST['usuario'];
  $password = $_POST['password'];

  $sqlSelectUsu = "SELECT * FROM admin WHERE nombre='$usuario'";
  if($resultUsu = mysqli_query($conexion, $sqlSelectUsu)){
    $passUsu = mysqli_fetch_row($resultUsu)[2];// Tomo la contraseña (posicion 2) de la BD
    if($passUsu == $password){
      session_start();
      $_SESSION['usuario'] = $usuario;
      header(" url=../pages/noticias.php");
    }else{
      echo "<script>alert('Contraseña incorrecta')</script>";
      header("url=../pages/login.php");
    }
  }else{
    echo "<script>alert('Contraseña incorrecta')</script>";
    header("refresh:5; url=../pages/login.php");
  }

  $desconectar = desconectarBD($conexion);

?>