<?php

  function conectarBD($s, $u, $pass, $db){
    $con = mysqli_connect($s, $u, $pass, $db);
    return $con;
  }
  function desconectarBD($conexion){
    $desconectar = mysqli_close($conexion) or die("Ocurrio un error");
    return $desconectar;
  }

?>