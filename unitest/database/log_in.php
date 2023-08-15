<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "jesus";
$password = "I[VBMX-h3WHOW!Tw";
$dbname = "unitest";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificación de las credenciales
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT password FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $storedHashedPassword = $row["password"];
        
        if (password_verify($password, $storedHashedPassword)) {
            // Inicio de sesión exitoso
            header("Location: ../pages/test.html");
            exit();
        } else {
            // Credenciales incorrectas
            echo "Usuario o contraseña incorrectos.";
        }
    } else {
        // Usuario no encontrado
        echo "Usuario no encontrado.";
    }
}

$conn->close();
?>
