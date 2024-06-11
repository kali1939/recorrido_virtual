<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "datosu";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    if (isset($_POST["buscar"])) {
        $busqueda = $_POST["buscar"];
        $sql_busqueda = "SELECT * FROM info_u WHERE matricula = '$busqueda' OR email = '$busqueda'";
        $result_busqueda = $conn->query($sql_busqueda);

        if ($result_busqueda->num_rows > 0) {
            $row = $result_busqueda->fetch_assoc();
            echo "<div class='result-container' style='margin-top: -60px; max-width: 1000px; 
            margin-left: auto; margin-right: auto;'>";
            echo "<h2>Datos del Usuario</h2>";
            echo "<div class='row'>";
            echo "<div class='col-md-6'>";
            echo "<div class='form-group'>";
            echo "<label for='rusu_matricula'>Matrícula:</label>";
            echo "<input type='text' class='form-control' id='rusu_matricula' name='rusu_matricula' value='{$row["matricula"]}'readonly >";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='rusu_nombre'>Nombre:</label>";
            echo "<input type='text' class='form-control' id='rusu_nombre' name='rusu_nombre' value='{$row["nombre"]}'readonly >";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='rusu_paterno'>Apellido Paterno:</label>";
            echo "<input type='text' class='form-control' id='rusu_paterno' name='rusu_paterno' value='{$row["paterno"]}'readonly >";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='rusu_materno'>Apellido Materno:</label>";
            echo "<input type='text' class='form-control' id='rusu_materno' name='rusu_materno' value='{$row["materno"]}' readonly >";
            echo "</div>";
            echo "</div>"; // Cierra la primera columna
        
            echo "<div class='col-md-6'>";
            echo "<div class='form-group'>";
            echo "<label for='rusu_domicilio'>Domicilio:</label>";
            echo "<input type='text' class='form-control' id='rusu_domicilio' name='rusu_domicilio' value='{$row["domicilio"]}' readonly >";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='rusu_edad'>Edad:</label>";
            echo "<input type='text' class='form-control' id='rusu_edad' name='rusu_edad' value='{$row["edad"]}' readonly>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='rusu_genero'>Género:</label>";
            echo "<input type='text' class='form-control' id='rusu_genero' name='rusu_genero' value='{$row["genero"]}'readonly >";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='rusu_telefono'>Teléfono:</label>";
            echo "<input type='text' class='form-control' id='rusu_telefono' name='rusu_telefono' value='{$row["telefono"]}' readonly>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='rusu_email'>Email:</label>";
            echo "<input type='text' class='form-control' id='rusu_email' name='rusu_email' value='{$row["email"]}' readonly>";
            echo "</div>";
            echo "</div>"; // Cierra la segunda columna
        
            echo "</div>"; // Cierra la fila
            echo "</div>"; // Cierra el contenedor principal
        } else {
            echo "<p>No se encontró ningún usuario con esa matrícula o correo electrónico.</p>";
        }
        
        
    }

    $conn->close();
}
?>
