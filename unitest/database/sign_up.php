<?php
// Se utiliza para llamar al archivo que contiene la conexion a la base de datos
require 'conection.php';

// Validamos que el formulario y que el boton registro haya sido presionado
if(isset($_POST['Registrarse'])) {

// Obtener los valores enviados por el formulario
$nombre = $_POST["nombre"];
$primer_apellido = $_POST["primer_apellido"];
$segundo_apellido = $_POST["segundo_apellido"];
$edad = $_POST["edad"];
$genero = $_POST["genero"];
$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Cifrar la contraseña

// Insertamos los datos en la base de datos
$sql = "INSERT INTO usuarios(nombre, primer_apellido, segundo_apellido, edad, genero, email, password)
        VALUES ('$nombre', '$primer_apellido', '$segundo_apellido', $edad, '$genero', '$email', '$password')";
$resultado = mysqli_query($conection,$sql);
if($resultado) {
    // Iserción correcta
    echo "¡Se insertaron los datos correctamente!";
} else {
    // Iserción fallida
    echo "¡No se puede insertar la informacion!"."<br>";
    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}
}
?>