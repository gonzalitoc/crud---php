<?php

include('connect.php');

$sql = "SELECT * FROM persona ORDER BY nombre ASC";

$stmt = $conn->prepare($sql);

$stmt->execute();

$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

$json = json_encode($resultados);

echo $json;

?>
