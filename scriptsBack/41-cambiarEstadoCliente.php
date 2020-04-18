<?php
session_start();
require_once("datosBD.php");
require_once("conexion.php");
$conect = conectarBD($s, $u, $p, $d);

if(!empty($_SESSION['usuario'])){
  $usuario = $_SESSION['usuario'];
  $id = $_POST['id'];
  
  $sqlUpdateEstadoCliente = " UPDATE clientes SET
                        contestado=1 
                        WHERE id_cliente='$id'";
  mysqli_query($conect, $sqlUpdateEstadoCliente);
}                      

desconectarBD($conect);

?>