<?php
  require_once("conexion.php");
  $conexion = conectarBD(); 

    $carpetaImg= "../noticias/";
    $tituloNoticia = $_POST['tituloNoticia'];
    $fechaNoticia = $_POST['fechaNoticia'];
    $contenidoNoticia = $_POST['contenidoNoticia'];
    $foto = $_FILES["foto"]["name"];
    $origen = $_FILES["foto"]["tmp_name"];
    $destino = $carpetaImg.$_FILES["foto"]["name"];
    if($_FILES["foto"]["type"]=="image/jpeg" OR $_FILES["foto"]["type"]=="image/jpg" OR $_FILES["foto"]["type"]=="image/png" OR $_FILES["foto"]["type"]=="image/gif"){
      $mover_arch = move_uploaded_file($origen,$destino);
      $sqlInsertNoticia = " INSERT INTO noticias(titulo,fecha,foto,contenido) 
                          VALUES ('$tituloNoticia', '$fechaNoticia','$foto', '$contenidoNoticia')";
    }else{
      $sqlInsertNoticia = " INSERT INTO noticias(titulo,fecha,contenido,publicada) 
                          VALUES ('$tituloNoticia', '$fechaNoticia', '$contenidoNoticia', '$visibleNoticia')";
    }
    mysqli_query($conexion, $sqlInsertNoticia);   

  
  $desconectar = desconectarBD($conexion);
  header("Location: ../pages/noticias.php");

?>