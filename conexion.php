<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>conexionmysql</title>
</head>
<body>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Obtener los datos del formulario
    $matricula = $_POST["rusu_matricula"];
    $nombre = $_POST["rusu_nombre"];
    $paterno = $_POST["rusu_paterno"];
    $materno = $_POST["rusu_materno"];
    $domicilio = $_POST["rusu_domicilio"];
    $edad = $_POST["rusu_edad"];
    $genero = $_POST["rusu_genero"];
    $telefono = $_POST["rusu_telefono"];
    $email = $_POST["rusu_email"];

    // Verificar que todos los campos estén llenos
    if (!empty($matricula) && !empty($nombre) && !empty($paterno) && !empty($materno) && !empty($domicilio) && !empty($edad) && !empty($genero) && !empty($telefono) && !empty($email)) {
        // Verificar si ya existe un registro con la misma matrícula o correo electrónico
        $sql_check = "SELECT * FROM info_u WHERE matricula = '$matricula' OR email = '$email'";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows > 0) {
            echo "<div class='alert alert-warning'>Ya existe un registro con esta matrícula o correo electrónico.</div>";
        } else {
            // Crear la consulta SQL para insertar los datos en la tabla
            $sql = "INSERT INTO info_u (id, matricula, nombre, paterno, materno, domicilio, edad, genero, telefono, email)
            VALUES (NULL, '$matricula', '$nombre', '$paterno', '$materno', '$domicilio', '$edad', '$genero', '$telefono', '$email')";

            // Ejecutar la consulta SQL
            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success'>Los datos se guardaron correctamente.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error al guardar los datos: " . $conn->error . "</div>";
            }
        }
    } else {
        echo "<div class='alert alert-danger'>Todos los campos son requeridos.</div>";
    }

    // Cerrar la conexión
    $conn->close();
}
?>


</body>
</html>