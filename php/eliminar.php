<?php
$servername = "db";
$username = "usuario1";
$password = "contrasenyaUsuario1";
$dbname = "cine";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$id = $_POST['id'];

// Eliminar película
$sql = "DELETE FROM peliculas WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Película eliminada correctamente.";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>