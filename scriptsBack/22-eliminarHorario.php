<?php

require_once("conexion.php");
  $conexion = conectarBD();

  $idHorario = $_GET['id'];

  $sqlDeleteHorario = "DELETE FROM horarios WHERE id_Horario='$idHorario'";
  mysqli_query($conexion, $sqlDeleteHorario);

  $desconectar = desconectarBD($conexion);
  header("Location: ../pages/horarios.php");

?>