<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conexion = new mysqli("localhost", "root", "", "elrincondelestudiante");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    echo "Faltan datos del formulario";
    exit;
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE username = ?";
$stmt = $conexion->prepare($sql);

if (!$stmt) {
    echo "Error en la preparación de la consulta: " . $conexion->error;
    exit;
}

$stmt->bind_param("s", $username);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    echo "El usuario ya existe";
} else {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $insert_sql = "INSERT INTO usuarios (username, password) VALUES (?, ?)";
    $insert_stmt = $conexion->prepare($insert_sql);

    if (!$insert_stmt) {
        echo "Error al preparar inserción: " . $conexion->error;
        exit;
    }

    $insert_stmt->bind_param("ss", $username, $hash);

    if ($insert_stmt->execute()) {
        echo "Registro exitoso";
    } else {
        echo "Error al registrar: " . $insert_stmt->error;
    }
}

$conexion->close();
?>