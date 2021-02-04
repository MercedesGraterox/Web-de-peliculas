<?php
        require 'database.php';
        $titulo=$_POST['titulo'];
        $anio=$_POST['anio'];
        $puntaje=$_POST['puntaje'];
        $duracion=$_POST['duracion'];
        $genero=$_POST['tipo'];
        $descripcion=$_POST['descripcion'];
        $imagen=$_POST['imagen'];
        $trailer=$_POST['trailer'];
        $Insert="INSERT INTO peliculas VALUES (00,'$titulo',$anio,$puntaje,'$duracion','$genero','$descripcion','$imagen','$trailer')";
        $guardar=mysqli_query($database,$Insert); 
        echo "<script> alert('Pelicula agregada');</script>";
        require("FormAlta.php");

?>



