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
    // Preparar la consulta
    $stmt = $conn->prepare("INSERT INTO test(" . implode(", ", array_map(function($i) { return "pregunta$i"; }, range(1, 98))) . ")
                            VALUES (" . implode(", ", array_fill(0, 98, "?")) . ")");
    
    $types = str_repeat("i", 98); // Repetir "i" (integer) 98 veces
    
    // Vincular parámetros
    $stmt->bind_param($types, ...array_map(function($i) { return $_POST["pregunta$i"]; }, range(1, 98)));
    
    if ($stmt->execute()) {
        header("Location: ../pages/resultado_test.html");
        exit();
    } else {
        echo "Error al almacenar respuestas: " . $stmt->error;
    }
    
    $stmt->close();
}

$conn->close();
?>
