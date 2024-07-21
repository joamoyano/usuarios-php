<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "datos";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar si hay algún error en la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Si la conexión se establece correctamente
echo "Conexión exitosa";
echo "<br>";
echo "<br>";

$sql = "SELECT * FROM personal";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Imprimir los registros en una lista
    while ($row = $result->fetch_assoc()) {
        echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
        echo $row["orden"] . " - " . $row["apellido"] . ", " . $row["nombre"];
        echo "<span>";
        echo "<a href='modificar.php?id=" . $row["orden"] . "' class='btn btn-primary btn-sm mr-2' target='_self'>Modificar</a>";
        echo "<a href='borrar.php?id=" . $row["orden"] . "' class='btn btn-danger btn-sm' target='_self'>Borrar</a>";
        echo "</span>";
        echo "</li>";
    }
} else {
    echo "No se encontraron registros.";
}

// Cerrar la conexión
$conn->close();
?>