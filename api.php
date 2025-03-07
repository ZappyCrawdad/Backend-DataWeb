<?php
header("Access-Control-Allow-Origin: *"); // Permite solicitudes desde cualquier dominio
header("Content-Type: application/json; charset=UTF-8");

// Obtén las credenciales desde variables de entorno
$servername = getenv("MYSQL_HOST"); // Usa "MYSQL_HOST" o extrae desde "MYSQL_URL"
$username = getenv("MYSQL_USER");
$password = getenv("MYSQL_PASS");
$dbname = getenv("MYSQL_DB");

// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

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
