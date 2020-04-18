<?php

  require_once("./datosBD.php");
  require_once("./conexion.php");
  $s = 'localhost'; //Servidor
  $u = 'root'; //Root
  $p = '';//Password
  $d = 'wonderclub';//Base de Datos

  $conect = mysqli_connect($s, $u, $p, $d);

  $usuario = $_POST['usuario'];
  $password = $_POST['password'];

  $sqlSelectUsu = "SELECT * FROM admin WHERE nombre='$usuario'";
  if($resultUsu = mysqli_query($conect, $sqlSelectUsu)){
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

  $desconectar = mysqli_close($conect) or die("Ocurrio un error");

?>