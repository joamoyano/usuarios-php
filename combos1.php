<?php
$servername = "localhost";  // Cambia esto por tu servidor
$username = "root";         // Cambia esto por tu usuario
$password = "";             // Cambia esto por tu contraseña
$dbname = "datos"; // Cambia esto por tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

<?php
$sql = "SELECT * FROM personal";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista Desplegable</title>
</head>
<body>


    <form action="procesar.php" method="post">
        <label for="mi_lista">Selecciona una opción:</label>
        <select name="mi_lista" id="mi_lista">
            <?php
            if ($result->num_rows > 0) {
                // Salida de datos por cada fila
                while($row = $result->fetch_assoc()) {

                    echo '<option value="' . $row["apellido"] . '">' . $row["nombre"] . '</option>';
                
                }
            } else {
                echo '<option value="">No hay registros</option>';
            }
            $conn->close();
            ?>
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
