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
   $nombre = isset($_POST["firstname"]) ? $_POST["firstname"] : 0;
    $whatsapp = isset($_POST["phone"]) ? $_POST["phone"] : 0;
    $CAJERAS = isset($_POST["CAJERAS"]) ? $_POST["CAJERAS"] : 0;
    //SPA
    $personal = isset($_POST["PERSONAL"]) ? $_POST["PERSONAL"] : 0;
    $termas = isset($_POST["TERMAS"]) ? $_POST["TERMAS"] : 0;
    $masajes = isset($_POST["MASAJES"]) ? $_POST["MASAJES"] : 0;
    $tratamientos = isset($_POST["TRATAMIENTOS"]) ? $_POST["TRATAMIENTOS"] : 0;
    $termasvip = isset($_POST["TERMASVIP"]) ? $_POST["TERMASVIP"] : 0;
    $feedback = isset($_POST["feedback"]) ? $_POST["feedback"] : 0;
$fecha = date("Y-m-d"); // Agregar la fecha actual
    // Insertar los datos en la base de datos
   $sql = "INSERT INTO spa (nombre, whatsapp,  CAJERAS, PERSONAL, TERMAS, MASAJES, TRATAMIENTOS, TERMASVIP, feedback, fecha )
    VALUES ('$nombre', '$whatsapp',  '$CAJERAS', '$personal', '$termas', '$masajes', '$tratamientos', '$termasvip', '$feedback', '$fecha')";

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