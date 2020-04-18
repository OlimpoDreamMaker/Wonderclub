<?php
session_start();
require_once("conexion.php");
$conexion = conectarBD();

if(!empty($_SESSION['usuario'])){
  $usuario = $_SESSION['usuario'];
  $sqlSelectClientes = "SELECT * FROM clientes";
  if($resultado = mysqli_query($conexion, $sqlSelectClientes)){
    //id|nombre|apellido|numero|email|meta|mensaje|contestado|
    while($fila = mysqli_fetch_row($resultado)){
      echo "<tr>";
      for($i=0;$i<8;$i++){
        echo "<td>".$fila[$i]."</td>";
      }
      echo "<td><i class='fas fa-pen'></i></td>";
      echo "<td><i class='fas fa-trash-alt'></i></td>";
      echo "</tr>";
    }
  }
}                      

$desconectar = desconectarBD($conexion);

?>