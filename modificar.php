<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "datos";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Recibe los datos del formulario
$id = $_POST['id'];
$nuevo_valor = $_POST['fnombre'];
$nuevo_valor = $_POST['fapellido'];

// Actualiza el registro en la base de datos
$sql = "UPDATE personal SET apellido = '$nuevo_valor' WHERE orden = $id";

if ($conn->query($sql) === TRUE) {
    echo "Registro modificado correctamente";
} else {
    echo "Error al modificar el registro: " . $conn->error;
}

$conn->close();
?>
