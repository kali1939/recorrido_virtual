<?php
include 'conexion2.php'; // Incluye el archivo de conexión

// Realiza la consulta para obtener los registros
$sql_select = "SELECT matricula, paterno, materno, nombre FROM info_u";
$result_select = $conn->query($sql_select);

$rows = array();
if ($result_select->num_rows > 0) {
    while ($row = $result_select->fetch_assoc()) {
        $rows[] = $row;
    }
}

// Devuelve los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($rows);

// Cerrar la conexión
$conn->close();
?>
