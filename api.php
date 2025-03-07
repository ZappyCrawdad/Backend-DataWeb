<?php
header("Access-Control-Allow-Origin: *"); // Permite solicitudes desde cualquier dominio
header("Content-Type: application/json; charset=UTF-8");

// Obtén las credenciales desde variables de entorno
$servername = getenv("MYSQLHOST");
$username = getenv("MYSQLUSER");
$password = getenv("MYSQLPASSWORD");
$dbname = getenv("MYSQLDATABASE");
$port = getenv("MYSQLPORT") ?: 3306; // Usa el puerto de la variable o el predeterminado (3306)

// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Verifica si hay errores en la conexión
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
