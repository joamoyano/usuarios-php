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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    $sql = "SELECT * FROM personal WHERE nombre = ? AND apellido = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $input_username, $input_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Usuario encontrado, redireccionar a pagina2.php
        header("Location: pagina2.php");
        exit();
    } else {
        // Usuario no encontrado, redireccionar a pagina1.php
        header("Location: pagina1.php");
        exit();
    }

    $stmt->close();
}

$conn->close();
?>
