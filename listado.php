<?php include('connect.php'); ?>
<?php include 'home.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
		<link rel="stylesheet" href="styles.css">
    </head>
    <style>
        section {
            padding: 0 192px;
        }
    </style>
    <body>
	  <section>
        <h3>Listado de Personas</h3>
        <?php
            $consulta='SELECT * FROM persona';
            $rs=$conn->query($consulta);
        ?>
        <table border="0" width="800" cellspacing='0' cellpadding="0">
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Número de Telefono</th>
                <th>Número de DNI</th>
            </tr>
			<?php

				while($fila=$rs->fetch()){
			?>
            <tr>
                <td><?php echo $fila['codigo']; ?></td>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['apellido']; ?></td>
                <td><?php echo $fila['edad']; ?></td>
                <td><?php echo $fila['numTelefono']; ?></td>
                <td><?php echo $fila['numDni']; ?></td>
            </tr>
        	<?php } ?>
        </table>
    </section>
  </body>
</html>
