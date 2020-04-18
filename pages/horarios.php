<?php
  session_start();
  require_once("../scriptsBack/conexion.php");
  $usuarioAdmin = $_SESSION['usuario'];
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
  <main class="dashboard">
    
    <!--Editor/Info Horarios-->
    <div class="horarios-admin">
      <div class="contenedor contenedor-horarios-admin">
        <h2 class="titulo-admin-horarios">
          Horarios
        </h2>
        <div class="agregar-horario col-12">
          <h3 class="subtitulo">Agregar Horario</h3>
          <form action="../scriptsBack/21-agregarHorarios.php" method="POST" class="form-agregar-horario">
            <div class="input-horario input">
              <label for="horario">Ingrese el Horario:</label>
              <input type="text" name="horas" class="input-horas">
              <span>:</span>          
              <input type="text" name="minutos" class="input-minutos">
              <span>Horas:minutos</span>
            </div>
            <div class="input-dia input">
              <label for="lunes">Ingrese la actividad del dia lunes:</label>
              <input type="text" name="lunes" id="lunesHorario">
            </div>
            <div class="input-dia input">
              <label for="martes">Ingrese la actividad del dia martes:</label>
              <input type="text" name="martes" id="martesHorario">
            </div>
            <div class="input-dia input">
              <label for="miercoles">Ingrese la actividad del dia miercoles:</label>
              <input type="text" name="miercoles" id="miercolesHorario">
            </div>
            <div class="input-dia input">
              <label for="jueves">Ingrese la actividad del dia jueves:</label>
              <input type="text" name="jueves" id="juevesHorario">
            </div>
            <div class="input-dia input">
              <label for="viernes">Ingrese la actividad del dia viernes:</label>
              <input type="text" name="viernes" id="viernesHorario">
            </div>
            <div class="input-submit">
              <input class="btn-form" type="submit" value="Guardar">
            </div>
          </form>
        </div>
        <div class="editar-eliminar-horarios col-12">
          <h3 class="subtitulo">Editar/Eliminar Horarios</h3>
          <table class="tabla-horarios">
            <tr>
              <th>ID</th>
              <th>Horario</th>
              <th>Lunes</th>
              <th>Martes</th>
              <th>Miercoles</th>
              <th>Jueves</th>
              <th>Viernes</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </tr>
            <?php
            $conexion = conectarBD();
            $sqlSelectHorarios = "SELECT * FROM horarios";
            if($resultado = mysqli_query($conexion, $sqlSelectHorarios)){
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
                echo "<td class='editar-horario'><a href='./editarHorario.php?id=".$fila[0]."'><i class='fas fa-pen'></i></a></td>";
                echo "<td class='eliminar-horario'><a href='../scriptsBack/22-eliminarHorario.php?id=".$fila[0]."'><i class='fas fa-trash-alt'></i></a></td>";
                echo "</tr>";
              }
            }
            $desconectar = desconectarBD($conexion);
            ?>
          </table>
        </div>
      </div>
    </div>

  </main>
</body>
</html>