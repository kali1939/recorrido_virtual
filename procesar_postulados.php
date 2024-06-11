<?php
include 'conexion2.php'; // Incluye el archivo de conexión

// Obtener los datos del formulario de "postulados"
$mat_e = $_POST['matricula']; // Usamos mat_e en lugar de matricula
$prepa_s = $_POST['prepa_s'];
$carrera_se = $_POST['carrera_se'];

// Insertar los valores en la tabla "postulados"
$sql_insert = "INSERT INTO postulados (mat_e, prepa_s, carrera_se) VALUES ('$mat_e', '$prepa_s', '$carrera_se')";
if ($conn->query($sql_insert) === TRUE) {
    echo "Datos guardados correctamente en la tabla postulados.";
} else {
    echo "Error al guardar los datos en la tabla postulados: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
