<?php
session_start();
require_once("datosBD.php");
require_once("conexion.php");
$conect = conectarBD($s, $u, $p, $d);


if(!empty($_SESSION['usuario'])){
  $usuario = $_SESSION['usuario'];
  $id = $_POST['id'];
  $sqlSelectTestimonios = "SELECT * FROM testimonios WHERE id_testimonio='$id'";
  $resultado = mysqli_query($conect, $sqlSelectTestimonios);
  $fila = mysqli_fetch_row($resultado);

  if(empty($_POST['titulo'])){
    $titulo = $fila[1]; //Obteniendo titulo en caso de no querer modificarlo
  }else{
    $titutlo = $_POST['titulo'];
  }
  if(empty($_POST['contenido'])){
    $contenido = $fila[2]; //Obteniendo contenido en caso de no querer modificarlo
  }else{
    $contenido = $_POST['contenido'];
  }
  if(empty($_POST['autor'])){
    $autor = $fila[3]; //Obteniendo autor en caso de no querer modificarlo
  }else{
    $autor = $_POST['autor'];
  }
  if(empty($_POST['fecha'])){
    $fecha = $fila[4]; //Obteniendo fecha en caso de no querer modificarlo
  }else{
    $fecha = $_POST['fecha'];
  }
  if(empty($_POST['visible'])){
    $visible = $fila[5]; //Obteniendo visible en caso de no querer modificarlo
  }else{
    $visible = $_POST['visible'];
  }
  $sqlUpdateTestimonios = " UPDATE testimonios SET 
                        titulo='$titulo', 
                        contenido='$contenido', 
                        autor='$autor', 
                        fecha='$fecha', 
                        visible='$visible'
                        WHERE id_testimonio='$id'";
  mysqli_query($conect, $sqlUpdateTestimonios);
} 

desconectarBD($conect);

?>