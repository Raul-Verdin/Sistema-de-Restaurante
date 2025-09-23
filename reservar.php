<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $personas = $_POST['personas'];
    $comentarios = $_POST['comentarios'];

    // Conectar a la base de datos (ajusta los parámetros según tu configuración)
    $conexion = new mysqli('localhost', 'root', 'mysql123', 'reservaciones');

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO reservas (nombre, email, telefono, fecha, hora, personas, comentarios)
            VALUES ('$nombre', '$email', '$telefono', '$fecha', '$hora', '$personas', '$comentarios')";

    if ($conexion->query($sql) === TRUE) {
        echo "Reservación guardada exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
    header("Location: index.html");
    $conexion->close();
}
?>
