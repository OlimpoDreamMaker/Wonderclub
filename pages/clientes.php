<?php
  session_start();
  $usuarioAdmin = $_SESSION['usuario'];
  echo $usuarioAdmin;
  error_reporting(0);
  if($usuarioAdmin == null || $usuarioAdmin == '' ){
    header("Location:login.php");
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
    
    <!--Editor/Info Clientes-->
    <div class="clientes">
      <div class="contenedor contenedor-clientes">
        <h2 class="titulo-admin-clientes">
          Clientes
        </h2>
        <div class="editar-eliminar-cliente col-12">
          <h3 class="subtitulo">Editar/Eliminar Cliente</h3>
          <table class="tabla-clientes">
            <tr>
              <th>ID</th>
              <th>Usuario</th>
              <th>Numero</th>
              <th>Email</th>
              <th>Meta</th>
              <!-- <th>Contestado</th> -->
              <!-- <th>Editar</th> -->
              <th>Eliminar</th>
            </tr>
            <?php
            $conexion = mysqli_connect('localhost', 'root', '', 'wonderclub');
            $sqlSelectClientes = "SELECT * FROM clientes";
            if($resultado = mysqli_query($conexion, $sqlSelectClientes)){
              //id|nombre|apellido|numero|email|meta|mensaje|contestado|
              while($fila = mysqli_fetch_row($resultado)){
                echo "<tr>";
                for($i=0;$i<5;$i++){
                  echo "<td>".$fila[$i]."</td>";
                }
                echo "<td class='eliminar-cliente'><a href='../scriptsBack/43-eliminarCliente.php?id=".$fila[0]."'><i class='fas fa-trash-alt'></i></a></td>";
                // echo "<td class='eliminar-cliente'><i class='fas fa-trash-alt'></i></td>";
                echo "</tr>";
              }
            }
            $desconectar = mysqli_close($conexion) or die("Ocurrio un error");
            ?>
            <!-- <tr>
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
              <td>5</td>
              <td>6</td>
              <td>7</td>
              <td class='editar-cliente'><i class='fas fa-pen'></i></td>
              <td class='eliminar-cliente'><i class='fas fa-trash-alt'></i></td>
            </tr>
            <tr>
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
              <td>5</td>
              <td>6</td>
              <td>7</td>
              <td class='editar-cliente'><i class='fas fa-pen'></i></td>
              <td class='eliminar-cliente'><i class='fas fa-trash-alt'></i></td>
            </tr> -->
          </table>
        </div>
      </div>
    </div>

  </main>
</body>
</html>