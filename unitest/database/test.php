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
        // Obtener los valores de c, h, a, s, i, d y e
        $result = $conn->query("SELECT c, h, a, s, i, d, e FROM test ORDER BY id_test DESC LIMIT 1");
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $values = array_values($row);

            // Encontrar el índice del valor máximo
            $maxIndex = array_search(max($values), $values);

            // Determinar a qué página redirigir
            $pages = array(
                'c' => '../pages/chaside/c.html',
                'h' => '../pages/chaside/h.html',
                'a' => '../pages/chaside/a.html',
                's' => '../pages/chaside/s.html',
                'i' => '../pages/chaside/i.html',
                'd' => '../pages/chaside/d.html',
                'e' => '../pages/chaside/e.html'
            );

            $redirectTo = $pages[array_keys($row)[$maxIndex]];
            header("Location: $redirectTo");
            exit();
        } else {
            echo "Error al obtener resultados: " . $conn->error;
        }
    } else {
        echo "Error al almacenar respuestas: " . $stmt->error;
    }
    
    $stmt->close();
}

$conn->close();
?>
