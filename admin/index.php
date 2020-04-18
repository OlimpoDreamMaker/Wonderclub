<?php
  if(isset($_POST['submit'])){
    $s = 'localhost'; //Servidor
    $u = 'root'; //Root
    $p = '';//Password
    $d = 'wonderclub';//Base de Datos
    $conect = mysqli_connect($s, $u, $p, $d);
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $sqlSelectUsu = "SELECT * FROM admin WHERE nombre='$usuario'";
    if($resultUsu = mysqli_query($conect, $sqlSelectUsu)){
      $passUsu = mysqli_fetch_row($resultUsu)[2];// Tomo la contraseña (posicion 2) de la BD
      if($passUsu == $password){ // Comparo contraseñas
        session_start();
        $_SESSION['usuario'] = $usuario;
        header("Location:../pages/noticias.php");
      }else{
        echo "<script>alert('Contraseña incorrecta')</script>";
        unset($_POST['submit'], $_POST['usuario'], $_POST['password'], $usuario, $password);
      }
    }else{
      echo "<script>alert('a ese usuario no lo conoce ni tu prima')</script>";
      unset($_POST['submit'], $_POST['usuario'], $_POST['password'], $usuario, $password);
    }
    $desconectar = mysqli_close($conect) or die("Ocurrio un error");
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
  <div class="main-sesion">
    <div class="form-iniciar-sesion">
      <h2 class="titulo">Iniciar Sesion</h2>
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="POST">
        <div class="input-sesion">
          <label for="usuario"><i class="fas fa-user"></i></label>
          <input type="text" name="usuario" id="usuarioSesion" placeholder="Usuario" value="">
        </div>
        <div class="input-sesion">
          <label for="password"><i class="fas fa-lock"></i></label>
          <input type="password" name="password" id="pass" placeholder="Contraseña" value="">
        </div>
        <input type="submit" value="Entrar" name="submit">
      </form>
    </div>
  </div>
</body>
</html>