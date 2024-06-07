<?php
$host = 'localhost';
$dbname = 'crud';
$username = 'root';
$password = 'leitogc01';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
