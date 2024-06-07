<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar usuario</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'home.php'; ?>
    <form method="POST">
        <h3>Eliminar Registro</h3>
        <label for="codigo">Código de usuario:</label>
        <input type="text" name="codigo" id="codigo" required>
        <br><br>
        <button name="btnConsultar"  type="submit" >Eliminar usuario</button>
        <?php include('connect.php'); ?>

        <?php
        if (isset($_POST['btnConsultar'])) {
            $codigo = $_POST['codigo'];

            $stmt = $conn->prepare("DELETE FROM persona WHERE codigo = :codigo");
            $stmt->bindParam(':codigo', $codigo);

            $stmt->execute();
        }
        ?>
    </form>
</body>
</html>
