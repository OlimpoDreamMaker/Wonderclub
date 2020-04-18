<?php

require_once("datosBD.php");
require_once("conexion.php");
  $conexion = mysqli_connect('localhost', 'root', '', 'wonderclub');

  $idHorario = $_GET['id'];

  $sqlDeleteHorario = "DELETE FROM horarios WHERE id_Horario='$idHorario'";
  mysqli_query($conexion, $sqlDeleteHorario);

  $desconectar = mysqli_close($conexion) or die("Ocurrio un error");
  header("Location: ../pages/horarios.php");

?>