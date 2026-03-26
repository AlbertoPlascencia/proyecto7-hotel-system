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
    $habitacion = isset($_POST["room"]) ? $_POST["room"] : 0;
    $reservaciones = isset($_POST["reservaciones"]) ? $_POST["reservaciones"] : 0;
    $checkIn = isset($_POST["CheckInn"]) ? $_POST["CheckInn"] : 0;
    $servicioBotones = isset($_POST["servicioBotones"]) ? $_POST["servicioBotones"] : 0;
    $limpiezaHabitacion = isset($_POST["limpiezaHabitacion"]) ? $_POST["limpiezaHabitacion"] : 0;
    $areaHuespedes = isset($_POST["areaHuespedes"]) ? $_POST["areaHuespedes"] : 0;
    $albercasdehotel = isset($_POST["albercasdehotel"]) ? $_POST["albercasdehotel"] : 0;
    $jacuzzihotel = isset($_POST["jacuzzihotel"]) ? $_POST["jacuzzihotel"] : 0;
    $CheckOut = isset($_POST["CheckOut"]) ? $_POST["CheckOut"] : 0;
    $feedback = isset($_POST["feedback"]) ? $_POST["feedback"] : 0;
$fecha = date("Y-m-d"); // Agregar la fecha actual
    // Insertar los datos en la base de datos
    $sql = "INSERT INTO hotel (nombre, whatsapp, habitacion, reservaciones, checkIn, servicioBotones, limpiezaHabitacion, areaHuespedes, albercasdehotel, jacuzzihotel, CheckOut, feedback, fecha )
    VALUES ('$nombre', '$whatsapp', '$habitacion', '$reservaciones', '$checkIn', '$servicioBotones', '$limpiezaHabitacion', '$areaHuespedes', '$albercasdehotel', '$jacuzzihotel', '$CheckOut', 
    '$feedback', '$fecha')";

  
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