<?php

  require_once("datosBD.php");
  require_once("conexion.php");
    $conexion = mysqli_connect('localhost', 'root', '', 'wonderclub');

    $idNoticia = $_GET['id'];

    $sqlDeleteNoticia = "DELETE FROM noticias WHERE id_noticia='$idNoticia'";

    mysqli_query($conexion, $sqlDeleteNoticia);

    $desconectar = mysqli_close($conexion) or die("Ocurrio un error");
    header("Location: ../pages/noticias.php");

?>