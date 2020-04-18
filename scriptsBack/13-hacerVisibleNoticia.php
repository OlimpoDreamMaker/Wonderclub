<?php
session_start();
require_once("datosBD.php");
require_once("conexion.php");
$conect = conectarBD($s, $u, $p, $d);

if(!empty($_SESSION['usuario'])){
  $usuario = $_SESSION['usuario'];
  $id = $_POST['id'];
  
  $visibleNoticia = $_POST['visibilidad'];
  
  $sqlInsertNoticia = " UPDATE noticias SET
                        visibleNoticia='$visibleNoticia' 
                        WHERE id_noticias='$id'";
  mysqli_query($conect, $sqlInsertNoticia);
}                      

desconectarBD($conect);

?>