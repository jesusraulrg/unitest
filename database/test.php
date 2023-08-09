<?php

$servidor = "localhost";
$usuario = "jesusraulrg";
$contraseña = "5/ucK(xVmU6xCnJ]";
$db = "unitest";

// Conectar a la base de datos MySQL
$conexion = new mysqli($servidor, $usuario, $contraseña, $db);

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Conexión Fallida: " . $conexion->connect_error);
} else {
    echo "Conectado"; // Esto solo se imprimirá si la conexión es exitosa
}

// Obtener los datos del formulario si están disponibles
$pregunta1 = isset($_POST['pregunta1']) ? $_POST['pregunta1'] : '';
$pregunta2 = isset($_POST['pregunta2']) ? $_POST['pregunta2'] : '';
$pregunta3 = isset($_POST['pregunta3']) ? $_POST['pregunta3'] : '';
$pregunta4 = isset($_POST['pregunta4']) ? $_POST['pregunta4'] : '';

// Crear la consulta SQL para insertar los datos en la base de datos
$query = "INSERT INTO test (pregunta1, pregunta2, pregunta3, pregunta4) VALUES ('$pregunta1', '$pregunta2', '$pregunta3', '$pregunta4')";

// Ejecutar la consulta
if ($conexion->query($query) === TRUE) {
    echo "Respuestas enviadas correctamente.";
} else {
    echo "Error al enviar respuestas: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();


// Redireccionar a la página de confirmación
//header("Location: confirmacion.html");
//exit();
?>