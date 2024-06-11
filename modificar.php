<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = $_POST["matricula"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "datosu";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM info_u WHERE matricula = '$matricula'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<form id='modificarForm' style='margin-top: -60px; max-width: 1000px; margin-left: auto; margin-right: auto;'>";
        echo "<input type='hidden' name='matricula' value='" . $row["matricula"] . "'>";
        echo "<h2>Datos del Usuario</h2>";
        echo "<div class='row'>";
        echo "<div class='col-md-6'>";
        echo "<div class='form-group'>";
        echo "<label for='nombre'>Nombre:</label>";
        echo "<input type='text' class='form-control' id='nombre' name='nombre' value='" . $row["nombre"] . "'>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "<label for='paterno'>Apellido Paterno:</label>";
        echo "<input type='text' class='form-control' id='paterno' name='paterno' value='" . $row["paterno"] . "'>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "<label for='materno'>Apellido Materno:</label>";
        echo "<input type='text' class='form-control' id='materno' name='materno' value='" . $row["materno"] . "'>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "<label for='domicilio'>Domicilio:</label>";
        echo "<input type='text' class='form-control' id='domicilio' name='domicilio' value='" . $row["domicilio"] . "'>";
        echo "</div>";
        echo "</div>"; // Cierra la primera columna

        echo "<div class='col-md-6'>";
        echo "<div class='form-group'>";
        echo "<label for='edad'>Edad:</label>";
        echo "<input type='text' class='form-control' id='edad' name='edad' value='" . $row["edad"] . "'>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "<label for='genero'>Género:</label>";
        echo "<input type='text' class='form-control' id='genero' name='genero' value='" . $row["genero"] . "'>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "<label for='telefono'>Teléfono:</label>";
        echo "<input type='text' class='form-control' id='telefono' name='telefono' value='" . $row["telefono"] . "'>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "<label for='email'>Email:</label>";
        echo "<input type='text' class='form-control' id='email' name='email' value='" . $row["email"] . "'>";
        echo "</div>";
        echo "</div>"; // Cierra la segunda columna

        echo "</div>"; // Cierra la fila

        echo "<button type='button' id='guardarBtn' class='btn btn-primary btn-lg btn-block mb-3 text-white'>Guardar cambios</button>";
        echo "</form>";

    } else {
        echo "No se encontró ningún usuario con esa matrícula.";
    }

    $conn->close();
}
?>