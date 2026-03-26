<?php

$servername = "localhost"; // Cambia a tu host de base de datos
$username = "u597541443_id21386601_roo"; // Cambia a tu nombre de usuario de base de datos
$password = "Chachaloca12$"; // Cambia a tu contraseña de base de datos
$dbname = "u597541443_id21386601_sat"; // Cambia a tu nombre de base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario con valores predeterminados de 0
    // Hotel
   
   //BALNEARIO
   $nombre = isset($_POST["firstname"]) ? $_POST["firstname"] : 0;
   $whatsapp = isset($_POST["phone"]) ? $_POST["phone"] : 0;
$habitacion = isset($_POST["room"]) ? $_POST["room"] : 0;
       $terrazayareas = isset($_POST["terrazayareas"]) ? $_POST["terrazayareas"] : 0;
    $albercasdehotel_toboganes = isset($_POST["albercasdetoboganes"]) ? $_POST["albercasdetoboganes"] : 0;
    $albercasdehotel_rampa = isset($_POST["albercaderampa"]) ? $_POST["albercaderampa"] : 0;
    $albercaparaniños = isset($_POST["albercaparaniños"]) ? $_POST["albercaparaniños"] : 0;

    $CHAPOTEADEROS = isset($_POST["CHAPOTEADEROS"]) ? $_POST["CHAPOTEADEROS"] : 0;
    $JACUZZIS = isset($_POST["JACUZZIS"]) ? $_POST["JACUZZIS"] : 0;
    $TEMAZCAL = isset($_POST["TEMAZCAL"]) ? $_POST["TEMAZCAL"] : 0;
    $BAÑOS = isset($_POST["BAÑOS"]) ? $_POST["BAÑOS"] : 0;
    $ALBERCASEMIOLIMPICA = isset($_POST["ALBERCASEMIOLIMPICA"]) ? $_POST["ALBERCASEMIOLIMPICA"] : 0;
    //Restaurantes
  
    $feedback = isset($_POST["feedback"]) ? $_POST["feedback"] : 0;
$fecha = date("Y-m-d"); // Agregar la fecha actual
    // Insertar los datos en la base de datos
    $sql = "INSERT INTO balneario (nombre, whatsapp, habitacion,  terrazayareas, albercasdehotel_toboganes, albercasdehotel_rampa, albercaparaniños, CHAPOTEADEROS, ALBERCASEMIOLIMPICA, JACUZZIS, TEMAZCAL, BAÑOS,  feedback, fecha )
    VALUES ('$nombre', '$whatsapp', $habitacion, '$terrazayareas', '$albercasdehotel_toboganes', '$albercasdehotel_rampa', '$albercaparaniños', '$CHAPOTEADEROS', '$ALBERCASEMIOLIMPICA', '$JACUZZIS', '$TEMAZCAL', '$BAÑOS', '$feedback', '$fecha')";

    if ($conn->query($sql) === TRUE) {
          echo '<div style="text-align:center; font-size: 3em;">¡Gracias por compartir tu opinión!</div>';
    echo '<script>setTimeout(function(){ window.location.href = "index.html"; }, 2000);</script>';
} else {
    echo "Error: " . $stmt->error;
}

  

    // Cierra la conexión a la base de datos
    $conn->close();
}
?>