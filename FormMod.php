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
 <!--  <nav class="navbar navbar-dark bg-dark  navbar-expand-md navbar-light bg-light" style="background: #212121">
     <h2 style="text-align: center; font-size: 40px;">Movie Flex</h2>
   <a class="navbar-brand" href=inicio.php>
      <img src="img/logo2.png" height="100px" width="50%" alt="" >
    </a> 
    <button class="navbar-toggler-icon navbar-toggler-right "  type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>  
   </button>  -->

   <nav class="navbar  navbar-expand-md   navbar-dark bg-gradient-dark ">
    <!--   <h2 style="text-align: center; font-size: 40px;">Movie Flex</h2> -->
   <a class="navbar-brand" href=inicio.php>
      <img src="img/logo2.png" height="100px" width="50%" alt="" >
    </a> 
   
    <button style="background: white" class="navbar-toggler navbar-toggler-icon" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="true" aria-label="Toggle navigation" >
    </button>
   
   <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
    <div class="navbar-nav">
      <a class="nav-item nav-link " href="inicio.php">Inicio</a>
      <a class="nav-item nav-link active" href="peliculas.php">Peliculas</a>
      <li class="dropdown">
        <a  class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
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
                <form action="AltaMod.php" method="POST">
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

require 'database.php';
if (isset($_GET['id_pelicula'])) {
  $idpelicula=$_GET['id_pelicula'];

  $consulta="SELECT * FROM peliculas where id_pelicula=$idpelicula;";
  $resultado=mysqli_query($database,$consulta);
  while ($rs=mysqli_fetch_array($resultado)) {
   $id=$rs['id_pelicula'];
   $titulo=$rs['titulo'];
   $anio=$rs['anio'];
   $puntaje=$rs['puntaje'];
   $duracion=$rs['duracion'];
   $genero=$rs['genero'];
   $descripcion=$rs['descripcion'];
   $imagen=$rs['imagen'];
   $trailer=$rs['trailer'];

 }
}

?>


<div class="row">
 <div class="col-md-12" id="inicio" style="background: black;color: white">

 </div>
 <div style="padding-top: 40px" class="col-md-12" align="center">
  <div  class="row justify-content-center">
    <form style="background: #212121;padding: 30px;border-radius: 40px" method="POST" action="Mod.php">
     <input type="hidden" name="id_pelicula" id="id" value="<?php echo $id ?>">
    <div class="form-row">
     <div class="form-group col-md-6">
      <label style="color: white">Titulo</label>
      <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $titulo;?>" placeholder="Titulo">
    </div>
    <div class="form-group col-md-6">
      <label style="color: white">Año</label>
      <input type="text" class="form-control" id="anio" name="anio" value="<?php echo $anio;?>" placeholder="Año">
    </div>
    <div class="form-group col-md-6">
      <label style="color: white">Descripción</label>
      <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $descripcion;?>" placeholder="Descripción">
    </div>

    <div class="form-group col-md-6">
      <label style="color: white">Puntaje</label>
      <input type="text" class="form-control" id="puntaje" name="puntaje" value="<?php echo $puntaje;?>" placeholder="Puntaje">
    </div>

  </div>
  <div class="form-row">
   <div class="form-group col-md-6">
    <label for="selectTipo" style="color: white">Genero</label>
    <select class="form-control" id="selectTipo" name="tipo" value="<?php echo $genero;?>">
      <option>Terror</option>
      <option>Accion</option>
      <option>Romance</option>
      <option>Comedia</option>
      <option>Drama</option>
      <option>Ciencia ficción</option>
      <option>Crimen</option>
    </select>
  </div>

  <div class="form-group col-md-6">
    <label style="color: white">Trailer</label>
    <input type="text" class="form-control" id="trailer" name="trailer"value="<?php echo $trailer;?>" placeholder="Trailer">
  </div>
  <div class="form-group col-md-6">
    <label style="color: white">Duración</label>
    <input type="text" class="form-control" id="duracion" name="duracion" value="<?php echo $duracion;?>" placeholder="Duración">
  </div>
  <div class="form-group col-md-6">
    <label style="color: white" for="imagen">Imagen</label>
    <input type="text" class="form-control" id="imagen"  name="imagen" value="<?php echo $imagen;?>" placeholder="Imagen" >
  </div>
</div>

<br>
<button style="width: 40%" id="btn2" type="submit" class="btn btn-secondary" name="guardar" value="guardar">Guardar</button>
</form>
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