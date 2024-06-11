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

// Obtener la matrícula o correo electrónico a eliminar
$buscar = $_POST["buscar"];

// Crear la consulta SQL para eliminar el registro
$sql = "DELETE FROM info_u WHERE matricula = '$buscar' OR email = '$buscar'";

// Ejecutar la consulta SQL
if ($conn->query($sql) === TRUE) {
    echo "Registro eliminado correctamente.";
} else {
    echo "Error al eliminar el registro: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
