<?php
$id_usuario = 0;
$nombre_usuario = "";
require("database.php");
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] > 0) {
  $id_grupo = $_SESSION['grupo'];
  $id_usuario = $_SESSION['login'];
  $nombre= $_SESSION['usuario'];
}
function CerrarSession()
{
  if (isset($_POST['borrarSesion'])) {
    session_destroy();
    header("location:index.php");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Inicio</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body style="background-color: #000">
  <!-- navbar-dark bg-dark  navbar-toggler-right-->
  <nav class="navbar  navbar-expand-md   navbar-dark bg-gradient-dark">
   
   <a class="navbar-brand" href=inicio.php>
      <img src="img/logo2.png" height="100px" width="50%" alt="" >
    </a> 
    <button class="navbar-toggler navbar-toggler-icon "  type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
       
    </button>

    <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
      <div class="navbar-nav">
        <a class="nav-item nav-link " href="inicio.php">Inicio</a>
        <a class="nav-item nav-link " href="peliculas.php">Peliculas</a>
        <li class="dropdown">
          <a  class="nav-link  dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <form action="categorias.php?genero=Romance" method="POST">
              <button id="romance" type="submit" class="dropdown-item">Romance</button>
            </form>
            <form action="categorias.php?genero=Terror" method="POST">
              <button id="terror" type="submit" class="dropdown-item">Terror</button>
            </form>
            <form action="categorias.php?genero=Accion" method="POST">
              <button id="accion" type="submit" class="dropdown-item">Accion</button>
            </form>
            <form action="categorias.php?genero=Drama" method="POST">
              <button id="accion" type="submit" class="dropdown-item">Drama</button>
            </form>
          </div>
        </li>
     
       <a class="nav-item nav-link active" href="contacto.php">Contacto</a>
       <div class="dropdown-menu" aria-labelledby="navbarDropdown">
       </div>
     </li>
   </div>
 </div>

  <!-- PERMISO PARA CARGAR -->
  <?php
  if (isset($_SESSION['login']) && $_SESSION['login'] > 0) {
    $id_grupo = $_SESSION['grupo'];
    if ($id_grupo == 1) { ?>
      <li class="nav-item">
        <a id="nuevoProducto" class="btn btn-dark" href="FormAlta.php">
          <i class="far fa-arrow-alt-circle-up"></i> Cargar Pelicula</a>
        </li>

        <?php
      }
    }
    ?>



    <div style="float: right">
      <?php if ($id_usuario == 0) : ?>
        <nav class="navbar navbar-expand-lg navbar-light">
          <div>
            <ul class="navbar-nav mr-auto">
              <li class="nav-item dropdown">
                <a href="#" style="color:white" class="btn  dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i style="font-size:20px;color:white;" class="fas fa-user-circle"></i> Invitado</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <form action="inicio.php" method="POST">
                    <button type="submit" class="dropdown-item" name="borrarSesion" onclick="<?php CerrarSession(); ?>">Salir</button>
                  </form>
                </div>
              </li>
            </ul>
          </div>
        </nav>
        <?php else : ?>
          <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
              <div>
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item dropdown">
                    <a href="#" style="color:white" class="btn  dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i style="font-size:20px;color:white;" class="fas fa-user-circle"></i><?php echo "   " . $nombre?></a><span style="color:grey"></span>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <form action="index.php" method="POST">
                        <button type="submit" class="dropdown-item" name="borrarSesion" onclick="<?php CerrarSession(); ?>">Cerrar Sesión</button>
                      </form>
                    </div>
                  </li>
                </ul>
              </div>
            <?php endif; ?>
          </nav>
        </div>
      </nav>
    </div>
  </nav>


  <div class="modal-dialog text-center">
    <div class="col-sm-8 main-section" >
      <div class="modal-content"  style="background: #fff; margin-top: 60px; margin-left:20px;">
        <div class="col-12 user-img">
        </div>
        <b>
          <h4 style="color: black">Contactanos</h4> 
          <i class="fa fa-envelope-o"style="color: black"></i>
          <i class="fa fa-facebook"style="color: black"></i>
          <i class="fa fa-instagram"style="color: black"></i>
        </b>
        <br>
        <form class="col-12" name="form" method="post" action="enviarEmail.php">

          <div class="form-group" id="email-group">
            <h4 style="color: black">Email</h4>
            <input type="text" class="form-control" name="correo" placeholder="E-mail" id="username"/>
          </div>

          <h4 style="color: black">Mensaje</h4>
          <textarea class="comentarios" rows="3" cols="30" id="mensaje" name="mensaje">
          </textarea>
          <br>
          <br>

          <button onclick=go() type=submit value="send" name="send" class="btn btn-secondary" >Enviar Email</button>
          <br>
          <br>

        </form>

      </div>
    </div>
  </div>
</div>
<?php
    require("footer.php");
?>




  
  



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!--  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script> -->
<!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
-->   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.jss"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/2be8605e79.js"></script>
<script type="text/javascript"></script>
</body>

</html>