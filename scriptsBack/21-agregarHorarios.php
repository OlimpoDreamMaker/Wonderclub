<?php
  session_start();
  require_once("conexion.php");
  $conexion = conectarBD();

  $horas = $_POST['horas'];
  $minutos = $_POST['minutos'];
  $lunes = $_POST['lunes'];
  $martes = $_POST['martes'];
  $miercoles = $_POST['miercoles'];
  $jueves = $_POST['jueves'];
  $viernes = $_POST['viernes'];

  $sqlInsertHorario = " INSERT INTO 
                        horarios(horario_hora,horario_minuto,lunes,martes,miercoles,jueves,viernes) 
                        VALUES ('$horas','$minutos','$lunes','$martes','$miercoles','$jueves','$viernes')";
  mysqli_query($conexion, $sqlInsertHorario);

  
  $desconectar = desconectarBD($conexion);
  header("Location: ../pages/horarios.php");

?>