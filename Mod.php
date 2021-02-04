<?php
require 'database.php';
$id=$_POST['id_pelicula'];
$titulo=$_POST['titulo'];
$anio=$_POST['anio'];
$puntaje=$_POST['puntaje'];
$duracion=$_POST['duracion'];
$genero=$_POST['tipo'];
$descripcion=$_POST['descripcion'];
$imagen=$_POST['imagen'];
$trailer=$_POST['trailer'];

$actualizar = "UPDATE peliculas SET titulo='$titulo',anio='$anio',puntaje='$puntaje',duracion='$duracion',genero='$genero',descripcion='$descripcion',imagen='$imagen',trailer='$trailer' WHERE id_pelicula='$id'";
$guardar=mysqli_query($database,$actualizar); 
 
echo "<script> alert('Datos actualizados');</script>";
require("peliculas.php");



?>