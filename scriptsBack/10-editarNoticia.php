<?php
session_start();
require_once("datosBD.php");
require_once("conexion.php");
$conexion = mysqli_connect('localhost', 'root', '', 'wonderclub');

  $id = $_GET['id'];
  $sqlSelectNoticia = "SELECT * FROM noticias WHERE id_noticias='$id'";
  $resultado = mysqli_query($conect, $sqlSelectNoticia);
  $fila = mysqli_fetch_row($resultado);

  if(empty($_POST['titulo'])){
    $tituloNoticia = $fila[1]; //Obteniendo titulo en caso de no querer modificarlo
  }else{
    $tituloNoticia = $_POST['titulo'];
  }
  if(empty($_POST['fecha'])){
    $fechaNoticia = $fila[2]; //Obteniendo fecha en caso de no querer modificarlo
  }else{
    $fechaNoticia = $_POST['fecha'];
  }
  if(empty($_POST['contenido'])){
    $contenidoNoticia = $fila[3]; //Obteniendo contenido en caso de no querer modificarlo
  }else{
    $contenidoNoticia = $_POST['contenido'];
  }
  if(empty($_POST['visibilidad'])){
    $visibleNoticia = $fila[3]; //Obteniendo visibilidad en caso de no querer modificarlo
  }else{
    $visibleNoticia = $_POST['visibilidad'];
  }

  $sqlInsertNoticia = " UPDATE noticias SET 
                        tituloNoticio='$tituloNoticia', 
                        fechaNoticia='$fechaNoticia', 
                        contenidoNoticia='$contenidoNoticia', 
                        visibleNoticia='$visibleNoticia' WHERE id_noticias='$id'";
  mysqli_query($conect, $sqlInsertNoticia);

  $desconectar = mysqli_close($conexion) or die("Ocurrio un error");
  header("Location: ../pages/noticias.php");

?>