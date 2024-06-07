<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registrar datos</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<?php include 'home.php'; ?>
	<form action="" method="POST">
		<h3>Insertar Registro</h3>
		<label>Nombre</label><input type="text" name="nombre" required=""><br><br>
		<label>Apellido</label><input type="text" name="apellido" required=""><br><br>
		<label>Edad</label><input type="number" name="edad" required=""><br><br>
		<label>Numero de Telefono</label><input type="number" name="numTelefono" required=""><br><br>
		<label>Numero de Dni</label><input type="number" name="numDni" required=""><br><br>
		<button type="submit">Guardar</button>
		<?php
			if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['edad'])  &&  isset($_POST['numTelefono'])&&  isset($_POST['numDni'])){
				require_once "connect.php";

				$nombre=$_POST['nombre'];
				$apellido=$_POST['apellido'];
				$edad=$_POST['edad'];
				$numTelefono=$_POST['numTelefono'];
				$numTelefono=$_POST['numDni'];


				$consulta=$conn->prepare("INSERT INTO persona(nombre,apellido,edad,numTelefono,numDni) VALUES(:nombre,:apellido,:edad,:numTelefono,:numDni)");

				$consulta->bindParam(':nombre',$nombre);
				$consulta->bindParam(':apellido',$apellido);
				$consulta->bindParam(':edad',$edad);
				$consulta->bindParam(':numTelefono',$numTelefono);
				$consulta->bindParam(':numDni',$numDni);

				$consulta->execute();
				echo '<h5>SE GUARDO</h5>';
			}


		?>
	</form>
</body>
</html>