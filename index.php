<!DOCTYPE html>
<html>

<head>
	<title>Final</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background: url(img/fondo.jpg); background-size: cover;">
	<div class="hero">
		<div class="form-box" style="background: rgb(255, 255, 255,0.8);">
			<div class="button-box">
				<div id="btn"></div>
				<button type="button" class="toggle-btn" onclick="login()">Ingresar</button>
				<button type="button" class="toggle-btn" onclick="registrar()">Registrate</button>
			</div>
			<div class="social-icons">
				<img src="img/fb.png">
				<img src="img/gp.png">
				<img src="img/tw.png">
			</div>
			<form  id="login" class="input-group" action="login.php" method="POST">
				<input type="email" class="input-field" name="email" placeholder="Email" required="required">
				<input type="password" class="input-field" name="password" placeholder="Contraseña" required="required">
				<!-- <input type="checkbox" class="chech-box"><span>Recordar contraseña</span> -->
                <button type="submit" name="ingresar" value="ingresar"  class="submit-btn">Ingresar</button>
			</form>

			<form id="registrar" class="input-group" action="registrar.php" method="POST">
				<input type="text" class="input-field" name="nombre" placeholder="Ingrese su nombre" required="required" >
				<input type="text" class="input-field" name="apellido" placeholder="Ingrese su apellido" required="required" >
				<input type="email" class="input-field" name="email" placeholder="Email" required="required">
				<input type="password" class="input-field" name="password" placeholder="Contraseña" required="required">

                <button type="submit" name="registrado" value="registrado" id="registrar-btn"class="submit-btn">Registrarse</button>
			</form>
		</div>
		
	</div>
      
    <script>
    	var x=document.getElementById('login');
    	var y=document.getElementById('registrar');
    	var z=document.getElementById('btn');

    	function registrar() {
    		x.style.left="-400px";
    		y.style.left="50px";
    		z.style.left="110px";
    	}

    	function login() {
    		x.style.left="50px";
    		y.style.left="450px";
    		z.style.left="0px";
    	}
    </script>






  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/2be8605e79.js"></script>
  <script type="text/javascript"></script>
</body>
</html>