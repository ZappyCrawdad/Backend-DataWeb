<?php
header("Access-Control-Allow-Origin: *"); // Permite solicitudes desde cualquier dominio
header("Content-Type: application/json; charset=UTF-8");

$servername = "mysql.railway.internal";
$username = "root"; // Cambia esto si usas un hosting en producción
$password = "NOwdrqdGKaDenyYSQkSQracyDYeBjvYT";
$dbname = "railway";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["error" => "Conexión fallida: " . $conn->connect_error]));
}

$sql = "SELECT * FROM precios";
$result = $conn->query($sql);

$productos = [];
while ($row = $result->fetch_assoc()) {
    $productos[] = $row;
}

echo json_encode($productos);

$conn->close();
