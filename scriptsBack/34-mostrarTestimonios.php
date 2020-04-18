<?php
session_start();
require_once("datosBD.php");
require_once("conexion.php");
$conect = conectarBD($s, $u, $p, $d);

if(!empty($_SESSION['usuario'])){
  $usuario = $_SESSION['usuario'];
  $sqlSelectTestimonios = "SELECT * FROM testimonios";
  if($resultado = mysqli_query($conect, $sqlSelectTestimonios)){
    //id|titulo|contenido|autor|fecha|
    while($fila = mysqli_fetch_row($resultado)){
      echo "<tr>";
      for($i=0;$i<5;$i++){
        echo "<td>".$fila[$i]."</td>";
      }
      echo "<td><i class='fas fa-pen'></i></td>";
      echo "<td><i class='fas fa-trash-alt'></i></td>";
      echo "</tr>";
    }
  }
}                      

desconectarBD($conect);

?>