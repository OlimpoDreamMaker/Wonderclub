<?php
  session_start();
  require_once("../scriptsBack/conexion.php");
  $usuarioAdmin = $_SESSION['usuario'];
  echo $usuarioAdmin;
  error_reporting(0);
  if($usuarioAdmin == null || $usuarioAdmin == '' ){
    header("Location:../admin/login.php");
    die();
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
  <title>Dashboard</title>
</head>
<body class="admin-body">
  
  <div class="icono-menu">
    <i class="fas fa-bars"></i>
  </div>
  <!--Admin-->
  <aside id="aside">
    <div class="close">
      <i class="fas fa-times"></i>
    </div>
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
              <i class="fas fa-tasks"></i> Clientes
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

    <!--Editor/Info Noticias-->
    <div class="noticias-admin">
      <div class="contenedor contenedor-noticias">
        <h2 class="titulo-admin-noticias">
          Noticias
        </h2>
        <div class="agregar-noticia col-12">
          <h3 class="subtitulo">Agregar Noticia</h3>
          <form action="../scriptsBack/11-agregarNoticia.php" method="POST" class="form-noticia" enctype="multipart/form-data">
            <div class="input-titulo input">
              <label for="tituloNoticia">Ingrese el titulo de la noticia:</label>
              <input type="text" name="tituloNoticia" id="tituloNotiica">
            </div>
            <div class="input-fecha input">
              <label for="fechaNoticia">Ingrese la fecha de la noticia:</label>
              <input type="text" name="fechaNoticia" id="fechaNoticia">
            </div>
            <div class="input-foto input">
              <input type="file" name="foto" id="foto">
            </div>
            <div class="input-contenido input">
              <label for="contenidoNoticia">Ingrese el contenido de la Noticia:</label>
              <textarea name="contenidoNoticia" id="contenidoNoticia" cols="30" rows="10"></textarea>
            </div>
            <div class="input-submit">
              <input class="btn-form" type="submit" value="Guardar">
            </div>
          </form>
        </div>
        <div class="editar-eliminar-noticia col-12">
          <h3 class="subtitulo">Editar/Eliminar Noticia</h3>
          <table class="tabla-noticia">
            <tr>
              <th>ID</th>
              <th>Titulo</th>
              <th>Fecha</th>
              <th>Foto</th>
              <th>Contenido</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </tr>
            <?php
            $conexion = conectarBD();
            $sqlSelectNoticias = "SELECT * FROM noticias";
            if($resultado = mysqli_query($conexion, $sqlSelectNoticias)){
              //id|titulo|fecha|contenido|publicada
              while($fila = mysqli_fetch_row($resultado)){
                echo "<tr>";
                for($i=0;$i<5;$i++){
                  echo "<td>".$fila[$i]."</td>";
                }
                echo "<td class='editar-noticia'><a href='./editarNoticia.php?id=".$fila[0]."'><i class='fas fa-pen'></i></a></td>";
                echo "<td class='editar-noticia'><a href='../scriptsBack/12-eliminarNoticia.php?id=".$fila[0]."'><i class='fas fa-trash-alt'></i></a></td>";
                echo "</tr>";
              }
            }else{
              
            }
            $desconectar = desconectarBD($conexion);
            ?>
          </table>
        </div>
      </div>
    </div>

  </main>
  
  <script src="../js/jquery.js"></script>
  <script src="../js/menu-responsive.js"></script>


</body>
</html>