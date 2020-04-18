<?php
session_start();
require_once("datosBD.php");
require_once("conexion.php");
$conect = conectarBD($s, $u, $p, $d);

if(!empty($_SESSION['usuario'])){
  $usuario = $_SESSION['usuario'];
  $id = $_GET['id'];
  $sqlSelectHorarios = "SELECT * FROM horarios WHERE id_horarios='$id'";
  $resultado = mysqli_query($conect, $sqlSelectHorarios);
  $fila = mysqli_fetch_row($resultado);

  if(empty($_POST['horario'])){
    $horario = $fila[1]; //Obteniendo horario en caso de no querer modificarlo
  }else{
    $horario = $_POST['horario'];
  }
  if(empty($_POST['lunes'])){
    $lunes = $fila[2]; //Obteniendo lunes en caso de no querer modificarlo
  }else{
    $lunes = $_POST['lunes'];
  }
  if(empty($_POST['martes'])){
    $martes = $fila[3]; //Obteniendo martes en caso de no querer modificarlo
  }else{
    $martes = $_POST['martes'];
  }
  if(empty($_POST['miercoles'])){
    $miercoles = $fila[4]; //Obteniendo miercoles en caso de no querer modificarlo
  }else{
    $miercoles = $_POST['miercoles'];
  }
  if(empty($_POST['jueves'])){
    $jueves = $fila[5]; //Obteniendo jueves en caso de no querer modificarlo
  }else{
    $lunes = $_POST['lunes'];
  }
  if(empty($_POST['viernes'])){
    $viernes = $fila[6]; //Obteniendo viernes en caso de no querer modificarlo
  }else{
    $viernes = $_POST['viernes'];
  }
  $sqlInsertHorarios = " UPDATE horarios SET 
                        horario='$horario', 
                        lunes='$lunes', 
                        martes='$martes', 
                        miercoles='$miercoles', 
                        jueves='$jueves', 
                        viernes='$viernes', 
                        WHERE id_horario='$id'";
  mysqli_query($conect, $sqlInsertHorarios);
}                     

desconectarBD($conect);

?>