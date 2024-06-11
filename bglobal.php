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

// Consulta SQL para obtener todos los registros
$sql = "SELECT * FROM info_u";
$result = $conn->query($sql);

// Mostrar los registros en una tabla
// Mostrar los registros en una tabla
if ($result->num_rows > 0) {
    echo "<table id='tablaGlobal' border='1' style='margin: 0 auto;'>";
    echo "<h2>Datos Generales De Los Alunmos</h2>";
    echo "<tr><th>Matrícula</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Domicilio</th><th>Edad</th><th>Género</th><th>Teléfono</th><th>Email</th><th>Acción</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["matricula"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["paterno"] . "</td>";
        echo "<td>" . $row["materno"] . "</td>";
        echo "<td>" . $row["domicilio"] . "</td>";
        echo "<td>" . $row["edad"] . "</td>";
        echo "<td>" . $row["genero"] . "</td>";
        echo "<td>" . $row["telefono"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td><button onclick='eliminarRegistro(" . $row["id"] . ", this.parentNode.parentNode)'>Eliminar</button></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron registros";
}



// Cerrar la conexión
$conn->close();
?>
