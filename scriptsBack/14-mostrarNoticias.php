<?php
session_start();
require_once("datosBD.php");
require_once("conexion.php");
$conexion = conectarBD();

if(!empty($_SESSION['usuario'])){
  $usuario = $_SESSION['usuario'];
  $sqlSelectNoticias = "SELECT * FROM noticias";
  if($resultado = mysqli_query($conexion, $sqlSelectNoticias)){
    //id|titulo|fecha|contenido|publicada
    while($fila = mysqli_fetch_row($resultado)){
      echo "<tr>";
      for($i=0;$i<5;$i++){
        echo "<td>".$fila[$i]."</td>";
      }
      echo "<td class='editar-noticia'><i class='fas fa-pen'></i></td>";
      echo "<td class='editar-noticia'><i class='fas fa-trash-alt'></i></td>";
      echo "</tr>";
    }
  }
}                      

$desconectar = desconectarBD($conexion);

?>