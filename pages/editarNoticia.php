<?php
  session_start();
  require_once("../scriptsBack/conexion.php");
  $usuarioAdmin = $_SESSION['usuario'];
  $id = $_GET['id'];
  error_reporting(0);
  if($usuarioAdmin == null || $usuarioAdmin == '' ){
    header("Location:../admin/login.php");
    die();
  }
  if(isset($_POST['submit'])){
    $conexion = conectarBD();

    $sqlSelectNoticia = "SELECT * FROM noticias WHERE id_noticia='$id'";
    $carpetaImg= "../noticias";
    $resultado = mysqli_query($conexion, $sqlSelectNoticia);
    $fila = mysqli_fetch_row($resultado);
  
    if(empty($_POST['tituloNoticia'])){
      $tituloNoticia = $fila[1]; //Obteniendo titulo en caso de no querer modificarlo
    }else{
      $tituloNoticia = $_POST['tituloNoticia'];
    }
    if(empty($_POST['fechaNoticia'])){
      $fechaNoticia = $fila[2]; //Obteniendo fecha en caso de no querer modificarlo
    }else{
      $fechaNoticia = $_POST['fechaNoticia'];
    }
    if(empty($_POST['contenidoNoticia'])){
      $contenidoNoticia = $fila[4]; //Obteniendo contenido en caso de no querer modificarlo
    }else{
      $contenidoNoticia = $_POST['contenidoNoticia'];
    }
    $foto = $_FILES["foto"]["name "];
    $origen = $_FILES["foto"]["tmp_name"];
    $destino $carpetaImg.$_FILES["foto"]["name"];
    if($_FILES["foto"]["type"]=="image/jpeg" OR $_FILES["foto"]["type"]=="image/jpg" OR $_FILES["foto"]["type"]=="image/png" OR $_FILES["foto"]["type"]=="image/gif"){
      $mover_arch = move_uploaded_file($origen,$destino);
      $sqlUpdateNoticia = " UPDATE noticias SET 
                            titulo='$tituloNoticia', 
                            fecha='$fechaNoticia', 
                            contenido='$contenidoNoticia',
                            foto='$foto' WHERE id_noticia='$id'";
    }else{
      $sqlUpdateNoticia = " UPDATE noticias SET 
                            titulo='$tituloNoticia', 
                            fecha='$fechaNoticia', 
                            contenido='$contenidoNoticia',
                            foto='$foto' WHERE id_noticia='$id'";
    }
    mysqli_query($conexion, $sqlUpdateNoticia);
  
    $desconectar = desconectarBD($conexion);
    header("Location: ./noticias.php");
  }

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/all.css">
  <link rel="stylesheet" href="../css/main.css">
  <title>Iniciar Sesion</title>
</head>
<body class="admin-body">
  <!--Admin-->
  <aside>
    <div class="cabecera-admin">
      <!--Saludo al Admin-->
      <div class="saludo-admin">
        <h3 class="nombre-admin">
          Bienvenido, <?php echo $usuarioAdmin; ?>!
        </h3>
      </div>
    </div>
    <!--Menu-->
    <nav class="menu">
      <div class="contenedor contenedor-menu-admin">
        <ul class="opciones-admin">
          <li class="opcion-admin">
            <a href="noticias.php">
              <i class="far fa-newspaper"></i> Noticias
            </a>
          </li>
          <li class="opcion-admin">
            <a href="horarios.php">
              <i class="far fa-clock"></i> Horarios
            </a>
          </li>
          <li class="opcion-admin">
            <a href="clientes.php">
              <i class="fas fa-tasks"></i> Tu Rutina/Clientes
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!--Cerrar Sesion-->
    <div class="btn">
      <a href="../scriptsBack/01-cerrarSesion.php">
        Cerrar Sesion
      </a>
    </div>
  </aside>
  
  <!--Dashboard-->
  <main class="dashboard-admin">

    <!--Editar Noticia-->
    <div class="noticias-admin">
      <div class="contenedor contenedor-noticias">
        <h2 class="titulo-admin-noticias">
          Editar Noticia N°<?php echo $id;?>
        </h2>
        <div class="editar-noticia col-12">
          <h3 class="subtitulo">Editar Noticia</h3>
          <form action="" class="form-noticia" method="POST">
          <div class="input-titulo input">
              <label for="tituloNoticia">Editar el titulo de la noticia:</label>
              <input type="text" name="tituloNoticia" id="tituloNotiica">
            </div>
            <div class="input-fecha input">
              <label for="fechaNoticia">Editar la fecha de la noticia:(formato aaaa-mm-dd)</label>
              <input type="text" name="fechaNoticia" id="fechaNoticia">
            </div>
            <div class="input-contenido input">
              <label for="contenidoNoticia">Editar el contenido de la Noticia:</label>
              <textarea name="contenidoNoticia" id="contenidoNoticia" cols="30" rows="10"></textarea>
            </div>
            <div class="input-submit">
              <input class="btn-form" name="submit" type="submit" value="Guardar">
            </div>
          </form>
        </div>
      </div>
    </div>

  </main>
</body>
</html>