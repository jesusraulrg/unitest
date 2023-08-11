<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "jesus";
$password = "I[VBMX-h3WHOW!Tw";
$dbname = "unitest";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar los datos del formulario
if (isset($_POST['submitForm'])) {
    
    // Obtener respuestas del formulario
    $pregunta1 = $_POST['pregunta1'];
    $pregunta2 = $_POST['pregunta2'];
    $pregunta3 = $_POST['pregunta3'];
    $pregunta4 = $_POST['pregunta4'];
    $pregunta5 = $_POST['pregunta5'];
    $pregunta6 = $_POST['pregunta6'];
    $pregunta7 = $_POST['pregunta7'];
    $pregunta8 = $_POST['pregunta8'];
    $pregunta9 = $_POST['pregunta9'];
    $pregunta10 = $_POST['pregunta10'];


    // Insertar los datos en la base de datos (ejemplo usando prepared statements)
    $stmt = $conn->prepare("INSERT INTO test(pregunta1, pregunta2, pregunta3, pregunta4, pregunta5, pregunta6, pregunta7, pregunta8, pregunta9, pregunta10)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiiiiiiii", $pregunta1, $pregunta2, $pregunta3, $pregunta4, $pregunta5, $pregunta6, $pregunta7, $pregunta8, $pregunta9, $pregunta10);
    
    if ($stmt->execute()) {
        echo "Respuestas almacenadas exitosamente.";
    } else {
        echo "Error al almacenar respuestas: " . $stmt->error;
    }
    
    $stmt->close();
}

$conn->close();
?>