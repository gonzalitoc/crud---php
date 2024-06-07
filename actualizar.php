<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Registro</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <?php
    include 'home.php';
    include 'connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST['btnBuscar'])) {
        $codigo = $_POST['codigo'];

        if (empty($codigo)) {
          echo "Debe ingresar un código.";
          exit;
        }

        $sql = "SELECT * FROM persona WHERE codigo = :codigo";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->execute();
        $fila = $stmt->fetch();

        if (!$fila) {
          echo "El código no existe en la base de datos.";
          exit;
        }
      }

      if (isset($_POST['btnActualizar'])) {
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $numTelefono = $_POST['numTelefono'];
        $numDni = $_POST['numDni'];

        if (empty($nombre) || empty($apellido) || empty($numTelefono) || empty($numDni)) {
          echo "Todos los campos son obligatorios.";
          exit;
        }

        $sql = "UPDATE persona SET nombre = :nombre, apellido = :apellido, numTelefono = :numTelefono, numDni = :numDni WHERE codigo = :codigo";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':numTelefono', $numTelefono);
        $stmt->bindParam(':numDni', $numDni);
        $stmt->execute();

				echo "<h4 style='padding: 0 200px'>Registro actualizado exitosamente.</h4>";
      }
    }
  ?>



  <form method="POST">
    <h3>Actualizar Registro</h3>
    <label for="codigo">Ingrese el código del registro a actualizar:</label>
    <input type="text" name="codigo" id="codigo" required>
    <br><br>
    <button type="submit" name="btnBuscar">Buscar</button>
  </form>

  <?php if(isset($fila)) { ?>
    <form method="POST">
      <h3>Actualizar Registro</h3>
      <label for="codigo">Código:</label>
      <input type="text" name="codigo" id="codigo" value="<?php echo $fila['codigo']; ?>" readonly>
      <br><br>
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" id="nombre" value="<?php echo $fila['nombre']; ?>">
      <br><br>
      <label for="apellido">Apellido:</label>
      <input type="text" name="apellido" id="apellido" value="<?php echo $fila['apellido']; ?>">
      <br><br>
      <label for="numTelefono">Número de Teléfono:</label>
      <input type="text" name="numTelefono" id="numTelefono" value="<?php echo $fila['numTelefono']; ?>">
      <br><br>
      <label for="numDni">Número de DNI:</label>
      <input type="text" name="numDni" id="numDni" value="<?php echo $fila['numDni']; ?>">
      <br><br>
      <button type="submit" name="btnActualizar">Actualizar</button>
    </form>
		<?php } ?>


</body>
</html>
