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


// Verificar si se ha enviado el formulario de grabación
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos enviados desde el formulario
    $campo1 = $_POST["fapellido"];
    $campo2 = $_POST["fnombre"];

    // Preparar y ejecutar la consulta de inserción
    $sql = "INSERT INTO personal(apellido,nombre) VALUES (' $campo1 ', ' $campo2  ')";
    $stmt = $conn->prepare($sql);
    //$stmt->bind_param("ss", $campo1, $campo2);
    $stmt->execute();

    // Verificar si se grabó el registro correctamente
    if ($stmt->affected_rows > 0) {
        echo "El registro se grabó correctamente.";
    } else {
        echo "No se pudo grabar el registro.";
    }
}

// Cerrar la conexión
$conn->close();
?>

<a href="index.html" target="_self">volver</a>