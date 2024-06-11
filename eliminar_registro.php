<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "datosu";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el ID del registro a eliminar
$id = $_GET['id'];

// Consulta SQL para eliminar el registro
$sql = "DELETE FROM info_u WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "OK"; // Indicar que la eliminación fue exitosa
} else {
    echo "Error al eliminar el registro: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
