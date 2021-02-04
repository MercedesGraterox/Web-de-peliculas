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
        <a  class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           <form action="peliculas.php?genero=romance" method="POST">
            <button id="romance" type="submit" class="dropdown-item">Romance</button>
          </form>
          <form action="peliculas.php?genero=terror" method="POST">
            <button id="terror" type="submit" class="dropdown-item">Terror</button>
          </form>
          <form action="peliculas.php?genero=accion" method="POST">
            <button id="accion" type="submit" class="dropdown-item">Accion</button>
          </form>
        </div>
      </li>
       <?php
        if (isset($_SESSION['login']) && $_SESSION['login'] > 0) {
          $id_grupo = $_SESSION['grupo'];
          if ($id_grupo == 1) { ?>
            
           <a class="nav-item nav-link active " href="GestionUsuarios.php">Gestionar Usuarios</a>
           <?php
         }
       }
       ?>
      <a class="nav-item nav-link" href="contacto.php">Contacto</a>
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
        <li class="nav-item" style="list-style:none;">
          <a id="nuevoProducto" class="btn btn-dark" href="FormAltaMod.php">
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
        <?php
     if (isset($_SESSION['login']) && $_SESSION['login'] > 0) {
      $id_grupo = $_SESSION['grupo'];
      if ($id_grupo == 1) { ?>
        
        <li class="nav-item" style="list-style:none;">
          <a id="CargarEmpleado" class="btn btn-dark" href="altaEmpleado.php">
            <i class="far fa-arrow-alt-circle-up"></i>Cargar Empleado </a>

          </li>
          <br>
          <li class="nav-item" style="list-style:none;">
          <a id="permiso" class="btn btn-dark" href="asignarPermiso.php">
            <i class="far fa-arrow-alt-circle-up"></i>Asignar Permisos </a>
          </li>

          <?php
        }
      }
      ?>

   
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