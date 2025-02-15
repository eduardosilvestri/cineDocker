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

$titulo = $_POST['titulo'];
$director = $_POST['director'];
$nota = $_POST['nota'];
$anyo = $_POST['anyo'];
$presupuesto = $_POST['presupuesto'];
$trailer = $_POST['trailer'];

// Convertir la imagen a base64
$img_base64 = base64_encode(file_get_contents($_FILES['img']['tmp_name']));

// Insertar película
$sql = "INSERT INTO peliculas (titulo, director, nota, anyo, presupuesto, img_base64, url_trailer)
        VALUES ('$titulo', '$director', $nota, $anyo, $presupuesto, '$img_base64', '$trailer')";

if ($conn->query($sql) === TRUE) {
    echo "Película añadida correctamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>