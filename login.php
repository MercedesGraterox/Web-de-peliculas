<?php
    session_start();
    require("database.php");
    if (isset($_POST['ingresar']) && !empty($_POST['ingresar'])) {
    	$user=$_POST['email'];
    	$pass=sha1($_POST['password']);

    	$consulta=mysqli_query($database, "SELECT * FROM usuarios where email='$user' and
    	 contrasena='$pass'");
    	if($p=mysqli_fetch_assoc($consulta)){
		  		if ($p['email']==$user && $p['contrasena']==$pass) {
					$id=$p['id_usuario'];
                    $_SESSION['grupo']=$p['id_grupo'];
		  			$_SESSION['login']=$p['id_usuario'];
		  			$_SESSION['usuario']=$p['nombre'];
                    header("location:inicio.php");
		  		}
			}else{
				echo "<script>alert('usuario o contraseña incorrectos');</script>";
				require("index.php");		
			}

    }

?>