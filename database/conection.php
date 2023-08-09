<?php
// Definimos las credenciales de la base de datos
$server = "localhost"; // servidor de la base de datos
$user = "jesusraulrg"; // usuario de la base de datos
$pasword = "5/ucK(xVmU6xCnJ]"; // contraseña de la base de datos
$db = "unitest"; // nombre de la base de datos

// Creamos la conexión a la base de datos utilizando la función mysqli_conexionect
$conection = mysqli_connect($server, $user, $password, $db);

// Verificamos si la conexión fue exitosa
if (!$conection) {
    die("Conexión fallida: " . mysqli_connect_error()); // Si la conexión falla, se muestra un mensaje de error y se termina la ejecución del script
}

// Cerramos la conexión a la base de datos utilizando la función mysqli_close
//mysqli_close($conexion);
?>
