<?php

  require_once("conexion.php");
    $conexion = conectarBD();

    $idNoticia = $_GET['id'];

    $sqlDeleteNoticia = "DELETE FROM noticias WHERE id_noticia='$idNoticia'";

    mysqli_query($conexion, $sqlDeleteNoticia);

    $desconectar = desconectarBD($conexion);
    header("Location: ../pages/noticias.php");

?>