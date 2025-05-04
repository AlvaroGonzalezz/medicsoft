<?php
include 'conexion.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro - MedicSoft</title>
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
	<h1>Registro</h1>
	<p>Registra tu información con tranquilidad, nuestro sistema es totalmente seguro. Si ya te has registrado inicia sesión pulsando <a href="login.html">aquí</a></p>
	<div class="page-content">
	<div class="form-v10-content">
    <form class="form-detail" action="RegistroUsuario.php" method="post" id="myform" enctype="multipart/form-data">


				
				<div class="form-left">
					<h2>Información General 📝</h2>
					
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="nombre" id="nombre" class="input-text" placeholder="Nombre (s)" required>
						</div>
						
						<div class="form-row form-row-2">
							<input type="text" name="apellidos" id="apellidos" class="input-text" placeholder="Apellidos" required>
						</div>
						
					</div>
					<div class="form-row form-row-2">
						<input type="text" name="curp" class="curp" id="curp" placeholder="CURP" required>
					</div>
					<div class="form-row form-row-2">
						<input type="number" name="telefono" class="phone" id="telefono" placeholder="Teléfono" required>
					</div>
					<div class="form-row input-fecha">
    <label for="fecha-nacimiento" class="file-label2">Fecha Nacimiento</label>
    <input type="date" name="fecha-nacimiento" id="fecha-nacimiento" class="input-text" required>
</div>

					<div class="form-row">
						<input type="text" name="direccion" id="direccion" class="input-text" placeholder="Dirección" required>
					</div>
					<div class="form-row">
						<input type="text" name="ciudad" id="ciudad" class="input-text" placeholder="Ciudad" required>
					</div>
					<div class="form-row">
						<select name="estado" required>
						  <option value="">Selecciona Estado</option>
						  <option value="aguascalientes">Aguascalientes</option>
						  <option value="baja_california">Baja California</option>
						  <option value="baja_california_sur">Baja California Sur</option>
						  <option value="campeche">Campeche</option>
						  <option value="cdmx">Ciudad de México</option>
						  <option value="coahuila">Coahuila</option>
						  <option value="colima">Colima</option>
						  <option value="chiapas">Chiapas</option>
						  <option value="chihuahua">Chihuahua</option>
						  <option value="durango">Durango</option>
						  <option value="guanajuato">Guanajuato</option>
						  <option value="guerrero">Guerrero</option>
						  <option value="hidalgo">Hidalgo</option>
						  <option value="jalisco">Jalisco</option>
						  <option value="mexico">Estado de México</option>
						  <option value="michoacan">Michoacán</option>
						  <option value="morelos">Morelos</option>
						  <option value="nayarit">Nayarit</option>
						  <option value="nuevo_leon">Nuevo León</option>
						  <option value="oaxaca">Oaxaca</option>
						  <option value="puebla">Puebla</option>
						  <option value="queretaro">Querétaro</option>
						  <option value="quintana_roo">Quintana Roo</option>
						  <option value="san_luis_potosi">San Luis Potosí</option>
						  <option value="sinaloa">Sinaloa</option>
						  <option value="sonora">Sonora</option>
						  <option value="tabasco">Tabasco</option>
						  <option value="tamaulipas">Tamaulipas</option>
						  <option value="tlaxcala">Tlaxcala</option>
						  <option value="veracruz">Veracruz</option>
						  <option value="yucatan">Yucatán</option>
						  <option value="zacatecas">Zacatecas</option>
						</select>
						<span class="select-btn">
						  <i class="zmdi zmdi-chevron-down"></i>
						</span>
					  </div>
					  
					<div class="form-row">
						<input type="email" name="email" id="email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Correo Electrónico" required>
					</div>
					<div class="form-row">
						<input type="password" name="pass" id="pass" class="input-text" placeholder="Crea tu Contraseña" required>
					</div>
				</div>
				<div class="form-right">
					<h2>Detalles Clínicos 💊</h2>
					<div class="form-row">
						<select name="tipo_sangre">
						  <option value="">Selecciona Tipo de Sangre</option>
						  <option value="a+">A+</option>
						  <option value="a-">A-</option>
						  <option value="b+">B+</option>
						  <option value="b-">B-</option>
						  <option value="ab+">AB+</option>
						  <option value="ab-">AB-</option>
						  <option value="o+">O+</option>
						  <option value="o-">O-</option>
						</select>
						<span class="select-btn">
						  <i class="zmdi zmdi-chevron-down"></i>
						</span>
					  </div>
					  <div class="form-row">
    <input type="text" name="enfermedadesCronicas" class="street" id="enfermedades-cronicas" placeholder="Enfermedades Crónicas">
</div>
<div class="form-row">
    <input type="text" name="alergias" class="additional" id="alergias" placeholder="Alergias">
</div>
<div class="form-row">
    <input type="text" name="cirugiasRealizadas" class="additional" id="cirugias-realizadas" placeholder="Cirugías Realizadas">
</div>
<div class="form-row">
    <input type="text" name="prohibicionesMedicas" class="additional" id="prohibiciones-medicas" placeholder="Prohibiciones Médicas">
</div>
<div class="form-row">
    <input type="text" name="especificacionesMedicas" class="additional" id="especificaciones-medicas" placeholder="Especificaciones Médicas" >
</div>

<div class="form-row">
    <label for="historial-medico" class="file-label">Documento del último Historial Médico</label>
    <input type="file" name="historialMedico" class="additional" id="historial-medico" placeholder="Documento Historial Médico" required>
</div>

<div class="form-row">
    <label for="foto-rostro" class="file-label">Fotografía de su rostro (Sin accesorios)</label>
    <input type="file" name="fotoRostro" class="additional" id="foto-rostro" placeholder="Documento" required>
</div>

<div class="form-row-last">
    <input type="submit" name="register" class="register" value="Registrarme">
</div>

					</div>
				</div>
			</form>
		</div>

	</div>
	<div class="page-content btnVolver">
		<a href="index.html">⬅ Volver</a>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>