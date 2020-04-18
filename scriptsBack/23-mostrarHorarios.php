<?php
session_start();
require_once("datosBD.php");
require_once("conexion.php");
$connect = new mysqli("localhost", "root", "", "wonderclub") or die('Error al conectar'. mysqli_errno($connect));

// if(!empty($_SESSION['usuario'])){
//   $usuario = $_SESSION['usuario'];
//   mostrarHorarios($connect);
// }                      


function mostrarHorarios($conect){
  $sqlSelectHorarios = "SELECT * FROM horarios";
  if($resultado = mysqli_query($conect, $sqlSelectHorarios)){
    //id|horario|lunes|martes|miercoles|jueves|viernes|
    while($fila = mysqli_fetch_row($resultado)){
      echo "<tr>";
      
      echo "<td>".$fila[0]."</td>";
      echo "<td>".$fila[1].":".$fila[2]."</td>";
      if(empty($fila[3])){
        echo "<td> - </td>";
      }else{
        echo "<td>".$fila[3]."</td>";
      }
      if(empty($fila[4])){
        echo "<td> - </td>";
      }else{
        echo "<td>".$fila[4]."</td>";
      }
      if(empty($fila[5])){
        echo "<td> - </td>";
      }else{
        echo "<td>".$fila[5]."</td>";
      }
      if(empty($fila[6])){
        echo "<td> - </td>";
      }else{
        echo "<td>".$fila[6]."</td>";
      }
      if(empty($fila[7])){
        echo "<td> - </td>";
      }else{
        echo "<td>".$fila[7]."</td>";
      }
      echo "<td><i class='fas fa-pen'></i></td>";
      echo "<td><i class='fas fa-trash-alt'></i></td>";
      echo "</tr>";
    }
  }else{
    echo "TU HERMANA";
  }
}


desconectarBD($connect);

?>