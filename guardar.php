<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "datosu";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $matricula = $_POST["matricula"];
    $nombre = $_POST["nombre"];
    $paterno = $_POST["paterno"];
    $materno = $_POST["materno"];
    $domicilio = $_POST["domicilio"];
    $edad = $_POST["edad"];
    $genero = $_POST["genero"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];

    $sql = "UPDATE info_u SET nombre = '$nombre', paterno = '$paterno', materno = '$materno', domicilio = '$domicilio', edad = '$edad', genero = '$genero', telefono = '$telefono', email = '$email' WHERE matricula = '$matricula'";

    if ($conn->query($sql) === TRUE) {
        echo "Cambios guardados correctamente.";
    } else {
        echo "Error al guardar los cambios: " . $conn->error;
    }

    $conn->close();
}
?>
