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


// Verificar si se ha enviado un ID de registro para eliminar
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    // Obtener el ID del registro a eliminar
    $id = $_GET["id"];

    // Preparar y ejecutar la consulta de eliminación
    $sql = "DELETE FROM personal WHERE orden = $id";
    $stmt = $conn->prepare($sql);
    //$stmt->bind_param("i", $id);
    $stmt->execute();

    // Verificar si se eliminó el registro
    if ($stmt->affected_rows > 0) {
        echo "El registro se eliminó correctamente.";
    } else {
        echo "No se encontró el registro o no se pudo eliminar.";
    }
}


// Cerrar la conexión
$conn->close();
?>

<a href="index.html" target="_self">volver</a>