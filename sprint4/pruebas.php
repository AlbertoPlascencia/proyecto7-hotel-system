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
    $terrazayareas = isset($_POST["terrazayareas"]) ? $_POST["terrazayareas"] : 0;
    $albercasdehotel_toboganes = isset($_POST["albercasdetoboganes"]) ? $_POST["albercasdetoboganes"] : 0;
    $albercasdehotel_rampa = isset($_POST["albercaderampa"]) ? $_POST["albercaderampa"] : 0;
    $albercaparaniños = isset($_POST["albercaparaniños"]) ? $_POST["albercaparaniños"] : 0;
   //BALNEARIO
    $CHAPOTEADEROS = isset($_POST["CHAPOTEADEROS"]) ? $_POST["CHAPOTEADEROS"] : 0;
    $JACUZZIS = isset($_POST["JACUZZIS"]) ? $_POST["JACUZZIS"] : 0;
    $TEMAZCAL = isset($_POST["TEMAZCAL"]) ? $_POST["TEMAZCAL"] : 0;
    $BAÑOS = isset($_POST["BAÑOS"]) ? $_POST["BAÑOS"] : 0;
    $ALBERCASEMIOLIMPICA = isset($_POST["ALBERCASEMIOLIMPICA"]) ? $_POST["ALBERCASEMIOLIMPICA"] : 0;
    //Restaurantes
    $elvelero = isset($_POST["elvelero"]) ? $_POST["elvelero"] : 0;
    $pergola = isset($_POST["pergola"]) ? $_POST["pergola"] : 0;
    $lasdelicias = isset($_POST["lasdelicias"]) ? $_POST["lasdelicias"] : 0;
    $doñatoña = isset($_POST["doñatoña"]) ? $_POST["doñatoña"] : 0;
    $cocobar = isset($_POST["cocobar"]) ? $_POST["cocobar"] : 0;
    $MINIBAR = isset($_POST["MINIBAR"]) ? $_POST["MINIBAR"] : 0;
    $MESEROS = isset($_POST["MESEROS"]) ? $_POST["MESEROS"] : 0;
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
    $sql = "INSERT INTO encuesta_hotel (nombre, whatsapp, habitacion, reservaciones, checkIn, servicioBotones, limpiezaHabitacion, areaHuespedes, albercasdehotel, jacuzzihotel, CheckOut, terrazayareas, albercasdehotel_toboganes, albercasdehotel_rampa, albercaparaniños, CHAPOTEADEROS, ALBERCASEMIOLIMPICA, JACUZZIS, TEMAZCAL, BAÑOS, elvelero, pergola, lasdelicias, doñatoña, cocobar, MINIBAR, MESEROS, CAJERAS, PERSONAL, TERMAS, MASAJES, TRATAMIENTOS, TERMASVIP, feedback, fecha )
    VALUES ('$nombre', '$whatsapp', '$habitacion', '$reservaciones', '$checkIn', '$servicioBotones', '$limpiezaHabitacion', '$areaHuespedes', '$albercasdehotel', '$jacuzzihotel', '$CheckOut', '$terrazayareas', '$albercasdehotel_toboganes', '$albercasdehotel_rampa', '$albercaparaniños', '$CHAPOTEADEROS', '$ALBERCASEMIOLIMPICA', '$JACUZZIS', '$TEMAZCAL', '$BAÑOS', '$elvelero', '$pergola', '$lasdelicias', '$doñatoña', '$cocobar', '$MINIBAR', '$MESEROS', '$CAJERAS', '$personal', '$termas', '$masajes', '$tratamientos', '$termasvip', '$feedback', '$fecha')";

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