<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:200,600,700|Raleway:400,500,700|Righteous|Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/all.css">
  <link rel="stylesheet" href="../css/main.css">
  <title>WONDER CLUB</title>
</head>
<body>

  <!--Menu Mobile-->
  <div class="menu-mobile">
    <div class="close">
      <i class="fas fa-times"></i>
    </div>
    <ul class="menu-vertical">
      <li>
        <a href="../index.php">
          Inicio
        </a>
      </li>
      <li>
        <a href="../index.php" class="scroll-suave">
          Nuestros Programas
        </a>
      </li>
      <li>
        <a href="../index.php" class="scroll-suave">
          Entrenadores
        </a>
      </li>
      <li>
        <a href="../index.php" class="scroll-suave">
          Equipamento
        </a>
      </li>
      <li>
        <a href="../index.php" class="scroll-suave">
          Testimonios
        </a>
      </li>
      <li>
        <a href="../index.php" class="scroll-suave">
          Especial
        </a>
      </li>
      <li>
        <a href="#">
          Noticias
        </a>
      </li>
      <li>
        <a href="../index.php" class="scroll-suave">
          Contactos
        </a>
      </li>
    </ul>
  </div>

  <!--BTN-SCROLL-HOME-->
  <div class="btn-scroll volver-suave">
    <i class="fas fa-chevron-up"></i>
  </div>


  <!--HEADER-->
  <header>
    <!--NAV-->
    <nav class="nav">
      <div class="contenedor contenedor-nav">
        <div class="logo">
          <img src="../img/logo_normal.png" alt="">
        </div>
        <ul class="menu">
          <li>
            <a href="../index.php" >
              Nuestros Programas
            </a>
          </li>
          <li>
            <a href="../index.php">
              Entrenadores
            </a>
          </li>
          <li>
            <a href="../index.php">
              Testimonios
            </a>
          </li>
          <li>
            <a href="../index.php">
              Inicio
            </a>
          </li>
          <li>
            <a href="../index.php">
              Galeria
            </a>
          </li>
          <li>
            <a href="../index.php">
              Contactos
            </a>
          </li>
        </ul>
        <ul class="redes">
          <li>
            <a href="https://www.instagram.com/wonderclubrosario/">
              <i class="fab fa-instagram"></i>
            </a>
          </li>
          <li>
            <a href="https://www.facebook.com/wonderclubrosario-110523827104940/">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
        </ul>
        <div class="icono-menu">
          <i class="fas fa-bars"></i>
        </div>
      </div>
    </nav>
    
  </header>
  <!--MAIN-->
  <main class="blog">

    <!--MES Y AÑO-->
    <h2 class="titulo-blog">Noticias</h2>

    <!--CONTENIDO-->
    <section class="contenido">
      <?php
        require_once("../scriptsBack/conexion.php");
        $conexion = conectarBD();
        $sqlSelectNoticias = "SELECT * FROM noticias";
        if($resultado = mysqli_query($conexion,$sqlSelectNoticias)){{
          while($fila = mysqli_fetch_row($resultado)){
            echo "<div class='post-resumido'>";
                  echo "<h2 class='titulo-post'><a href='#'>".$fila[1]."</a></h2>";
                  echo "<div class='datos-post'><div class='fecha'>Publicado <span>".$fila[2]."</span></div></div>";
                  echo "<div class='foto-portada'><img src='../noticias/".$fila[3]."' /></div>";
                  echo "<div class='descripcion-post'><p>".$fila[4]."</p></div>";
            echo "</div>";
          }
        }

        }
        $desconectar = desconectarBD($conexion) ;
      ?>
      <!--POST N°-->
      <!-- <div class="post-resumido">
        <h2 class="titulo-post">
          <a href="#">
            Calistenia
          </a>
        </h2>
        <div class="datos-post">
          <div class="fecha">
            Publicado <span>20 de Octubre 2018</span>
          </div>
        </div>
        <div class="foto-portada">
          <img src="../img/post-1.jpg" alt="">
        </div>
        <div class="descripcion-post">
          <p>
            What Does Discipline Look Like? Most of us can agree that discipline is one of the most important virtues we can develop in our pursuit of self-improvement. Without the ability to exercise self-control and will ourselves to get the important things done, it’s nearly impossible for us to see the...
          </p>
        </div>
      </div> -->


    </section>

    <!-- WIDGETS
    <aside class="aside">
      
      <!--Buscador Widget--
      <div class="buscador-widget">
        <h3 class="titulo-buscador">Buscar</h3>
        <div class="widget-buscar">
          <input type="text" placeholder="Buscar...">
          <div class="icono-buscar">
            <i class="fas fa-search"></i>
          </div>
        </div>
      </div>

      <!--Calendario Widget--
      <div class="calendario-widget">
        <h3 class="titulo-calendario">Calendario</h3>
        <table id="calendar" class="widget-calendario">
          <caption></caption>
          <thead>
            <tr>
              <th title="Lunes">L</th>
              <th title="Martes">M</th>
              <th title="Miercoles">M</th>
              <th title="Jueves">J</th>
              <th title="Viernes">V</th>
              <th title="Sabado">S</th>
              <th title="Domingo">D</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>

      <!--TAGS--
      <div class="tags-widget">
        <h3 class="titulo-tags">Tags</h3>
        <div class="widget-tags">
          <a href="#" class="tag">Work</a>
        </div>
      </div>



    </aside> -->

  </main>

  <!--FOOTER-->
  <footer class="footer">
    <div class="contenedor contenedor-footer">
      <div class="footer-fila-1">
        <div class="logo">
          <h2>Wonder Club</h2>
        </div>
      </div>
      <div class="footer-fila-2">
        <div class="copyright">
          <p>
            Wonder Club Copyrigth &copy; 2020 Tema diseñado por <a href="#">OlimpoDM</a>
          </p>
        </div>
        <ul class="redes">
          <li>
            <a href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fab fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </footer>



  <!--SCRIPTS-->
  <script src="../js/jquery.js"></script>
  <script src="../js/slider.js"></script>
  <script src="../js/scrollBtn.js"></script>
  <script src="../js/menu-responsive.js"></script>
  <script src="../js/calendario.js"></script>
  <script src="../js/modal.js"></script>


</body>
</html>