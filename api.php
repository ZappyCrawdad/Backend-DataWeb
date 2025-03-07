<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Obtener datos de conexión desde variables de entorno de Railway
$servername = getenv("MYSQLHOST"); 
$username = getenv("MYSQLUSER"); 
$password = getenv("MYSQLPASSWORD"); 
$dbname = getenv("MYSQL_DATABASE"); 
$port = getenv("MYSQLPORT") ?: 3306; // Si no se encuentra la variable, usa el puerto 3306

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
