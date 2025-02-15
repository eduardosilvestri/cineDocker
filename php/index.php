<?php
$servername = "db";
$username = "usuario1";
$password = "contrasenyaUsuario1";
$dbname = "cine";
// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);
// Verificar la conexión
if ($conn->connect_error) {
 die("Conexión fallida: " . $conn->connect_error);
}
// Consulta SQL para seleccionar todo el contenido de la tabla peliculas
$sql = "SELECT * FROM peliculas";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Listado de Películas</title>
</head>
<body>
 <h1>Listado de Películas</h1>
 <table>
 <thead>
 <tr>
<th>ID</th><th>Título</th><th>Director</th><th>Nota</th><th>Año</th><th>Ppto</th><th>Img</th><th>Trailer</th>
 </tr>
 </thead>
 <tbody>
 <?php
 if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
 echo "<tr>";
echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
 echo "<td>" . htmlspecialchars($row["titulo"]) . "</td>";
 echo "<td>" . htmlspecialchars($row["director"]) . "</td>";
 echo "<td>" . htmlspecialchars($row["nota"]) . "</td>";
 echo "<td>" . htmlspecialchars($row["anyo"]) . "</td>";
 echo "<td>" . htmlspecialchars($row["presupuesto"]) . "</td>";
 echo "<td><img src='data:image/jpeg;base64," . htmlspecialchars($row["img_base64"]) . "'
alt='Imagen' width='100' height='100'></td>";
 echo "<td><a href='" . htmlspecialchars($row["url_trailer"]) . "' target='_blank'>Ver
Trailer</a></td>";
 echo "</tr>";
 }
 } else { echo "<tr><td colspan='8'>No hay registros</td></tr>";}
 ?>
 </tbody>
 </table>

 <h2>Añadir Película</h2>
    <form action="insertar.php" method="post" enctype="multipart/form-data">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required><br>
        <label for="director">Director:</label>
        <input type="text" name="director" id="director" required><br>
        <label for="nota">Nota:</label>
        <input type="number" step="0.1" name="nota" id="nota" required><br>
        <label for="anyo">Año:</label>
        <input type="number" name="anyo" id="anyo" required><br>
        <label for="presupuesto">Presupuesto:</label>
        <input type="number" name="presupuesto" id="presupuesto" required><br>
        <label for="img">Imagen:</label>
        <input type="file" name="img" id="img" required><br>
        <label for="trailer">URL Trailer:</label>
        <input type="url" name="trailer" id="trailer" required><br>
        <button type="submit">Añadir Película</button>
    </form>

    <h2>Eliminar Película</h2>
    <form action="eliminar.php" method="post">
        <label for="id">ID de la Película:</label>
        <input type="number" name="id" id="id" required><br>
        <button type="submit">Eliminar Película</button>
    </form>
</body>
</html>
<?php
$conn->close();
?>