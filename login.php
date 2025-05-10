<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login - MedicSoft</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/montserrat-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<link rel="shortcut icon" href="imgs/icon.png" type="image/x-icon">

	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body class="form-v10">
	<h1>Inicio de Sesión</h1>
	<p> Si aún no tienes una cuenta registrate pulsando <a href="registro.html">aquí</a></p>
	<div class="page-content">
		
		<div class="form-v10-content">
			<form class="form-detail" action="VerificarUsuario.php" method="post" id="myform">
				
				<div class="form-left">
					<h2>Ingresa tu cuenta para acceder 🏥</h2>
					<img src="imgs/publi.png" alt="">
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="email" name="email" id="email" class="input-text" placeholder="Correo Electrónico" required>
						</div>
						
						<div class="form-row form-row-2">
							<input type="password" name="password" id="password" class="input-text" placeholder="Contraseña" required>
						</div>
						
					</div>
					<div class="form-row-last btnLogin">
						<input type="submit" name="register" class="loggin" value="Acceder">
					</div>
					
					
					
					
				</div>
			</form>
		</div>
	</div>
	<div class="page-content btnVolver">
		<a href="index.html">⬅ Volver</a>
	</div>
</body>
</html>