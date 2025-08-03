<?php
session_start();

$host = "localhost";
$db = "elrincondelestudiante";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $row = $resultado->fetch_assoc();

    if (password_verify($password, $row['password'])) {
        $_SESSION['usuario'] = $username;
        echo "success"; // ← esto lo lee el JS
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Usuario no encontrado";
}

$conn->close();
?>