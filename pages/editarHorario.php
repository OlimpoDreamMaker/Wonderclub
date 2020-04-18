<?php
  session_start();
  $usuarioAdmin = $_SESSION['usuario'];
  error_reporting(0);
  $id=$_GET['id'];
  if($usuarioAdmin == null || $usuarioAdmin == '' ){
    header("Location:login.php");
    die();
  }
  if(isset($_POST['submit'])){
    $conexion = mysqli_connect('localhost', 'root', '', 'wonderclub');

    $sqlSelectHorarios = "SELECT * FROM horarios WHERE id_Horarios='$id'";
    $resultado = mysqli_query($conexion, $sqlSelectHorarios);
    $fila = mysqli_fetch_row($resultado);
  
    if(empty($_POST['horas'])){
      $horas = $fila[1]; //Obteniendo horario en caso de no querer modificarlo
    }else{
      $horas = $_POST['horas'];
    }
    if(empty($_POST['minutos'])){
      $minutos = $fila[2]; //Obteniendo lunes en caso de no querer modificarlo
    }else{
      $minutos = $_POST['minutos'];
    }
    if(empty($_POST['lunes'])){
      $lunes = $fila[3]; //Obteniendo martes en caso de no querer modificarlo
    }else{
      $lunes = $_POST['lunes'];
    }
    if(empty($_POST['martes'])){
      $martes = $fila[44]; //Obteniendo martes en caso de no querer modificarlo
    }else{
      $martes = $_POST['martes'];
    }
    if(empty($_POST['miercoles'])){
      $miercoles = $fila[5]; //Obteniendo miercoles en caso de no querer modificarlo
    }else{
      $miercoles = $_POST['miercoles'];
    }
    if(empty($_POST['jueves'])){
      $jueves = $fila[6]; //Obteniendo jueves en caso de no querer modificarlo
    }else{
      $jueves = $_POST['jueves'];
    }
    if(empty($_POST['viernes'])){
      $viernes = $fila[7]; //Obteniendo viernes en caso de no querer modificarlo
    }else{
      $viernes = $_POST['viernes'];
    }
    $sqlUpdateHorarios = " UPDATE horarios SET 
                          horario_hora='$horas', 
                          horario_minuto='$minutos',
                          lunes='$lunes', 
                          martes='$martes', 
                          miercoles='$miercoles', 
                          jueves='$jueves', 
                          viernes='$viernes'
                          WHERE id_Horario='$id'";
    mysqli_query($conexion, $sqlUpdateHorarios);
    header("Location: ./horarios.php");
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
  <main class="dashboard">
    
    <!--Editor/Info Horarios-->
    <div class="horarios-admin">
      <div class="contenedor contenedor-horarios-admin">
        <h2 class="titulo-admin-horarios">
          Horarios
        </h2>
        <div class="agregar-horario col-12">
          <h3 class="subtitulo">Editar Horario N°<?php echo $id ?> (completar TODOS los campos)</h3>
          <form action="" method="POST" class="form-agregar-horario">
          <div class='input-horario input'>
            <label for='horario'>Ingrese el Horario:</label>
            <input type='text' name='horas' class='input-horas'>
            <span>:</span>         
            <input type='text' name='minutos' class='input-minutos' >
            <span>Horas:minutos</span>
          </div>
          <div class='input-dia input'>
            <label for='lunes'>Ingrese la actividad del dia lunes:</label>
            <input type='text' name='lunes' id='lunesHorario' >
          </div>
          <div class='input-dia input'>
            <label for='martes'>Ingrese la actividad del dia martes:</label>
            <input type='text' name='martes' id='martesHorario' >
          </div>
          <div class='input-dia input'>
            <label for='miercoles'>Ingrese la actividad del dia miercoles:</label>
            <input type='text' name='miercoles' id='miercolesHorario' >
          </div>
          <div class='input-dia input'>
            <label for='jueves'>Ingrese la actividad del dia jueves:</label>
            <input type='text' name='jueves' id='juevesHorario' >
          </div>
          <div class='input-dia input'>
              <label for='viernes'>Ingrese la actividad del dia viernes:</label>
             <input type='text' name='viernes' id='viernesHorario'>
          </div>
            <div class="input-submit">
              <input class="btn-form" type="submit" name='submit' value="Guardar">
            </div>
          </form>
        </div>
      </div>
    </div>

  </main>
</body>
</html>