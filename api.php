<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Datos de conexión externos (según tu conexión local)
$servername = "caboose.proxy.rlwy.net"; 
$username = "root"; 
$password = "NOwdrqdGKaDenyYSQkSQracyDYeBjvYT"; 
$dbname = "railway";
$port = 35643; // Asegúrate de definir el puerto correctamente

// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Verificar si la conexión falló
if ($conn->connect_error) {
    die(json_encode(["error" => "Conexión fallida: " . $conn->connect_error]));
}

// Consulta la tabla "precios"
$sql = "SELECT * FROM precios";
$result = $conn->query($sql);

$productos = [];
while ($row = $result->fetch_assoc()) {
    $productos[] = $row;
}

// Devuelve los datos en formato JSON
echo json_encode($productos);

$conn->close();
?>
