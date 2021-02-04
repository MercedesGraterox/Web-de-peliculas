<?php
require 'database.php';
// $id=$_POST['id_pelicula'];
// $titulo=$_POST['titulo'];
// $anio=$_POST['anio'];
// $puntaje=$_POST['puntaje'];
// $duracion=$_POST['duracion'];
// $genero=$_POST['tipo'];
// $descripcion=$_POST['descripcion'];
// $imagen=$_POST['imagen'];
// $trailer=$_POST['trailer'];

// $actualizar = "DELETE FROM peliculas WHERE id_pelicula=$id";
// $eliminar=mysqli_query($database,$actualizar); 
 
// echo "<script> alert('Pelicula eliminada');</script>";
// require("peliculas.php");

if (isset($_GET['borrar'])) {
	$idPelicula = $_GET['borrar'];
	$delete2 = mysqli_query($database, "delete from peliculas where id_pelicula='$idPelicula'");



	 echo "<script>alert('la pelicula ha sido eliminada');</script>";
	 require("peliculas.php");
	 // header("location:peliculas.php?id_pelicula=$id_pelicula&eliminado=1");
}


?>

