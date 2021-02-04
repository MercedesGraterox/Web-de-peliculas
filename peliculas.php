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
      <a class="nav-item nav-link active" href="peliculas.php">Peliculas</a>
      <li class="dropdown">
        <a  class="nav-link  dropdown-toggle " href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
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

  <div class="container">
    <div class="row">

     <?php
     require 'database.php';
     $sql = "SELECT * FROM peliculas";
     $resultSet=mysqli_query($database,$sql);
     $pelis_por_pagina=6;
     $total=mysqli_num_rows($resultSet);
     $paginador=$total/$pelis_por_pagina;
     $paginador=ceil($paginador);
     if(!$_GET){
      header("location:peliculas.php?pagina=1");
    }
    if(isset($_GET['pagina'])){
      $iniciar = ($_GET['pagina'] - 1) * $pelis_por_pagina;
      $consulta = mysqli_query($database, "SELECT * FROM peliculas limit  $iniciar,$pelis_por_pagina");
      while($z=mysqli_fetch_array($consulta)){
        ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
         <div class="card" style="width: 15.3rem; height:80%; margin-top:55px;">
          <img src="<?php echo $z['imagen'];?>" class="card-img-top" alt="imagen">
         
            <h5 class="card-title" style="height: 40px; text-align: center;"><?php echo $z['titulo'],"<i class='fas fa-star'></i>".$z['puntaje'];?></h5> 
            <div class="card-body" style="height:120px">

              <form action="FormMod.php" method="GET">
                  <a title="más informacion" style="float:right; margin: 3spx;  background-color:#000; border:0;" class="btn btn-primary card-text"  href="#" data-toggle="modal" data-target="#pelicula<?php echo $z['id_pelicula']; ?>"><i class="fas fa-info-circle"></i></a> 
                </form>

                <br>

              </div>
            </div>
          </div>
       <div align="center" data-backdrop="static" class="modal" id="pelicula<?php echo $z['id_pelicula']; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="background:#212121;color:white">
              <h4 class="modal-title">Información</h4>
              <button style="color:white" type="button" class="close" data-dismiss="modal">X</button>
            </div>
            <div class="modal-body" style="background:#121212;color:white">
              <div class="row">
                <div class="col-md-6">

                 <iframe width="350" height="300" src="https://www.youtube.com/embed/<?php echo $z['trailer'];?>"
                   frameborder="0" allow="accelerometer; autoplay; encrpted-media; gyroscope; picture-in-picture" allowfullscreen>

                 </iframe>
               </div>
                <div class="col-md-6">
                  <h6><strong>Titulo: </strong><?php echo $z['titulo']; ?></h6>
                  <h6><strong>Genero: </strong><?php echo $z['genero']; ?></h6>
                  <h6><strong>Duracion: </strong><?php echo $z['duracion']." min"; ?></h6>
                  <h6><strong>puntaje: </strong><?php echo "<i class='fas fa-star'></i>" .$z['puntaje']; ?></h6>
                  <h6><strong>Año: </strong><?php echo $z['anio']; ?></h6>
                 

                  <h6 align="center"><strong>Descripcion </strong></h6>
                  <h6><?php echo $z['descripcion']; ?></h6>
                </div>
                <?php if (isset($_SESSION['login']) && $_SESSION['login'] > 0) {
                  if ($id_grupo == 1) { ?>
                    <div class="col-md-6">
                   
                    <br>
                    <a class="btn btn-dark" href="Eliminar.php?borrar= <?php echo $z['id_pelicula']; ?>">Eliminar</a>
                  </div>

                  <?php
                    if (isset($_GET['eliminado']) && $_GET['eliminado'] == 1) {
                    echo "<script>alert('la pelicula ha sido eliminada');</script>";
                }
                  ?>



                 <div class="col-md-6">
                  <br>
                  <form method="GET" action="FormMod.php">
                     <button  type="submit" name="id_pelicula" value="<?php  echo $z['id_pelicula'];?>" class="btn btn-dark">
                     Modificar</button>
                 </form>
                 </div>
               <?php }
             } ?>
           </div>
            </div>

          </div>
        </div>
      </div>
      <?php
    }
    ?>
  </div>

  <div class="col-md-12 ">
    <nav arial-label="page navigation">
      <ul class="pagination justify-content-center" >
        <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>"><a class="page-link" href="peliculas.php?pagina=<?php echo $_GET['pagina'] - 1 ?>">Anterior</a></li>
        <?php for ($i = 1; $i <= $paginador; $i++) : ?>
          <li class="page-item <?php echo $_GET['pagina'] == $i ? 'active' : '' ?>"><a class="page-link" href="peliculas.php?pagina=<?php echo $i ?>"><?php echo $i ?></a></li>
        <?php endfor ?>
        <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : '' ?>"><a class="page-link" href="peliculas.php?pagina=<?php echo $_GET['pagina'] + 1 ?>">Siguiente</a></li>
      </ul>
    </nav>
  </div>        
  <?php
}
?>
</div>
</div>

<?php
   require("footer.php")
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