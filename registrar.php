<?php
     $name=$_REQUEST['nombre'];
     $lastname=$_REQUEST['apellido'];
     $user=$_REQUEST['email'];
     $pass=sha1($_REQUEST['password']);
     $grupo=2;

     require ('database.php');
     if (isset($_REQUEST['registrado']) && !empty($_REQUEST['registrado'])) {
     if(!empty($name) && !empty($lastname) && !empty($user) && !empty($pass)){
     	$consulta=mysqli_query($database, "SELECT email FROM usuarios WHERE email='$user'") or 
     	die("Error de base de datos");

     	if(mysqli_num_rows($consulta)>0){
     		echo "<script> alert('El email ingresado ya esta en uso');</script>";
     		require("index.php");
     	}else{
     		mysqli_query($database, "INSERT INTO  usuarios (nombre,apellido,email,contrasena,id_grupo) VALUES ('$name','$lastname','$user','$pass',$grupo)") or
     		die("Error de base de datos");
     		echo "<script> alert('Registro exitoso');</script>";
     		require("index.php");
     	}

     }
}
?>