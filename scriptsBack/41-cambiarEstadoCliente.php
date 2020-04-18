<?php
session_start();
require_once("conexion.php");
$conexion = conectarBD();

if(!empty($_SESSION['usuario'])){
  $usuario = $_SESSION['usuario'];
  $id = $_POST['id'];
  
  $sqlUpdateEstadoCliente = " UPDATE clientes SET
                        contestado=1 
                        WHERE id_cliente='$id'";
  mysqli_query($conexion, $sqlUpdateEstadoCliente);
}                      

$desconectar = desconectarBD($conexion);

?>