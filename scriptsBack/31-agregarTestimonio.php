<?php
  session_start();
  require_once("datosBD.php");
  require_once("conexion.php");
  // $conect = conectarBD($s, $u, $p, $d);
  $conexion = mysqli_connect('localhost', 'root', '', 'wonderclub');

  // if(!empty($_SESSION['usuario'])){
  //   $usuario = $_SESSION['usuario'];

    $titulo = $_POST['tituloTestimonio'];
    $contenido = $_POST['contenidoTestimonio'];
    $autor = $_POST['autorTestimonio'];
    if (!isset($_POST['publicarTestimono'])) {
      $visible = 1;
    }else {
      $visible = 0;
    }

    $sqlInsertTestimonio = " INSERT INTO 
                          testimonios(titulo,contenido,autor,publicada) 
                          VALUES ('$titulo','$contenido','$autor','$visible')";
    mysqli_query($conexion, $sqlInsertTestimonio);  
  // }                      

  $desconectar = mysqli_close($conexion) or die("Ocurrio un error");
  header("Location: ../pages/testimonios.php");
  // desconectarBD($conect);

?>