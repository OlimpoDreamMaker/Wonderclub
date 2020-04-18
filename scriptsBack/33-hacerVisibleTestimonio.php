<?php
session_start();
require_once("datosBD.php");
require_once("conexion.php");
$conect = conectarBD($s, $u, $p, $d);

if(!empty($_SESSION['usuario'])){
  $usuario = $_SESSION['usuario'];
  $id = $_POST['id'];
  
  $visibleTestimonio = $_POST['visibilidad'];
  
  $sqlUpdateTestimonio = " UPDATE testimonios SET
                        visibleTestimonio='$visibleTestimonio' 
                        WHERE id_testimonio='$id'";
  mysqli_query($conect, $sqlUpdateTestimonio);
}                      

desconectarBD($conect);

?>